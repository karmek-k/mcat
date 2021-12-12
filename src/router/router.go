package router

import (
	"embed"
	"io/fs"
	"net/http"

	"github.com/gin-gonic/gin"
)

func mustFS(embeddedFS *embed.FS) http.FileSystem {
	sub, err := fs.Sub(embeddedFS, "frontend/build")

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
		r.StaticFS("/", mustFS(embeddedFS))
	}
	
	return r
}