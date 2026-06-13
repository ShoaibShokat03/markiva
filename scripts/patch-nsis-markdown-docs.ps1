$ErrorActionPreference = "Stop"

$root = Split-Path -Parent (Split-Path -Parent $MyInvocation.MyCommand.Path)
$path = Join-Path $root "build\windows\installer\project.nsi"

if (!(Test-Path $path)) {
  throw "NSIS project file was not found: $path"
}

$text = Get-Content -Raw $path

$installMarker = '    !insertmacro wails.associateFiles'
$installBlock = @'
    WriteRegStr SHELL_CONTEXT "Software\Classes\.md" "" "MarkdownDocsMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Classes\.markdown" "" "MarkdownDocsMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Classes\.mdown" "" "MarkdownDocsMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Classes\.mkd" "" "MarkdownDocsMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Classes\MarkdownDocsMarkdown" "" "Markdown Document"
    WriteRegStr SHELL_CONTEXT "Software\Classes\MarkdownDocsMarkdown\DefaultIcon" "" "$INSTDIR\${PRODUCT_EXECUTABLE},0"
    WriteRegStr SHELL_CONTEXT "Software\Classes\MarkdownDocsMarkdown\shell" "" "open"
    WriteRegStr SHELL_CONTEXT "Software\Classes\MarkdownDocsMarkdown\shell\open" "" "Open with ${INFO_PRODUCTNAME}"
    WriteRegStr SHELL_CONTEXT "Software\Classes\MarkdownDocsMarkdown\shell\open\command" "" "$\"$INSTDIR\${PRODUCT_EXECUTABLE}$\" $\"%1$\""
    WriteRegStr SHELL_CONTEXT "Software\RegisteredApplications" "Markdown Docs" "Software\Markdown Docs\Capabilities"
    WriteRegStr SHELL_CONTEXT "Software\Markdown Docs\Capabilities" "ApplicationName" "Markdown Docs"
    WriteRegStr SHELL_CONTEXT "Software\Markdown Docs\Capabilities" "ApplicationDescription" "Fast Markdown editor and previewer"
    WriteRegStr SHELL_CONTEXT "Software\Markdown Docs\Capabilities\FileAssociations" ".md" "MarkdownDocsMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Markdown Docs\Capabilities\FileAssociations" ".markdown" "MarkdownDocsMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Markdown Docs\Capabilities\FileAssociations" ".mdown" "MarkdownDocsMarkdown"
    WriteRegStr SHELL_CONTEXT "Software\Markdown Docs\Capabilities\FileAssociations" ".mkd" "MarkdownDocsMarkdown"
    System::Call 'shell32::SHChangeNotify(i 0x08000000, i 0, i 0, i 0)'

'@

if ($text -notlike "*$installBlock*") {
  $text = $text.Replace($installMarker, $installBlock + $installMarker)
}

$uninstallMarker = '    !insertmacro wails.unassociateFiles'
$uninstallBlock = @'
    DeleteRegKey SHELL_CONTEXT "Software\Classes\MarkdownDocsMarkdown"
    DeleteRegKey SHELL_CONTEXT "Software\Markdown Docs"
    DeleteRegValue SHELL_CONTEXT "Software\RegisteredApplications" "Markdown Docs"
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
