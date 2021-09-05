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

I added the required relationships to the models as you can check looking at the changes of the 3rd commit in the app/Models/ folder

# 4th Commit. API: Category Crud and showPosts endpoint

I created an extra "users" relation at Post model and

And I have also created the Controllers (CategoryController and PostController) by using artisan:

  - php artisan make:controller CategoryController --resource --model=Category --api
  - php artisan make:controller PostController --api --model=Post

And I confirmed the routes by using:

  - php artisan route:list

In order to test the relations I used tinker and in order to test the API I used Postman (I will add a postman file called airzone.postman_collection.json at the root of the project with the export of the requests I made in order to allow you to check them)

# Extra
I forgot that sometimes, when you want to reestructure your project composer/dependencies, you can do it with:

  - composer dump-autoload -o

I also forget to tell how I inserted the data into the DB fromt the provided sql file... I simply created one DB using PhPMyadmin (But you can use "CREATE DATABASE airzone CHARACTER SET utf8 COLLATE utf8_general_ci;"...you can also create an user for this DB instead of using the root one, but it was not demanded) and import the file as:

  - mysql -u root -p airzone < prueba_incorporacion.sql

Of course I could create the migrations and also the factories/seeders. Specially, it will be helpful once I will need to create the environment (with setUp() and tearDown()) for testing, as far as I will need to migrate with refreshing and forcing each time in order to apply the correct seeds for ensure the DB data will match my request extepected return at each test.
