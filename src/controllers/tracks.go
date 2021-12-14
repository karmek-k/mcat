package controllers

import (
	"net/http"

	"github.com/gin-gonic/gin"
)

func TrackList(c *gin.Context) {
	c.JSON(http.StatusOK, gin.H{
		"mysia": "chomik",
	})
}

func TrackDetails(c *gin.Context) {
	c.JSON(http.StatusOK, gin.H{
		"catIndex": c.Param("id"),
	})
}

