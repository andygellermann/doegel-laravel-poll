# First Laravel Lesson

## Steps to start coding on MacOSX (partially Windows...)

### 1. Clone repository
### 2. Initialize Laravel/Composer:

```
composer update
```
```
composer install
```
### 3. Create .env file
```
cp .env.example .env
```
### 4. Start migration into .env file
```
php artisan migrate
```
### 5. Install NPM Dependencies
Just like how we must install composer packages to move forward, we must also install necessary NPM packages to move forward. This will install Vue.js, Bootstrap.css, Lodash, and Laravel Mix.

This is just like step 4, where we installed the composer PHP packages, but this is installing the Javascript (or Node) packages required. The list of packages that a repo requires is listed in the packages.json file which is submitted to the github repo. Just like in step 4, we do not commit the source code for these packages to version control (github) and instead we let NPM handle it.
```
npm install
```
If you have any ``permission denied`` error messages, type following into terminal:
```
sudo chown -R $(whoami) ~/.npm
```
if you have a `npm update check failed` Message, please try the following codeline:
```
sudo chown -R $(whoami):$(id -gn $(whoami)) /Users/andygellermann/.config 
```
### 6. DB-Support
Dont forget MySQL Support:
```
brew install mysql
```
or alternative to MySQL
```
brew install mariadb
```
Put any login-Information into .env file (MSQL-Section) an execute following code.
Single Session execution
```
mysql.server start
```
Start MySQL at system startup (automatically)
```
brew services start mysql
```
Start MySQL (Mariadb) at system startup:
```
brew services start mariadb
```
If you get following errormessage:  ```mysql: Can't read dir of '/usr/local/etc/my.cnf.d' (OS errno 2 - No such file or directory)```
```
mkdir /usr/local/etc/my.cnf.d
```
and:
```
brew postinstall mysql
```
Do you have any problems?
1. Remove MySQL completely and use following Instructions:
https://stackoverflow.com/questions/4359131/brew-install-mysql-on-macos
### 7. Install DB-Schema
```
php artisan migrate:install
```
### This Development uses Mailtrap.io
https://mailtrap.io
For using Mailtrap, change your .env -File like below
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=YOUR_CRYPT_KEY_USERNAME
MAIL_PASSWORD=YOUR_CRYPT_KEY_PASSWORD
MAIL_ENCRYPTION=null
```

#### Sources
- https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/
- https://mariadb.com/kb/en/library/installing-mariadb-on-macos-using-homebrew/
- https://www.digitalocean.com/community/tutorials/how-to-reset-your-mysql-or-mariadb-root-password
- https://stackoverflow.com/questions/49194719/authentication-plugin-caching-sha2-password-cannot-be-loaded
