@echo off
setlocal

cd /d "%~dp0"

where php >nul 2>nul
if errorlevel 1 (
  echo PHP is not installed or is not available in PATH.
  echo Install PHP or add it to PATH, then run this file again.
  pause
  exit /b 1
)

set "HOST=127.0.0.1"
set "PORT=8088"
set "URL=http://%HOST%:%PORT%/"

netstat -ano | findstr /R /C:":%PORT% .*LISTENING" >nul 2>nul
if errorlevel 1 (
  echo Starting Markiva website at %URL%
  start "Markiva Website Server" /min php -S %HOST%:%PORT% -t "%~dp0"
  timeout /t 2 /nobreak >nul
) else (
  echo A local server is already listening on port %PORT%.
)

echo Opening %URL%
start "" "%URL%"

echo.
echo Markiva website is running at:
echo %URL%
echo.
echo Close the "Markiva Website Server" window to stop the PHP server.
pause
