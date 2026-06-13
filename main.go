package main

import (
	"embed"
	"log"

	"ignore/internal/app"
	"ignore/internal/ui"
)

//go:embed all:cmd/ignore/ui/dist
var assets embed.FS

func main() {
	handled, err := app.RunCommandLine()
	if err != nil {
		log.Fatal(err)
	}
	if handled {
		return
	}
	markdownDocs, err := app.New(assets)
	if err != nil {
		log.Fatal(err)
	}
	if err := ui.Run(markdownDocs); err != nil {
		log.Fatal(err)
	}
}
