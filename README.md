# Business Integrator Skeleton

date.build : 2020.06.11_19.43.11

About
-----

A framework for rapid busness app development

## Installation

### Install Composer

#### Composer in Linux
Required packages

```bash
sudo apt-get update
sudo apt-get install curl php-cli php-mbstring git unzip
cd ~
```

[Install Composer](https://getcomposer.org/download/)

```bash
sudo mv composer.phar /usr/local/bin/composer
```

#### Composer in Mac

```bash
cd ~
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/
sudo chmod 755 /usr/local/bin/composer.phar
# for bash:
echo 'alias composer="php /usr/local/bin/composer.phar"' >> ~/.bash_profile
source ~/.bash_profile
# for zsh
echo 'alias composer="php /usr/local/bin/composer.phar"' >> ~/.zshrc
source ~/.zshrc
# finally
composer --version
```

### Install skeleton

```bash
cd /var/www/

composer clearcache

composer create-project rozdol/bi-skel bi-framework dev-master

cp bi-framework/src/.env.example bi-framework/src/.env
```

Run manually if the folder structure is not ready:

```bash
mv  tmp/public/assets ./public/
mv  tmp/root/bi ./
mv  tmp/src/src ./
rm -rf tmp
cp ./src/.env.example ./src/.env
cat post_update.txt > post_update.sh
```

- edit `src/.env`

- Point your webserver to `/var/www/bi-framework/public`

or

```bash
cd /var/www/bi-framework/public
php -S localhost:8000
```

### App is ready

Username: admin
Password: Pass1234

Click on `Update System` to update database

## Replace default `src` with your project

```bash
cd /var/www/

git clone https://rozdol:[password]@github.com/rozdol/bi-src-is.git

rm -r bi-framework/src/
ln -s $(pwd)/bi-src-is/ bi-framework/src

```

# Develop App

```bash
cd bi-framework

git init
git add .
git commit -m 'initial'
```

Start develop app...

# Develop BI components, actions and app separately but in own workspace



```bash
composer remove rozdol/bi-root --no-scripts
composer remove rozdol/loans --no-scripts
composer remove rozdol/payroll --no-scripts
composer remove rozdol/bi --no-scripts
composer remove rozdol/bi-assets --no-scripts

composer require vlucas/phpdotenv --no-scripts
composer require phpoffice/phpword --no-scripts
composer require lukascivil/treewalker --no-scripts
composer require sendgrid/sendgrid --no-scripts
composer require usmanhalalit/pixie --no-scripts
composer require firebase/php-jwt --no-scripts
```
or change `composer.json`

```json
"require": {
    "vlucas/phpdotenv": "^2.5",
    "phpoffice/phpword": "^0.14.0",
    "lukascivil/treewalker": "^0.9.0",
    "sendgrid/sendgrid": "^7.0",
    "phpmyadmin/sql-parser": "^4.3",
    "mashape/unirest-php": "^3.0"
}
```

section `"scripts"` should be removed to avoid coposer delete and recreate default source code.

```bash
composer update --no-scripts

mkdir symlinks
cd symlinks

ln -s ../../components/bi/src/Bi/*.php ./
ln -s ../../components/bi/src/Utils/*.php ./
ln -s ../../components/loans/src/Loans/*.php ./
ln -s ../../components/payroll/src/Payroll/*.php ./

rm -Rf ./public/assets
cd ../public
ln -s ../../bi-assets ./assets
cd ..

rm -Rf ./bi
ln -s ../bi-root ./bi


rm -Rf src
rm -Rf .git
ln -s ../projects/bi-src-myproject ./src
```

```bash
composer dump

cd public
php -S localhost:8000
```




Maintain repositories separately and reassemble them via [rozdol/bi-skel](https://github.com/rozdol/bi-skel)
- [rozdol/bi-skel](https://github.com/rozdol/bi-skel) - boilerplate for new projects
- [rozdol/bi](https://github.com/rozdol/bi) - set of functions, helpers and classes
- [rozdol/bi-root](https://github.com/rozdol/bi-root) -  default set of actions, helpers and classes
- [rozdol/bi-assets](https://github.com/rozdol/bi-assets) - js, css, etc.
- [rozdol/loans](https://github.com/rozdol/loans) - module to work with loans
- [rozdol/payroll](https://github.com/rozdol/payroll) - module to work with payrolls

