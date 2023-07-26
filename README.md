# Welcome to our Project Tue-Tweet

![Tue-Tweet](https://github.com/Emilmoldovan24/Tue-Tweet/assets/92357718/a4cfc58a-39dc-4136-8760-70111d06a1eb)

 
## Technologies
* Apache 2.4.56
* MySQL 10.4.28
* PHP 8.2.4
* Laravel Framework 10.13.1
* Mailtrap
* JavaScript

## Features
### Users
* Authentication and Email validation. 
* Can Add Tweets, Comments, Likes, Retweets.
* Can Delete Tweets, Comments, Retweets.
* Can Edit Tweets, Comments, Retweets.
* Get notifications when someone comments, retweets, likes, tweets or follows.
* Can post images to tweets.
* Can hide/unhide tweets from public
* Can see hidden tweets on own profile page
* Can follow other users.
* Can edit profile information
* Can sort the feed by: newest, most comments, most likes, most retweets.
* Can search for tweets/retweets in feed.
* Can see another users tweets and profile (by clicking on the name)
* Can Download his Informations(tweets,comments,retweets,likes,follows) as .txt file.
* Can change Log-in Informations(Password , Mail). 

### Admins
* One super Admin can create new Admins.
* One super Admin can delete/restore Admins.
* One super Admin can activate/deactivate Admins.
* Delete/restore Users.
* Hide/unhide Users.
* Reset User Password.
* Delete/restore User Tweets, Comments, Retweets
* Hide/unhide User Tweets, Comments, Retweets
* Download User Infomations (tweets,comments,retweets,likes,follows) as .txt file.
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

## Database Schema

* Look at the ER-Diagram of the twitterdatabase:
* [ER-Diagram](https://github.com/Emilmoldovan24/Tue-Tweet/assets/92357718/aab35ba9-87cf-4609-9913-5eae2f5b995f)
* Or [ER-Diagram.pdf](https://github.com/Emilmoldovan24/Tue-Tweet/files/12079104/ER-Diagram.pdf)
    

## Responsibilities

Database : Markus Holder  

Authentication: Emil Moldovan

User: Aya Afaghani, Julia Egyed, Luke Vallon

Admin: Lukas Lorentz, Benno
