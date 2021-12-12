package main

import "github.com/karmek-k/mcat/src/router"

func main() {
	r := router.SetupRouter()
	
	r.Run(":8000")
}