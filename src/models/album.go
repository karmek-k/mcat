package models

type Album struct {
	ID uint `json:"id"`

	ArtistID uint `json:"-"`
	Artist Artist `json:"artist"`

	Title string `json:"title"`
	Year int `json:"year"`

	Tracks []Track `json:"tracks"`
}