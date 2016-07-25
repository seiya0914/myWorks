@ECHO OFF

IF %1.==. GOTO Usage

set PATH=%~dp0;%~dp0php70\;
echo %PATH%

php composer.phar create-project laravel/laravel %1
pause;
GOTO End

:Usage
	ECHO usage: createL NameOfLaravelProject
:End