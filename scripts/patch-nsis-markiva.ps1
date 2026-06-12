$ErrorActionPreference = "Stop"

$root = Split-Path -Parent (Split-Path -Parent $MyInvocation.MyCommand.Path)
$path = Join-Path $root "build\windows\installer\project.nsi"

if (!(Test-Path $path)) {
  throw "NSIS project file was not found: $path"
}

$text = Get-Content -Raw $path

$installMarker = '    !insertmacro wails.associateFiles'
$installBlock = @'
    WriteRegStr SHELL_CONTEXT "Software\Classes\.md" "" "MarkivaMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Classes\.markdown" "" "MarkivaMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Classes\.mdown" "" "MarkivaMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Classes\.mkd" "" "MarkivaMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Classes\MarkivaMarkdown" "" "Markdown Document"
    WriteRegStr SHELL_CONTEXT "Software\Classes\MarkivaMarkdown\DefaultIcon" "" "$INSTDIR\${PRODUCT_EXECUTABLE},0"
    WriteRegStr SHELL_CONTEXT "Software\Classes\MarkivaMarkdown\shell" "" "open"
    WriteRegStr SHELL_CONTEXT "Software\Classes\MarkivaMarkdown\shell\open" "" "Open with ${INFO_PRODUCTNAME}"
    WriteRegStr SHELL_CONTEXT "Software\Classes\MarkivaMarkdown\shell\open\command" "" "$\"$INSTDIR\${PRODUCT_EXECUTABLE}$\" $\"%1$\""
    WriteRegStr SHELL_CONTEXT "Software\RegisteredApplications" "Markiva" "Software\Markiva\Capabilities"
    WriteRegStr SHELL_CONTEXT "Software\Markiva\Capabilities" "ApplicationName" "Markiva"
    WriteRegStr SHELL_CONTEXT "Software\Markiva\Capabilities" "ApplicationDescription" "Fast Markdown editor and previewer"
    WriteRegStr SHELL_CONTEXT "Software\Markiva\Capabilities\FileAssociations" ".md" "MarkivaMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Markiva\Capabilities\FileAssociations" ".markdown" "MarkivaMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Markiva\Capabilities\FileAssociations" ".mdown" "MarkivaMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Markiva\Capabilities\FileAssociations" ".mkd" "MarkivaMarkdown"
    System::Call 'shell32::SHChangeNotify(i 0x08000000, i 0, i 0, i 0)'

'@

if ($text -notlike "*$installBlock*") {
  $text = $text.Replace($installMarker, $installBlock + $installMarker)
}

$uninstallMarker = '    !insertmacro wails.unassociateFiles'
$uninstallBlock = @'
    DeleteRegKey SHELL_CONTEXT "Software\Classes\MarkivaMarkdown"
    DeleteRegKey SHELL_CONTEXT "Software\Markiva"
    DeleteRegValue SHELL_CONTEXT "Software\RegisteredApplications" "Markiva"
    DeleteRegValue SHELL_CONTEXT "Software\Classes\.md" ""
    DeleteRegValue SHELL_CONTEXT "Software\Classes\.markdown" ""
    DeleteRegValue SHELL_CONTEXT "Software\Classes\.mdown" ""
    DeleteRegValue SHELL_CONTEXT "Software\Classes\.mkd" ""
    System::Call 'shell32::SHChangeNotify(i 0x08000000, i 0, i 0, i 0)'

'@

if ($text -notlike "*$uninstallBlock*") {
  $text = $text.Replace($uninstallMarker, $uninstallBlock + $uninstallMarker)
}

Set-Content -Path $path -Value $text -Encoding UTF8
