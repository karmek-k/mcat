package controllers

import (
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/karmek-k/mcat/src/db"
	"github.com/karmek-k/mcat/src/models"
)

func TrackList(c *gin.Context) {
	var tracks []models.Track

	db.DB.Find(&tracks)

	c.JSON(http.StatusOK, tracks)
}

func TrackDetails(c *gin.Context) {
	var track models.Track

	result := db.DB.First(&track, c.Param("id"))
	if result.Error != nil {
		c.JSON(http.StatusNotFound, gin.H{})
		return
	}

	c.JSON(http.StatusOK, track)
}

