package repos

import (
	"github.com/karmek-k/mcat/src/db"
	"github.com/karmek-k/mcat/src/models"
)

func AllTracks() []models.Track {
	var tracks []models.Track

	db.DB.Find(&tracks)

	return tracks
}

func FindTrack(id interface{}) *models.Track {
	var track *models.Track

	result := db.DB.First(track, id)
	if result.Error != nil {
		return nil
	}

	return track
}
