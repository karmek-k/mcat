package main

import (
	"embed"

	"github.com/karmek-k/mcat/src/router"
)

//go:embed frontend/build
var publicFiles embed.FS

func main() {
	r := router.SetupRouter(&publicFiles)
	
	r.Run(":8000")
}