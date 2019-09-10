# First Laravel Lesson

## Steps to start coding on MacOSX

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
php artisan make:migration create_projects_table
```
Next:
```
php artisan migrate:install
```
### 8. Update/Migrate new or changed DB-Schema from (pulled) repository
Update:
```
php artisan migrate:fresh
```
Reset and re-run migrations:
```
php artisan migrate:refresh
```
"Panic" Rollback to last database migration?
```
php artisan migrate:rollback
```
 
### 9. Seed the DB (optional)
(Hint: use "laravel" as db for this Project)
```
php artisan db:seed
```
Authentication-Failure?

> Reset root-user (for MySQL)!
```
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '!!!YOURNEWPASSWORD!!!';
```

### This Development uses Mailtrap.io
https://mailtrap.io

#### Sources
- https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/
- https://mariadb.com/kb/en/library/installing-mariadb-on-macos-using-homebrew/
- https://www.digitalocean.com/community/tutorials/how-to-reset-your-mysql-or-mariadb-root-password
- https://stackoverflow.com/questions/49194719/authentication-plugin-caching-sha2-password-cannot-be-loaded
