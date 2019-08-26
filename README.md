# First Laravel Lesson

## Steps to start coding

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
If you have any ``ermission denied`` error messages, type following into terminal:
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
brew install mariadb
```
Take any login-Information into .env file (MSQL-Section) 
```
mysql.server start
```
```
brew services start mariadb
```
### 7. Seed the DB (optional)
(Hint: use "laravel" as db for this Project)
```
php artisan db:seed
```
Reset root-user (for MySQL) on macos?
```
ALTER USER 'root'@'localhost' IDENTIFIED BY '';
```

#### Sourcelist
- https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/
- https://mariadb.com/kb/en/library/installing-mariadb-on-macos-using-homebrew/
- https://www.digitalocean.com/community/tutorials/how-to-reset-your-mysql-or-mariadb-root-password