@echo off
setlocal
REM Import a .sql file without browser timeouts. Usage:
REM   import_database.bat "C:\path\to\your\dump.sql"
REM Edit MYSQL and DB below if your XAMPP path or database name differs.

set "MYSQL=C:\xampp\mysql\bin\mysql.exe"
set "DB=dental_project"

if "%~1"=="" (
  echo Usage: %~nx0 "full\path\to\file.sql"
  exit /b 1
)

if not exist "%MYSQL%" (
  echo MySQL client not found at: %MYSQL%
  exit /b 1
)

if not exist "%~1" (
  echo SQL file not found: %~1
  exit /b 1
)

echo Importing into %DB% ...
"%MYSQL%" -u root "%DB%" < "%~1"
if errorlevel 1 (
  echo Import failed. If the database is missing, create it in phpMyAdmin first, or run:
  echo   "%MYSQL%" -u root -e "CREATE DATABASE IF NOT EXISTS %DB% CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
  exit /b 1
)
echo Done.
exit /b 0
