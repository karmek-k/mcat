package router

import (
	"embed"
	"io/fs"
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/karmek-k/mcat/src/controllers"
)

func mustFS(embeddedFS *embed.FS) http.FileSystem {
	sub, err := fs.Sub(embeddedFS, "frontend/dist")

	if err != nil {
		panic(err)
	}

	return http.FS(sub)
}

// SetupRouter creates a new router and configures it.
// You can also provide an embedded filesystem.
func SetupRouter(embeddedFS *embed.FS) *gin.Engine {
	r := gin.Default()

	if embeddedFS != nil {
		r.StaticFS("/web", mustFS(embeddedFS))

		// workaround for path conflict error
		// https://stackoverflow.com/questions/36357791/gin-router-path-segment-conflicts-with-existing-wildcard
		r.GET("/", func(c *gin.Context) {
			c.Redirect(http.StatusPermanentRedirect, "/web")
		})
	}

	api := r.Group("/api")
	{
		tracks := api.Group("/tracks")
		{
			tracks.GET("/", controllers.TrackList)
			tracks.GET("/:id", controllers.TrackDetails)
		}
	}
	
	return r
}