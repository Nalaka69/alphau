@echo off

REM Check if VLC is running
tasklist /FI "IMAGENAME eq vlc.exe" 2>NUL | find /I /N "vlc.exe">NUL
if "%ERRORLEVEL%"=="0" (
    REM Try to terminate VLC
    taskkill /F /IM vlc.exe > nul 2>&1

    REM Check termination status
    if ERRORLEVEL 1 (
        echo Failed to terminate VLC. Please ensure you have sufficient privileges.
    ) else (
        echo VLC media player was running and has been closed.
    )
) else (
    echo VLC media player is not currently running.
)

pause
