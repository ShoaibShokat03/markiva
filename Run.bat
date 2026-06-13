@echo off
setlocal

cd /d "%~dp0"

where go >nul 2>nul
if errorlevel 1 (
  echo Go is not installed or is not available in PATH.
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

where npm >nul 2>nul
if errorlevel 1 (
  echo Node.js/npm is not installed or is not available in PATH.
  pause
  exit /b 1
)

where wails >nul 2>nul
if errorlevel 1 (
  echo Wails CLI is not installed. Installing Wails now...
  go install github.com/wailsapp/wails/v2/cmd/wails@latest
  if errorlevel 1 (
    echo Failed to install Wails CLI.
    pause
    exit /b 1
  )
  if not "%GO_BIN_DIR%"=="" set "PATH=%GO_BIN_DIR%;%PATH%"
  where wails >nul 2>nul
  if errorlevel 1 (
    if exist "%GO_BIN_DIR%\wails.exe" (
      set "WAILS_EXE=%GO_BIN_DIR%\wails.exe"
    ) else (
      echo Wails installed, but wails.exe could not be found.
      echo Expected location:
      echo %GO_BIN_DIR%\wails.exe
      pause
      exit /b 1
    )
  )
)

if "%WAILS_EXE%"=="" set "WAILS_EXE=wails"

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

echo Starting Markdown Docs in development mode...
%WAILS_EXE% dev
if errorlevel 1 (
  echo Markdown Docs failed to start.
  pause
  exit /b 1
)
pause
exit /b %errorlevel%
