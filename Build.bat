@echo off
setlocal

cd /d "%~dp0"

where go >nul 2>nul
if errorlevel 1 (
  echo Go is not installed or is not available in PATH.
  pause
  exit /b 1
)

where npm >nul 2>nul
if errorlevel 1 (
  echo Node.js/npm is not installed or is not available in PATH.
  pause
  exit /b 1
)

set "PATH=%PATH%;C:\Program Files (x86)\NSIS;C:\Program Files\NSIS"
where makensis >nul 2>nul
if errorlevel 1 (
  echo NSIS is required to build the Markiva installer.
  echo Install NSIS from https://nsis.sourceforge.io/Download or run:
  echo winget install -e --id NSIS.NSIS
  pause
  exit /b 1
)

set "GO_BIN_DIR="
for /f "delims=" %%G in ('go env GOBIN') do set "GO_BIN_DIR=%%G"
if "%GO_BIN_DIR%"=="" (
  for /f "delims=" %%G in ('go env GOPATH') do set "GOPATH_DIR=%%G"
  if not "%GOPATH_DIR%"=="" set "GO_BIN_DIR=%GOPATH_DIR%\bin"
)
if not "%GO_BIN_DIR%"=="" set "PATH=%GO_BIN_DIR%;%PATH%"

where wails >nul 2>nul
if errorlevel 1 (
  echo Wails CLI is not installed. Installing Wails now...
  go install github.com/wailsapp/wails/v2/cmd/wails@latest
  if errorlevel 1 (
    echo Failed to install Wails CLI.
    pause
    exit /b 1
  )
)

if not exist "ui\node_modules" (
  echo Installing frontend dependencies...
  pushd ui
  npm install
  if errorlevel 1 (
    popd
    echo Failed to install frontend dependencies.
    pause
    exit /b 1
  )
  popd
)

echo Running tests...
go test ./...
if errorlevel 1 (
  echo Tests failed.
  pause
  exit /b 1
)

echo Preparing Markiva icons...
powershell -NoProfile -ExecutionPolicy Bypass -File "scripts\generate-markiva-icons.ps1"
if errorlevel 1 (
  echo Failed to prepare Markiva icons.
  pause
  exit /b 1
)
ffmpeg -y -v error -i "assets\markiva-logo.png" -filter_complex "[0:v]split=5[v16][v32][v48][v128][v256];[v16]scale=16:16[s16];[v32]scale=32:32[s32];[v48]scale=48:48[s48];[v128]scale=128:128[s128];[v256]scale=256:256[s256]" -map "[s16]" -map "[s32]" -map "[s48]" -map "[s128]" -map "[s256]" "build\windows\icon.ico"
if errorlevel 1 (
  echo Failed to create Windows icon.
  pause
  exit /b 1
)

taskkill /F /IM "Markiva.exe" >nul 2>nul
if exist "build\bin" rmdir /s /q "build\bin"

echo Building installable Markiva setup...
wails build -nsis -trimpath -ldflags "-s -w" -webview2 download
if errorlevel 1 (
  echo Installer build failed.
  pause
  exit /b 1
)

echo Adding Markdown file associations to installer...
powershell -NoProfile -ExecutionPolicy Bypass -File "scripts\patch-nsis-markiva.ps1"
if errorlevel 1 (
  echo Failed to patch installer script.
  pause
  exit /b 1
)
makensis "-DARG_WAILS_AMD64_BINARY=..\..\bin\Markiva.exe" "build\windows\installer\project.nsi"
if errorlevel 1 (
  echo Failed to rebuild installer with Markdown associations.
  pause
  exit /b 1
)

if exist "build\bin\Markiva.exe" (
  echo.
  echo Markiva app built successfully:
  echo build\bin\Markiva.exe
)

if exist "build\bin\Markiva-amd64-installer.exe" (
  ren "build\bin\Markiva-amd64-installer.exe" "Markiva-Setup.exe" >nul 2>nul
)

if exist "build\bin\Markiva-Setup.exe" (
  echo Markiva installer built successfully:
  echo build\bin\Markiva-Setup.exe
  pause
  exit /b 0
)

echo Build finished, but build\bin\Markiva-Setup.exe was not found.
pause
exit /b 1
