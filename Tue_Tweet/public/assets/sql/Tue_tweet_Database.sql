/*
MY-SQL version 8.0.13
PHP Version 8.2.4

Server: 127.0.0.1 via TCP/IP
User: root
Database Schema for the Tue-Tweet project
*/
-- Create of Table users
-- table users contains the following information :

-- id               -> unique id to distinguish the users PRIMARY KEY
-- username         -> name of the user
-- email            -> email of a user to log in
-- user_password    -> self-created password of the user 
-- profile_bio      -> Self-created small text about the user, default null
-- profile_img      -> self-selected profile picture, default null
-- visibility       -> drag flag shows if the user is visible for users, default true
-- created_at       -> timestamp when the user was created
-- updated_at       -> timestamp when the user was last updated
-- deleted_at       -> timestamp for softDelete
-- activate         ->flag whether a user is still active, default true
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id                INT           AUTO_INCREMENT PRIMARY KEY,
  username          VARCHAR(30)   UNIQUE NOT NULL,
  email             VARCHAR(50)   UNIQUE NOT NULL,
  user_password     VARCHAR(60)   NOT NULL,
  profile_bio       VARCHAR(255)  DEFAULT NULL,
  profile_img       LONGBLOB      DEFAULT NULL,
  visibility        BOOLEAN       DEFAULT TRUE,
  created_at        TIMESTAMP     DEFAULT CURRENT_TIMESTAMP,
  updated_at        TIMESTAMP     DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at        TIMESTAMP     NULL DEFAULT NULL,
  activate          BOOLEAN       DEFAULT TRUE
 );

/*
filling of users for exercise purposes
*/
INSERT INTO users ( username, email, user_password, profile_bio, profile_img, visibility ,  created_at, updated_at) 
VALUES( "Thomas", "thomas@yahoo.de", "$2y$10$VWpj8hFUv3hkzS10l8O6buK/T/yUT7iWJ929XzCN5gYadHlo6qRs2", "Hi my name is Thomas, i am from Stuttgart", NULL, TRUE, '2023-05-09 12:56:21','2023-05-09 12:56:21'),
      ( "Klaus",  "klaus@yahoo.de",  "$2y$10$VWpj8hFUv3hkzS10l8O6buK/T/yUT7iWJ929XzCN5gYadHlo6qRs2", "Hi my name is Klaus, i am from Esslingen",  NULL, TRUE, '2023-05-09 12:57:21','2023-05-09 12:57:21'),
      ( "Peter",  "peter@yahoo.de",  "$2y$10$VWpj8hFUv3hkzS10l8O6buK/T/yUT7iWJ929XzCN5gYadHlo6qRs2", "Hi my name is Peter, i am from Tübingen",   NULL, TRUE, '2023-05-09 12:58:21','2023-05-09 12:58:21'),
      ( "Susi",   "susi@yahoo.de",    "$2y$10$VWpj8hFUv3hkzS10l8O6buK/T/yUT7iWJ929XzCN5gYadHlo6qRs2", "Hi my name is Susi, i am from Tübingen",    NULL, TRUE, '2023-05-09 12:58:21','2023-05-09 12:58:21'),
      ( "Sarah",  "sarah@yahoo.de",   "$2y$10$VWpj8hFUv3hkzS10l8O6buK/T/yUT7iWJ929XzCN5gYadHlo6qRs2", "Hi my name is Sarah, i am from Tübingen",   NULL, TRUE, '2023-05-09 12:59:21','2023-05-09 12:59:21');


-- Create of Table admins
-- table users contains the following information :

-- id               -> unique id to distinguish the users PRIMARY KEY
-- adminname        -> name of the admin
-- email            -> email of a user to log in
-- user_password    -> self-created password of the user
-- activated        -> flag whether a admin is still active, default true
-- super Admin      -> flag indicating if the admin is a super admin, default false
-- created_at       -> timestamp when the admin was created
-- deleted_at       -> timestamp for softDelete
-- updated_at       -> timestamp when the admin was last updated
DROP TABLE IF EXISTS admins;
CREATE TABLE admins (
  id             INT           AUTO_INCREMENT PRIMARY KEY,
  adminname      VARCHAR(30)   UNIQUE NOT NULL,
  email          VARCHAR(50)   UNIQUE NOT NULL,
  user_password  VARCHAR(60)   NOT NULL,
  activated      BOOLEAN       DEFAULT TRUE,
  super_admin    BOOLEAN       DEFAULT FALSE,
  created_at     TIMESTAMP     DEFAULT CURRENT_TIMESTAMP,
  deleted_at     TIMESTAMP     NULL DEFAULT NULL,
  updated_at     TIMESTAMP     DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    
);

/*
filling of users for exercise purposes
*/
INSERT INTO admins ( adminname, email, user_password, super_admin,   created_at , updated_at) 
VALUES( "Admin1", "admin@1", "$2y$10$VWpj8hFUv3hkzS10l8O6buK/T/yUT7iWJ929XzCN5gYadHlo6qRs2" , TRUE ,  '2023-05-09 12:56:21','2023-05-09 12:56:21');


-- Create of Table tweets
-- table tweets contains the following information :
-- tweet_id         -> unique id to distinguish the tweets PRIMARY KEY
-- user_id          -> user id of the user who submitted the tweet
-- tweet            -> tweet message with maximal 240 characters
-- visibility       -> drag flag shows if the tweet is visible for users, default true
-- own-visibility   -> drag flag shows if the tweet is visible for other users, default true
-- img              -> possible image of a tweet, default null
-- created_at       -> time when the tweet was created
-- deleted_at       -> timestamp for softDelete
-- activate          -> flag whether a tweet is still active, default true
DROP TABLE IF EXISTS tweets;
CREATE TABLE tweets (
  tweet_id              INT         AUTO_INCREMENT PRIMARY KEY,
  user_id               INT         NOT NULL,
  tweet                 TEXT(240)   NOT NULL,
  visibility            BOOLEAN     DEFAULT TRUE,
  own_visibility        BOOLEAN     DEFAULT TRUE,
  img                   LONGBLOB    DEFAULT NULL,
  created_at            TIMESTAMP   DEFAULT CURRENT_TIMESTAMP,
  deleted_at            TIMESTAMP   NULL DEFAULT NULL,
  activate              BOOLEAN     DEFAULT TRUE
);

/*
filling of tweets for exercise purposes
*/
INSERT INTO tweets ( user_id, tweet, visibility , img, created_at) 
VALUES( 1, "Yeah im the First Person who Tweets", TRUE,  NULL, '2023-05-09 14:56:21'),
      ( 1, "Hi my name is Thomas",TRUE,  NULL, '2023-05-09 14:57:21'),
      ( 2, "Welcome to Tue-Tweet Tweet",TRUE,  NULL, '2023-05-09 15:01:21'),
      ( 5, "Hi my name is sarah , whats up?", TRUE,  NULL, '2023-05-09 14:56:21'),
      ( 2, "can someone explain my fault ?",TRUE,  NULL, '2023-05-09 14:57:21'),
      ( 4, "Welcome to Tue-Tweet Tweet",TRUE,  NULL, '2023-05-09 15:01:21'),
      ( 3, "today the food in the canteen was good ", TRUE,  NULL, '2023-05-09 15:57:21');


-- Create of Table comments
-- table comments contains the following information :
-- comment_id -> unique id to distinguish the comments PRIMARY KEY
-- user_id    -> user id of the user who submitted the comment
-- tweet_id   -> to which tweet does the comment refer
-- retweet_id -> to which retweet does the comment refer
-- comment    -> text for the comment 
-- visibility -> drag flag shows if the comment is visible for users, default true
-- created_at -> Time at which comments were made
-- deleted_at -> timestamp for softDelete
-- activate   -> flag whether a comment is still active, default true
DROP TABLE IF EXISTS comments;
CREATE TABLE comments (
  comment_id            INT        AUTO_INCREMENT PRIMARY KEY,
  user_id               INT        NOT NULL,
  tweet_id              INT        DEFAULT NULL,
  retweet_id            INT        DEFAULT NULL,
  comment               TEXT(240)  NOT NULL,
  visibility            BOOLEAN    DEFAULT TRUE,
  created_at            TIMESTAMP  DEFAULT CURRENT_TIMESTAMP,
  deleted_at            TIMESTAMP  NULL DEFAULT NULL,
  activate              BOOLEAN    DEFAULT TRUE
);

/*
filling of comments for exercise purposes
*/
INSERT INTO comments ( user_id, tweet_id, comment, visibility, created_at) 
VALUES( 2, 1, "congratz", TRUE, '2023-05-09 15:56:21'),
      ( 3, 1, "good job", TRUE, '2023-05-09 15:56:21'),
      ( 2, 2, "Thomas Petersen", TRUE, '2023-05-09 15:56:21'),
      ( 3, 4, "nothing , wanna go for a diner?", TRUE, '2023-05-09 15:56:21'),
      ( 5, 7, "oh yeah so true", TRUE, '2023-05-09 15:56:21');



-- Create of Table reetweets
-- table retweets contains the following information :
-- retweet_id       -> unique id to distinguish the reetweets PRIMARY KEY
-- user_id          -> user id of the user who submitted the retweet
-- tweet_id         -> to which tweet does the retweet refer
-- retweet_text     -> text for the retweet
-- visibility       -> drag flag shows if the retweet is visible for users, default true
-- own-visibility   -> drag flag shows if the retweet is visible for other users, default true
-- created_at       -> Time at which retweets were made
-- deleted_at       -> timestamp for softDelete
-- activate         -> flag whether a retweet is still active, default true
DROP TABLE IF EXISTS retweets;
CREATE TABLE retweets (
  retweet_id   INT         AUTO_INCREMENT Primary Key,
  user_id      INT         NOT NULL,
  tweet_id     INT         NOT NULL,
  retweet_text TEXT(240)   DEFAULT NULL,
  visibility               BOOLEAN     DEFAULT TRUE,
  own_visibility           BOOLEAN     DEFAULT TRUE, 
  created_at               TIMESTAMP   DEFAULT CURRENT_TIMESTAMP,
  deleted_at               TIMESTAMP   NULL DEFAULT NULL,
  activate                 BOOLEAN     DEFAULT TRUE
);

/*
filling of retweets for exercise purposes
*/
INSERT INTO retweets ( user_id, tweet_id, retweet_text, visibility, created_at) 
VALUES( 1, 7, "Heal Yeah", TRUE, '2023-05-09 18:56:21'),
      ( 1, 7, "Oh yes", TRUE, '2023-05-09 19:57:21');


-- Create of Table likes
-- table likes contains the following information :
-- like_id      -> unique id to distinguish the likes PRIMARY KEY
-- user_id      -> user id of the user who submitted the like
-- tweet_id     -> to which tweet does the like refer
-- retweet_id   -> to which retweet does the like refer
-- visibility   -> drag flag shows if the like is visible for users, default true
-- created_at   -> Time at which likes were made
-- deleted_at   -> timestamp for softDelete
-- activate     -> flag whether a like is still active, default true
DROP TABLE IF EXISTS likes;
CREATE TABLE likes (
  like_id               INT         AUTO_INCREMENT PRIMARY KEY,
  user_id               INT         NOT NULL,
  tweet_id              INT         DEFAULT NULL,
  retweet_id            INT         DEFAULT NULL,
  visibility            BOOLEAN     DEFAULT TRUE,
  created_at            TIMESTAMP   DEFAULT CURRENT_TIMESTAMP,
  deleted_at            TIMESTAMP   NULL DEFAULT NULL,
  activate              BOOLEAN     DEFAULT TRUE
);

/*
filling of likes for exercise purposes
*/
INSERT INTO  likes ( user_id, tweet_id,retweet_id, created_at) 
VALUES( 3, 3, NULL, '2023-05-09 15:56:21'),
      ( 3, NULL, 2, '2023-05-09 15:56:21'),
      ( 2, 3, NULL, '2023-05-09 16:57:21');


-- Create of Table follows
-- table follows contains the following information :
-- follow_id         -> unique id to distinguish the follows PRIMARY KEY
-- follow_user_id    -> user who follows
-- following_user_id -> user this is followed
-- visibility        -> drag flag shows if the follow is visible for users, default true
-- created_at        -> Time at which follow were made
-- deleted_at        -> timestamp for softDelete
-- activate          -> flag whether a follow is still active, default true
DROP TABLE IF EXISTS follows;
CREATE TABLE follows (
  follow_id             INT        AUTO_INCREMENT PRIMARY KEY,
  follow_user_id        INT        NOT NULL,
  following_user_id     INT        NOT NULL,
  visibility            BOOLEAN    DEFAULT TRUE,
  created_at            TIMESTAMP  DEFAULT CURRENT_TIMESTAMP,
  deleted_at            TIMESTAMP  NULL DEFAULT NULL,
  activate              BOOLEAN    DEFAULT TRUE
);
/*
filling of likes for exercise purposes
*/
INSERT INTO  follows ( follow_user_id,  following_user_id, created_at) 
VALUES( 3, 3, '2023-05-09 15:56:21'),
      ( 1, 2, '2023-05-09 15:56:21'),
      ( 5, 3, '2023-05-09 16:57:21');


-- Create of Table notifications
-- table follows contains the following information :
-- id                -> unique id to distinguish the notifications PRIMARY KEY
-- type              -> what type it is
-- notifiable_type   -> what type of notification
-- notifiable_id     -> which id of notification
-- data              -> whitch data of notification
-- read_at           -> timestamp for read
-- created_at        -> timestamp for create
-- updated_at        -> timestamp when updated

DROP TABLE IF EXISTS notifications;
CREATE TABLE notifications (
  id                    CHAR(36)        PRIMARY KEY,
  `type`                VARCHAR(255)    NOT NULL,
  notifiable_type       VARCHAR(255)    NOT NULL,
  notifiable_id         BIGINT(20)      NOT NULL,
  `data`                TEXT            NOT NULL,
  read_at               TIMESTAMP       NULL DEFAULT NULL,
  created_at            TIMESTAMP       NULL DEFAULT NULL,
  updated_at            TIMESTAMP       NULL DEFAULT NULL
);

-- Index for notifications 
CREATE INDEX notifications_index ON notifications (notifiable_type, notifiable_id);


-- Constraints for the Tables

/*
 Foreign Key from tweets to users
*/
ALTER TABLE tweets
ADD CONSTRAINT FK_tweets_users FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE;

/*
 Foreign Key from comments to users and tweets
*/
ALTER TABLE comments
ADD CONSTRAINT FK_comments_users FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT FK_comments_tweets FOREIGN KEY (tweet_id) REFERENCES tweets(tweet_id) ON DELETE CASCADE ON UPDATE CASCADE;

/*
 Foreign Key from follows to users and users
*/
ALTER TABLE follows
ADD CONSTRAINT FK_follow_users FOREIGN KEY (follow_user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT FK_following_users FOREIGN KEY (following_user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE;

/*
 Foreign Key from retweets to users and tweets
*/
ALTER TABLE retweets
ADD CONSTRAINT FK_retweets_users FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT FK_retweets_tweets FOREIGN KEY (tweet_id) REFERENCES tweets(tweet_id) ON DELETE CASCADE ON UPDATE CASCADE;

/*
 Foreign Key from likes to users and tweets
*/
ALTER TABLE likes
ADD CONSTRAINT FK_likes_users FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT FK_likes_tweets FOREIGN KEY (tweet_id) REFERENCES tweets(tweet_id) ON DELETE CASCADE ON UPDATE CASCADE;


/*
 Trigger for Cascading the Updates on users
 deleted_at
*/

DROP TRIGGER IF EXISTS update_deleted_at;
CREATE TRIGGER update_deleted_at
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.deleted_at IS NOT NULL OR NEW.deleted_at IS NULL THEN
        UPDATE tweets SET deleted_at = NEW.deleted_at WHERE user_id = NEW.id;
        UPDATE comments SET deleted_at = NEW.deleted_at WHERE user_id = NEW.id;
        UPDATE likes SET deleted_at = NEW.deleted_at WHERE user_id = NEW.id;
        UPDATE retweets SET deleted_at = NEW.deleted_at WHERE user_id = NEW.id;
        UPDATE follows SET deleted_at = NEW.deleted_at WHERE follow_id = NEW.id;
    END IF;
END;


/*
 Trigger for Cascading the Updates on users
 visibility
*/

DROP TRIGGER IF EXISTS update_visibility;
CREATE TRIGGER update_visibility
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.visibility <> OLD.visibility THEN
        UPDATE tweets SET visibility = NEW.visibility WHERE user_id = NEW.id;
        UPDATE comments SET visibility = NEW.visibility WHERE user_id = NEW.id;
        UPDATE likes SET visibility = NEW.visibility WHERE user_id = NEW.id;
        UPDATE retweets SET visibility = NEW.visibility WHERE user_id = NEW.id;
        UPDATE follows SET visibility = NEW.visibility WHERE follow_id = NEW.id;
    END IF;
END;

/*
 Trigger for Cascading the Updates on users
 activate
*/

DROP TRIGGER IF EXISTS update_activate;
CREATE TRIGGER update_activate
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.activate  <> OLD.activate THEN
        UPDATE tweets SET activate = NEW.activate  WHERE user_id = NEW.id;
        UPDATE comments SET activate = NEW.activate  WHERE user_id = NEW.id;
        UPDATE likes SET activate  = NEW.activate  WHERE user_id = NEW.id;
        UPDATE retweets SET activate  = NEW.activate  WHERE user_id = NEW.id;
        UPDATE follows SET activate  = NEW.activate  WHERE follow_id = NEW.id;
    END IF;
END;


/*Event that checks once a day whether deleted_at is older than 30 days
*/
SET GLOBAL event_scheduler = ON;

DROP EVENT IF EXISTS delete_old_rows_event;
CREATE EVENT delete_old_rows_event
ON SCHEDULE
  EVERY 1 DAY
  STARTS CURRENT_TIMESTAMP + INTERVAL 1 DAY
DO
  DELETE FROM users WHERE deleted_at < (CURDATE() - INTERVAL 30 DAY);
  


