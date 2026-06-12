$ErrorActionPreference = "Stop"

$root = Split-Path -Parent (Split-Path -Parent $MyInvocation.MyCommand.Path)
Set-Location $root

New-Item -ItemType Directory -Force -Path "assets", "build", "build\windows", "ui\public\brand" | Out-Null

Add-Type -AssemblyName System.Drawing

$size = 1024
$bitmap = New-Object Drawing.Bitmap $size, $size
$graphics = [Drawing.Graphics]::FromImage($bitmap)
$graphics.SmoothingMode = [Drawing.Drawing2D.SmoothingMode]::AntiAlias
$graphics.TextRenderingHint = [Drawing.Text.TextRenderingHint]::AntiAliasGridFit

$background = New-Object Drawing.SolidBrush ([Drawing.Color]::FromArgb(32, 37, 43))
$paper = New-Object Drawing.Drawing2D.LinearGradientBrush `
  ([Drawing.Point]::new(220, 100)), `
  ([Drawing.Point]::new(804, 924)), `
  ([Drawing.Color]::FromArgb(255, 248, 238)), `
  ([Drawing.Color]::FromArgb(241, 221, 200))
$ink = New-Object Drawing.SolidBrush ([Drawing.Color]::FromArgb(32, 37, 43))
$accent = New-Object Drawing.SolidBrush ([Drawing.Color]::FromArgb(196, 79, 44))
$fold = New-Object Drawing.SolidBrush ([Drawing.Color]::FromArgb(215, 185, 157))
$font = New-Object Drawing.Font "Segoe UI", 260, ([Drawing.FontStyle]::Bold), ([Drawing.GraphicsUnit]::Pixel)

try {
  $graphics.FillRectangle($background, 0, 0, $size, $size)
  $graphics.FillRectangle($paper, 220, 100, 584, 824)

  $foldPath = New-Object Drawing.Drawing2D.GraphicsPath
  $foldPath.AddPolygon(@(
    [Drawing.Point]::new(650, 100),
    [Drawing.Point]::new(804, 254),
    [Drawing.Point]::new(650, 254)
  ))
  $graphics.FillPath($fold, $foldPath)

  $graphics.DrawString("M", $font, $ink, 305, 350)
  $graphics.FillRectangle($accent, 305, 745, 414, 70)
  $graphics.FillPolygon($accent, @(
    [Drawing.Point]::new(745, 640),
    [Drawing.Point]::new(855, 750),
    [Drawing.Point]::new(965, 640),
    [Drawing.Point]::new(900, 640),
    [Drawing.Point]::new(900, 500),
    [Drawing.Point]::new(810, 500),
    [Drawing.Point]::new(810, 640)
  ))

  $bitmap.Save("assets\markiva-logo.png", [Drawing.Imaging.ImageFormat]::Png)
  $bitmap.Save("icon.png", [Drawing.Imaging.ImageFormat]::Png)
  $bitmap.Save("build\appicon.png", [Drawing.Imaging.ImageFormat]::Png)
  $bitmap.Save("build\windows\icon.png", [Drawing.Imaging.ImageFormat]::Png)
}
finally {
  $font.Dispose()
  $fold.Dispose()
  $accent.Dispose()
  $ink.Dispose()
  $paper.Dispose()
  $background.Dispose()
  $graphics.Dispose()
  $bitmap.Dispose()
}
