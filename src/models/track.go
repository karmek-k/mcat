package models

type Track struct {
	ID uint `json:"id"`

	ArtistID uint
	Artist Artist `json:"artist"`

	Title string `json:"title"`

	AlbumID uint
	Album Album `json:"album"`

	Genre string `json:"genre"`
}