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

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
