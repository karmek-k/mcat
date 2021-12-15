package models

import "time"

// TODO: add the commented out fields as relationships
type Track struct {
	ID uint `json:"id"`
	// Artist
	Title string `json:"title"`
	// Album
	Year int `json:"year"`
	Genre string `json:"genre"`
	CreatedAt time.Time `json:"createdAt"`
	UpdatedAt time.Time `json:"updatedAt"`
}