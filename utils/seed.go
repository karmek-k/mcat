package utils

import (
	"github.com/karmek-k/mcat/src/db"
	"github.com/karmek-k/mcat/src/models"
)

func SeedDB() {
	db.DB.Delete(&models.Track{}, "1=1")
	db.DB.Delete(&models.Album{}, "1=1")
	db.DB.Delete(&models.Artist{}, "1=1")

	db.DB.Create(&models.Artist{
		Name: "Test Artist",
		Bio: nil,
		Albums: []models.Album{
			{
				Title: "Test Album",
				Year: 2021,
				Tracks: []models.Track{
					{
						Title: "Test Track",
						Genre: "Jazz",
					},
				},
			},
		},
	})
}