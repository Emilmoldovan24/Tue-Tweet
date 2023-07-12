# Welcome to our Project Tue-Tweet

![Tue-Tweet](https://github.com/Emilmoldovan24/Tue-Tweet/assets/92357718/a4cfc58a-39dc-4136-8760-70111d06a1eb)

 
## Technologies
* Apache 2.4.56
* MySQL 10.4.28
* PHP 8.2.4
* Laravel Framework 10.13.1
* Mailtrap

## Features
### Users
* Authentication and Email validation. 
* Can Add Tweets, Comments, Likes, Retweets.
* Can Delete/Edit Tweets, Comments, Retweets.
* Can update Tweets, Comments, Retweets.
* Get notifications when someone comment, retweet or like tweet or follow.
* Can add Images to Tweets.
* Can hide Tweets from public.
* Can follow other Users.
* Can edit profile.
* Can sort the feed by: newest, most comments, most likes, most retweets.
* Can search in feed. 
* Can Download his Informations(tweets,comments,retweets,likes,follows) as .txt file.
* Can change Log-in Informations(Password , Mail). 

### Admins
* One super Admin can create new Admins.
* Can activae/deactivate Users.
* Reset User Password.
* Delete User Tweets, Comments, Retweets
* Hide Tweets, Comments, Retweets from public.
* Dwownload User Infomations (tweets,comments,retweets,likes,follows) as .txt file.
## Installation
* Install [Apache](https://httpd.apache.org/docs/2.4/install.html)
* Install [MySQL](https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/)
* Install [PHP](https://www.php.net/manual/en/install.php)
* Install [Laravel](https://laravel.com/docs/7.x/installation)
* Create a [Mailtrap](https://mailtrap.io/) Account

After you have installed this, please follow these instructions:
* Create a new Database **twitterdatabase** in your MySQL Environment (for Example: the first 2 Steps with [MyPHPAdmin](https://www.geeksforgeeks.org/how-to-create-a-new-database-in-phpmyadmin/))
* [Clone](https://docs.github.com/de/repositories/creating-and-managing-repositories/cloning-a-repository) this Repository on your Local System.
* open a terminal in this folder and enter the following commands one after the other (this may take some time)
*     composer update
*     php artisan migrate:fresh
*     php artisan db:seed --class=tweetSeeder
*     php artisan serve

Now you can open and use the app with *http://127.0.0.1:8000* in your favourite browser.  
    

## Responsibilities

Database : Markus Holder  
Authentication: Emil Moldovan

User: Aya Afaghani, Julia Egyed, Luke Vallon

Admin: Lukas Lorentz, Benno
