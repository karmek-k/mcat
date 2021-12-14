package db

import (
	"github.com/karmek-k/mcat/src/models"
	"gorm.io/driver/sqlite"
	"gorm.io/gorm"
)

var DB *gorm.DB

func init() {
	var err error

	DB, err = CreateDB(sqlite.Open("mcat.db"))
	if err != nil {
		panic(err)
	}

	DB.AutoMigrate(
		models.Track{},
	)
}

// CreateDB creates a new gorm.DB instance with given dialector.
// The dialector is a GORM driver's Open function value.
func CreateDB(dialector gorm.Dialector) (*gorm.DB, error) {
	db, err := gorm.Open(dialector, &gorm.Config{})
	if err != nil {
		return nil, err
	}

	return db, nil
}