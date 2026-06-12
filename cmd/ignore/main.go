package main

import (
	"embed"
	"log"

	"ignore/internal/app"
	"ignore/internal/ui"
)

//go:embed all:ui/dist
var assets embed.FS

func main() {
	handled, err := app.RunCommandLine()
	if err != nil {
		log.Fatal(err)
	}
	if handled {
		return
	}
	markiva, err := app.New(assets)
	if err != nil {
		log.Fatal(err)
	}
	if err := ui.Run(markiva); err != nil {
		log.Fatal(err)
	}
}
