## Migraine Diary

This web application provides an online resource for a migraine sufferer to provide a more organised means of maintaining a migraine diary and to provide indications of the users possible triggers. The web application has the following:

- General Information Homepage
- Log In and Registration System
- Migraine Diary (View diary entries in chronological order (most recent first), create, update and delete entries)
- GP Tracker (View GP visit entries in chronological order (most recent first), create, update and delete entries)
- Analysis

## Dependencies

- Composer
- Laravel
- SQLite
- PHP

## How to install PHP
**Installation instructions is based on a windows operating system and linux, PHP should be pre-installed in macOS**

**Windows**

[Instructions found at sitepoint](https://www.sitepoint.com/how-to-install-php-on-windows/)

- [Head to PHP download page](https://www.php.net/downloads)
- Apache should be optional
- Click on 'Windows Downloads
- Download the **Thread Safe** zip file
- Create a new php folder in the root of the C:\ drive and extract the contents of the zip file into the new php folder (can be stored anywhere but is easier to create paths from there)
- In the php folder, create a new file called php.ini
- Copy the contents of php.ini-development into the php.ini (several lines may need to be changed, usually by removing the ; to uncomment that setting. [**Follow step 3 of 'How to install PHP'**](https://www.sitepoint.com/how-to-install-php-on-windows/))
- Search for 'environment' in the windows search and click on **Edit the system environment variables**
- Select the Advanced tab
- Click the Environment Variables button
- Scroll down the System Variables list until you find Path
- Click on Path and then click the Edit button
- Click New and add C:\php
- Click the OK button on all application windows
- Open the command prompt and type 'php -v'
- The version should be displayed

[As an alternative, you can follow the instructions in this YouTube video](https://www.youtube.com/watch?v=FcU6CaIjBqo)

**Linux**

[Instructions found at GeeksforGeeks](https://www.geeksforgeeks.org/how-to-install-php-on-linux/)

- Open the terminal
- Enter: sudo apt-get update
- Enter: sudo apt-get upgrade
- Enter: sudo apt-get install php
- Enter Y for any prompts
- Enter: php -v
- The version should be displayed

## How to Install SQLite
**Installation instructions is based on a windows operating system, SQLite should be pre-installed in macOS and Linux**

**Windows**

- Go to the [SQLite download page](https://www.sqlite.org/download.html)
- In the Precompiled Binaries for Windows Section, download the 'sqlite-tools-win32-x86-.... .zip' file (the .... would be a series of numbers)
- In the C:\ root, create a folder called sqlite
- Extract the content of the zip file into the sqlite folder. sqldiff.exe, sqlite3.exe and sqlite3_analyzer.exe should now be in C:\sqlite folder
- Search for 'environment' in the windows search and click on **Edit the system environment variables**
- Select the Advanced tab
- Click the Environment Variables button
- Scroll down the System Variables list until you find Path
- Click on Path and then click the Edit button
- Click New and add C:\sqlite
- Click the OK button on all application windows
- Open the command prompt and type 'sqlite3'
- The SQLite shell should displayed
- Press ctrl + c to exit

[Instructions are found at this link](https://www.sqlitetutorial.net/download-install-sqlite/)

However, adding to System variables is not shown in the link above but it allows sqlite shell to be accessed anywhere in the terminal or command prompt, otherwise navigate to the folder in the command prompt and enter sqlite3

[Alternatively, you can follow the steps in this video, please note that from the 2 minutes and 25 seconds point in the video is extra and is not necessary to implement](https://www.youtube.com/watch?v=L3FwRRx6bqo)

## How to install composer

**PHP must be installed before installing Composer**

To install composer you can follow the instructions on this [link](https://getcomposer.org/doc/00-intro.md)

Alternatively, you can follow the instructions below

**Windows**

[Instructions from Geeks for Geeks](https://www.geeksforgeeks.org/how-to-install-php-composer-on-windows/)

- Navigate to the [composer web page](https://getcomposer.org/)
- Click on the Download button
- Scroll down to 'Installation - Windows' and click on 'Composer-Setup.exe' to download the set up file
- Open Composer-Setup.exe to start the installation
- Click on 'Install for all users'
- Click on 'next' for each step, and then click install. (**For settings check make sure the location for php.exe is correct. Should be found automatically but it should be in the php folder created when installing PHP**)
- Wait for the installation to complete then click 'next' and then 'finish'
- Open Command prompt and type composer and press enter. 
- A lot of text should appear with 'Composer' appearing in bigger text at the start

**Linux**

[Instructions from Geeks for Geeks](https://www.geeksforgeeks.org/how-to-install-and-use-php-composer-on-linux/)

- Open the terminal
- Enter the following command: curl -Ss https://getcomposer.org/installer | php
- The step above may take a few minutes
- Next enter the following command: sudo mv composer.phar /usr/local/bin/composer
- Next enter the following command: chmod +x /usr/local/bin/composer
- type composer and press enter
- A lot of text should appear with 'Composer' appearing in bigger text at the start

**Mac**

[Instructions from Geeks for Geeks](https://www.geeksforgeeks.org/how-to-install-php-composer-on-macos/)

- Open the terminal
- Enter the following commands in order (may have to do each individually):

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

php composer-setup.php

php -r "unlink('composer-setup.php');"

- Composer should be installed but can't be globally accessed. To check installation enter the command: php composer.phar
- A lot of text should appear with 'Composer' appearing in bigger text at the start
- To access Composer globally, you'll need to put the composer.phar file into a folder on your 'PATH', which is done by entering this command: sudo mv composer.phar /usr/local/bin/composer
- type composer and press enter
- A lot of text should appear with Composer appearing in bigger text at the start


## How to install Laravel

Instructions below show how to create a Laravel project

- Open the command prompt or terminal
- Enter the command to start a new project in the desired folder: composer create-project laravel/laravel name_of_project
- Alternatively, you can create a project with the command: laravel new name_of_project
- A laravel project should be created (You may have to wait a few minutes)
- Navigate into project
- Enter the command: php artisan serve
- A URL (something like: http://127.0.0.1:8000) should be provided, copy and paste into the browser
- A laravel splash page should be displayed
- Visit the [Laravel Documentation](https://laravel.com/docs/9.x) for other configurations

For this web application, clone the code using Git Bash or download the zip file by clicking the code button, found next to the about section, into the desired folder and then extract the project. Then navigate into the project root folder in the command prompt or terminal and enter the command: 

php artisan serve

Enter the URL (something like: http://127.0.0.1:8000) provided into a browser and the homepage of the web application should display as the repository has been set up to be fully operational upon download