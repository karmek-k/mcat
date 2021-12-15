package models

type Artist struct {
	ID uint `json:"id"`

	Name string `json:"name"`
	Bio *string `json:"bio"`

	Albums []Album `json:"albums"`
}