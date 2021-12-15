package models

type Track struct {
	ID uint `json:"id"`

	Title string `json:"title"`

	AlbumID uint
	Album Album `json:"album"`

	Genre string `json:"genre"`
}