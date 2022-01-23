package controllers

import (
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/karmek-k/mcat/src/repos"
)

func TrackList(c *gin.Context) {
	c.JSON(http.StatusOK, repos.AllTracks())
}

func TrackDetails(c *gin.Context) {
	track := repos.FindTrack(c.Param("id"))
	if track == nil {
		c.JSON(http.StatusNotFound, gin.H{})
		return
	}

	c.JSON(http.StatusOK, track)
}

