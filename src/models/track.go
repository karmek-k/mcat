package models

import "time"

// TODO: add the commented out fields as relationships
type Track struct {
	ID uint
	// Artist
	Title string
	// Album
	Year int
	Genre string
	CreatedAt time.Time
	UpdatedAt time.Time
}