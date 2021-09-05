# arizone
Airzone Laravel challenge

# Requirements

You will need to install in your local machine:

  - PHP-7.4+
  - MySQL-5.7+

In my case I used my XAMPP and as far as it came with PHP7.3, I uploaded it to PHP 8.0

# 1st Commit - Installation

I simply go to my XAMPP public folder with:

  - cd /Applications/XAMPP/htdocs

And I launched my composer (I already have a global installation, if it's not the case, you probably will need to get the composer.phar file and launch cometihng like "php composer.phar" instead of the "composer" command) for creating my laravel project called "airzone":

  - composer create-project laravel/laravel airzone

I bound the laravel project to my github repository by initiating the git project and adding the remote:

  - git init
  - git remote add origin https://{My_personal_github_token}@github.com/agv-dev/airzone.git 

I commented the .gitignore file in order to comment the ignore of the .env file as fas as you will need to see how I configure the DB. Normally, the .env file will not be accessible in git. I changed this params:

  APP_NAME=Airzone
  DB_DATABASE=airzone
  DB_USERNAME=root
  DB_PASSWORD=?????

As far as it looks like I have some problems with the folder premissions, I will use those commands:

  - sudo chown -R albertogorostiaga:admin storage
  - sudo chown -R albertogorostiaga:admin bootstrap/cache
  - sudo chmod -R 777 storage
  - sudo chmod -R 777 bootstrap/cache

Now Looks like I can add the code to the project and make the first commit.

  - git add .
  - git commit -am "Inicialización del proyecto"
  - git push -u origin master

# 2nd Commit. Creating models

I simply create the models by using the artisan:

  - php artisan make:model User (As far as it already exists...but the auth is not required in the APi I deleted the curent model at app/models/User.php before to create this one)
  - php artisan make:model Category
  - php artisan make:model Post
  - php artisan make:model Comment

I already set some configuration as the table name, primarykeys and son on...

# 3rd Commit. Model-Relations

