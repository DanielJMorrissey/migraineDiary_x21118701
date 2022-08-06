## Migraine Diary

This web application provides an online resource for a migraine sufferer to provide a more organised means of maintaining a migraine diary and to provide indications of the users possible triggers. The web application has the following:

- General Information Homepage
- Log In and Registration System
- Migraine Diary (View diary entries in chronological order, most recent first, update and delete entries)
- GP Tracker (View GP visit entries in chronological order, most recent first, update and delete entries)
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
- Copy the contents of php.ini-development into the php.ini (several lines may need to be changed, usually by removing the ; to uncomment that setting. [**Follow step 3 of How to install PHP**](https://www.sitepoint.com/how-to-install-php-on-windows/))
- Search for 'environment' in the windows search and click on **Edit the system environment variables**
- Select the Advanced tab
- Click the Environment Variables button
- Scroll down the System Variables list until you find Path
- Click on Path and then click the Edit button
- Click New and add C:\php
- Click the OK button on all application windows
- Open the command prompt and type 'php -v'
- The version should displayed

**Linux**

[Instructions found at GeeksforGeeks](https://www.geeksforgeeks.org/how-to-install-php-on-linux/)

- Open the terminal
- Enter: sudo apt-get update
- Enter: sudo apt-get upgrade
- Enter: sudo apt-get install php
- Enter Y for any prompts
- Enter: php -v
- The version should be displayed

### How to Install SQLite
**Installation instructions is based on a windows operating system, SQLite should be pre-installed in macOS and Linux**

**Windows**

- Go to the [SQLite download page](https://www.sqlite.org/download.html)
- In the Precompiled Binaries for Windows Section, download the 'sqlite-tools-win32-x86-.... .zip' file (the .... would be a series of numbers)
- In the C:\ root, create a folder called sqlite
- Extract the content of the zip file into the sqlite folder
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

However, adding to System variables is not shown in the link above but it allows sqlite shell to be accessed anywhere, otherwise navigate to the folder and enter sqlite3

## How to install composer

To install composer follow the instructions on this [link](https://getcomposer.org/doc/00-intro.md)

## How to install Laravel

Instructions below show how to create a Laravel project

- Open the command prompt or terminal
- Enter the command to start a new project in the desired folder: composer create-project laravel/laravel name_of_project
- Alternatively, you can create a project with the command: laravel new name_of_project
- A laravel project should be created
- cd into project
- Enter the command: php artisan serve
- A URL should be provided, copy and paste into the browser
- A laravel splash page should be displayed
- Visit the [Laravel Documentation](https://laravel.com/docs/9.x) for other configurations

For this web application, clone the code or download the zip file by clicking the code button, found next to the about section into the desired folder and then navigate into the project root folder in the command prompt or terminal and enter the command: 

php artisan serve

Enter the URL provided into a browser and the homepage of the web application should display