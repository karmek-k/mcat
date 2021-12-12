package router

import (
	"github.com/gin-gonic/gin"

	"github.com/karmek-k/mcat/src/handlers"
)

func SetupRouter() *gin.Engine {
	r := gin.Default()

	r.GET("/", handlers.IndexHandler)

	return r
}