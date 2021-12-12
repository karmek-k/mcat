package handlers

import (
	"net/http"

	"github.com/gin-gonic/gin"
)

// IndexHandler handles GET /
func IndexHandler(c *gin.Context) {
	c.HTML(http.StatusOK, "index.html", gin.H{
		"string": "hi!",
	})
}