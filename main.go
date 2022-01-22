package main

import (
	"embed"
	"log"
	"os"

	"github.com/karmek-k/mcat/src/router"
	"github.com/karmek-k/mcat/utils"
)

//go:embed frontend/dist
var publicFiles embed.FS

func main() {
	if os.Getenv("SEED") == "1" {
		utils.SeedDB()
		log.Println("seeding complete")

		return
	}

	r := router.SetupRouter(&publicFiles)
	
	r.Run(":8000")
}