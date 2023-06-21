/*
MY-SQL version 8.0.13
PHP Version 8.2.4

Server: 127.0.0.1 via TCP/IP
User: root
Database Schema for the Tue-Tweet project
*/
set global sql_mode = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
-- Create of Table users
-- table users contains the following information :

-- user_id     -> unique id to distinguish the users PRIMARY KEY
-- username    -> name of the user
-- email       -> email of a user to log in
-- password    -> self-created password of the user
-- profile_bio -> Self-created small text about the user
-- profile_img -> self-selected profile picture
-- created_at  -> Time when the user was created
CREATE TABLE users (
  id                INT           AUTO_INCREMENT PRIMARY KEY,
  username          VARCHAR(30)   UNIQUE NOT NULL,
  email             VARCHAR(50)   UNIQUE NOT NULL,
  user_password     VARCHAR(60)   NOT NULL,
  profile_bio       VARCHAR(255)  DEFAULT NULL,
  profile_img       LONGBLOB      DEFAULT NULL,
  visibility        BOOLEAN       DEFAULT TRUE,
  remember_token    VARCHAR(100)  DEFAULT NULL,
  email_verified_at DATETIME      DEFAULT NULL,
  created_at        TIMESTAMP ,
  updated_at        TIMESTAMP     DEFAULT CURRENT_TIMESTAMP,
  deleted_at        TIMESTAMP     NULL DEFAULT NULL,
  activate          BOOLEAN       DEFAULT TRUE
 );

/*
filling of users for exercise purposes
*/

INSERT INTO users ( username, email, user_password, profile_bio, profile_img, visibility , remember_token, created_at, updated_at) 
VALUES( "Name1", "user1@yahoo.de", "$2y$10$VWpj8hFUv3hkzS10l8O6buK/T/yUT7iWJ929XzCN5gYadHlo6qRs2", "blablabla", NULL, TRUE, NULL, '2023-05-09 12:56:21','2023-05-09 12:56:21'),
      ( "Name2", "user2@yahoo.de", "$2y$10$VWpj8hFUv3hkzS10l8O6buK/T/yUT7iWJ929XzCN5gYadHlo6qRs2", "blablabla", NULL, TRUE, NULL, '2023-05-09 12:57:21','2023-05-09 12:57:21'),
      ( "Name3", "user3@yahoo.de", "$2y$10$VWpj8hFUv3hkzS10l8O6buK/T/yUT7iWJ929XzCN5gYadHlo6qRs2", "blablabla", NULL, TRUE, NULL, '2023-05-09 12:58:21','2023-05-09 12:58:21'),
      ( "Name4", "user4@yahoo.de", "$2y$10$VWpj8hFUv3hkzS10l8O6buK/T/yUT7iWJ929XzCN5gYadHlo6qRs2", "blablabla", NULL, TRUE, NULL, '2023-05-09 12:59:21','2023-05-09 12:59:21');

-- Create of Table admins
-- table users contains the following information :

-- admin_id     -> unique id to distinguish the users PRIMARY KEY
-- adminname    -> name of the admin
-- email       -> email of a user to log in
-- password    -> self-created password of the user
-- profile_bio -> Self-created small text about the user
-- profile_img -> self-selected profile picture
-- created_at  -> Time when the user was created
CREATE TABLE admins (
  id             INT           AUTO_INCREMENT PRIMARY KEY,
  adminname      VARCHAR(30)   UNIQUE NOT NULL,
  email          VARCHAR(50)   UNIQUE NOT NULL,
  user_password  VARCHAR(60)   NOT NULL,
  -- profile_bio    VARCHAR(255)  DEFAULT NULL,
  -- profile_img    LONGBLOB      DEFAULT NULL,
  activated      BOOLEAN       DEFAULT TRUE,
  super_admin    BOOLEAN       DEFAULT FALSE,
  remember_token VARCHAR(100)  DEFAULT NULL,
  created_at     TIMESTAMP ,
  updated_at     TIMESTAMP     DEFAULT CURRENT_TIMESTAMP    
);

/*
filling of users for exercise purposes
*/
INSERT INTO admins ( adminname, email, user_password, super_admin,  remember_token, created_at , updated_at) 
VALUES( "Admin1", "admin@1", "$2y$10$VWpj8hFUv3hkzS10l8O6buK/T/yUT7iWJ929XzCN5gYadHlo6qRs2" , TRUE ,  NULL, '2023-05-09 12:56:21','2023-05-09 12:56:21');


-- Create of Table tweets
-- table tweets contains the following information :
-- twee_id    -> unique id to distinguish the tweets PRIMARY KEY
-- user_id    -> user id of the user who submitted the tweet
-- tweet      -> tweet message with maximal 240 characters
-- img        -> possible image of a tweet
-- created_at -> time when the tweet was created
CREATE TABLE tweets (
  tweet_id              INT         AUTO_INCREMENT PRIMARY KEY,
  user_id               INT         NOT NULL,
  tweet                 TEXT(240)   NOT NULL,
  visibility            BOOLEAN     DEFAULT TRUE,
  img                   LONGBLOB    DEFAULT NULL,
  created_at            TIMESTAMP,
  deleted_at            TIMESTAMP   NULL DEFAULT NULL,
  activate              BOOLEAN     DEFAULT TRUE
);

/*
filling of tweets for exercise purposes
*/
INSERT INTO tweets ( user_id, tweet, visibility , img, created_at) 
VALUES( 1, "First Tweet", TRUE,  NULL, '2023-05-09 14:56:21'),
      ( 1, "Second Tweet",TRUE,  NULL, '2023-05-09 14:57:21'),
      ( 2, "Welcome to Tue-Tweet Tweet",TRUE,  NULL, '2023-05-09 15:01:21'),
      ( 1, "Test", TRUE,  NULL, '2023-05-09 15:57:21');

-- Create of Table comments
-- table comments contains the following information :
-- comment_id -> unique id to distinguish the comments PRIMARY KEY
-- user_id    -> user id of the user who submitted the comment
-- tweet_id   -> to which tweet does the comment refer
-- comment    -> text for the comment 
-- created_at -> Time at which comments were made
CREATE TABLE comments (
  comment_id            INT        AUTO_INCREMENT PRIMARY KEY,
  user_id               INT        NOT NULL,
  tweet_id              INT        NOT NULL,
  comment               TEXT(240)  NOT NULL,
  notification_flag     BOOLEAN    DEFAULT TRUE,
  visibility            BOOLEAN    DEFAULT TRUE,
  created_at            TIMESTAMP,
  deleted_at            TIMESTAMP  NULL DEFAULT NULL,
  activate              BOOLEAN    DEFAULT TRUE
);

/*
filling of comments for exercise purposes
*/
INSERT INTO comments ( user_id, tweet_id, comment, visibility, created_at) 
VALUES( 1, 2, "comment to tweet 2", TRUE, '2023-05-09 15:56:21'),
      ( 3, 4, "comment to tweet 1", TRUE,'2023-05-09 15:57:21');


-- Create of Table reetweets
-- table retweets contains the following information :
-- retweet_id    -> unique id to distinguish the reetweets PRIMARY KEY
-- user_id       -> user id of the user who submitted the retweet
-- tweet_id      -> to which tweet does the retweet refer
-- retweet_text  -> text for the retweet
-- created_at    -> Time at which retweets were made
CREATE TABLE retweets (
  retweet_id   INT         AUTO_INCREMENT Primary Key,
  user_id      INT         NOT NULL,
  tweet_id     INT         NOT NULL,
  retweet_text TEXT(240)   NOT NULL,
  notification_flag        BOOLEAN     DEFAULT TRUE,
  visibility               BOOLEAN     DEFAULT TRUE, 
  created_at               TIMESTAMP,
  deleted_at               TIMESTAMP   NULL DEFAULT NULL,
  activate                 BOOLEAN     DEFAULT TRUE
);

/*
filling of retweets for exercise purposes
*/
INSERT INTO retweets ( user_id, tweet_id, retweet_text, visibility, created_at) 
VALUES( 1, 3, "retweet to tweet 3", TRUE, '2023-05-09 18:56:21'),
      ( 2, 2, "retweet to tweet 2", TRUE, '2023-05-09 19:57:21');

-- Create of Table likes
-- table likes contains the following information :
-- like_id      -> unique id to distinguish the likes PRIMARY KEY
-- user_id      -> user id of the user who submitted the like
-- tweet_id     -> to which tweet does the like refer
-- created_at   -> Time at which likes were made
CREATE TABLE likes (
  like_id               INT         AUTO_INCREMENT PRIMARY KEY,
  user_id               INT         NOT NULL,
  tweet_id              INT         NOT NULL,
  visibility            BOOLEAN     DEFAULT TRUE,
  notification_flag     BOOLEAN     DEFAULT TRUE,
  created_at            TIMESTAMP,
  deleted_at            TIMESTAMP   NULL DEFAULT NULL,
  activate              BOOLEAN     DEFAULT TRUE
);

/*
filling of likes for exercise purposes
*/
INSERT INTO  likes ( user_id, tweet_id, created_at) 
VALUES( 3, 3, '2023-05-09 15:56:21'),
      ( 2, 3, '2023-05-09 16:57:21');

-- Create of Table follows
-- table follows contains the following information :
-- follow_id         -> unique id to distinguish the follows PRIMARY KEY
-- follow_user_id    -> user who follows
-- following_user_id -> user this is followed
-- created_at        -> Time at which follow were made
CREATE TABLE follows (
  follow_id             INT        AUTO_INCREMENT PRIMARY KEY,
  follow_user_id        INT        NOT NULL,
  following_user_id     INT        NOT NULL,
  visibility            BOOLEAN    DEFAULT TRUE,
  notification_flag     BOOLEAN     DEFAULT TRUE,
  created_at            TIMESTAMP,
  deleted_at            TIMESTAMP   NULL DEFAULT NULL,
  activate              BOOLEAN     DEFAULT TRUE
);


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

CREATE TRIGGER update_tweets_deleted_at
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.deleted_at IS NOT NULL OR NEW.deleted_at IS NULL THEN
        UPDATE tweets SET deleted_at = NEW.deleted_at WHERE user_id = NEW.id;
    END IF;
END;


CREATE TRIGGER update_comments_deleted_at
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.deleted_at IS NOT NULL OR NEW.deleted_at IS NULL  THEN
        UPDATE comments SET deleted_at = NEW.deleted_at WHERE user_id = NEW.id;
    END IF;
END;

 
CREATE TRIGGER update_likes_deleted_at
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.deleted_at IS NOT NULL OR NEW.deleted_at IS NULL THEN
        UPDATE likes SET deleted_at = NEW.deleted_at WHERE user_id = NEW.id;
    END IF;
END;


CREATE TRIGGER update_retweets_deleted_at
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.deleted_at IS NOT NULL OR NEW.deleted_at IS NULL THEN
        UPDATE retweets SET deleted_at = NEW.deleted_at WHERE user_id = NEW.id;
    END IF;
END;

CREATE TRIGGER update_follows_deleted_at
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.deleted_at IS NOT NULL OR NEW.deleted_at IS NULL THEN
        UPDATE follows SET deleted_at = NEW.deleted_at WHERE follow_id = NEW.id;
    END IF;
END;

/*
visibility
*/

CREATE TRIGGER update_tweets_visibility
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.visibility <> OLD.visibility THEN
        UPDATE tweets SET visibility = NEW.visibility WHERE user_id = NEW.id;
    END IF;
END;

CREATE TRIGGER update_comments_visibility
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.visibility <> OLD.visibility THEN
        UPDATE comments SET visibility = NEW.visibility WHERE user_id = NEW.id;
    END IF;
END;

CREATE TRIGGER update_likes_visibility
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.visibility <> OLD.visibility THEN
        UPDATE likes SET visibility = NEW.visibility WHERE user_id = NEW.id;
    END IF;
END;

CREATE TRIGGER update_retweets_visibility
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.visibility <> OLD.visibility THEN
        UPDATE retweets SET visibility = NEW.visibility WHERE user_id = NEW.id;
    END IF;
END;

CREATE TRIGGER update_follows_visibility
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.visibility <> OLD.visibility THEN
        UPDATE follows SET visibility = NEW.visibility WHERE follow_id = NEW.id;
    END IF;
END;

/*
activate
*/

CREATE TRIGGER update_tweets_activate
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.activate  <> OLD.activate THEN
        UPDATE tweets SET activate = NEW.activate  WHERE user_id = NEW.id;
    END IF;
END;

CREATE TRIGGER update_comments_activate
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.activate <> OLD.activate  THEN
        UPDATE comments SET activate = NEW.activate  WHERE user_id = NEW.id;
    END IF;
END;

CREATE TRIGGER update_likes_activate
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.activate  <> OLD.activate  THEN
        UPDATE likes SET activate  = NEW.activate  WHERE user_id = NEW.id;
    END IF;
END;

CREATE TRIGGER update_retweets_activate
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.activate  <> OLD.activate THEN
        UPDATE retweets SET activate  = NEW.activate  WHERE user_id = NEW.id;
    END IF;
END;

CREATE TRIGGER update_follows_activate
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.activate  <> OLD.activate  THEN
        UPDATE follows SET activate  = NEW.activate  WHERE follow_id = NEW.id;
    END IF;
END;

/*
 Event that checks once a day whether deleted_at is older than 30 days

SET GLOBAL event_scheduler = ON;

DROP EVENT IF EXISTS delete_old_rows_event;
CREATE EVENT delete_old_rows_event
ON SCHEDULE
  EVERY 1 DAY
  STARTS CURRENT_TIMESTAMP + INTERVAL 1 DAY
DO
  DELETE FROM users WHERE deleted_at < (CURDATE() - INTERVAL 30 DAY);
  */


