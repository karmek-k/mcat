package models

type Track struct {
	ID uint `json:"id"`

	Title string `json:"title"`

	AlbumID uint `json:"-"`
	Album Album `json:"album"`

	Genre string `json:"genre"`
}