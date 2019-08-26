# First Laravel Lesson

## Steps to start coding

### 1. Clone repository
### 2. Initialize Laravel/Composer:

```
composer install
```
### 3. Install NPM Dependencies
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