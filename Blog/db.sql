CREATE DATABASE IF NOT EXISTS `blog`;
USE `blog`;

CREATE TABLE IF NOT EXISTS `user` (
                        `user_id` INT(11) NOT NULL AUTO_INCREMENT,
                        `username` VARCHAR(255) NULL DEFAULT NULL,
                        `password` VARCHAR(255) NULL DEFAULT NULL,
                        PRIMARY KEY (`user_id`),
                        UNIQUE INDEX `username` (`username`)
)
    COLLATE='utf8_unicode_ci'
    ENGINE=InnoDB
;

INSERT INTO `blog`.`user` (`username`, `password`) VALUES ('admin', '123');

CREATE TABLE IF NOT EXISTS `category` (
                            `cat_id` INT(11) NOT NULL AUTO_INCREMENT,
                            `cat_name_en` VARCHAR(255) NOT NULL,
                            `cat_name_bg` VARCHAR(255) NOT NULL,
                            PRIMARY KEY (`cat_id`),
                            UNIQUE INDEX `cat_name` (`cat_name_en`),
                            UNIQUE INDEX `cat_name_bg` (`cat_name_bg`)
)
    COLLATE='utf8_unicode_ci'
    ENGINE=InnoDB
    AUTO_INCREMENT=5
;


CREATE TABLE IF NOT EXISTS `post` (
                        `post_id` INT(11) NOT NULL AUTO_INCREMENT,
                        `cat_id` INT(11) NOT NULL,
                        `content_bg` TEXT NOT NULL,
                        `content_en` TEXT NOT NULL,
                        `title_bg` VARCHAR(255) NOT NULL,
                        `title_en` VARCHAR(255) NOT NULL,
                        `author` VARCHAR(255) NOT NULL,
                        `create_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        PRIMARY KEY (`post_id`),
                        INDEX `fk_post_cat` (`cat_id`),
                        CONSTRAINT `fk_post_cat` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`)
)
    COLLATE='utf8_unicode_ci'
    ENGINE=InnoDB
;

CREATE TABLE `images` (
                          `image_id` INT(11) NOT NULL AUTO_INCREMENT,
                          `post_id` INT(11) NOT NULL,
                          `image_name` VARCHAR(255) NOT NULL,
                          PRIMARY KEY (`image_id`),
                          INDEX `fk_image_post` (`post_id`),
                          CONSTRAINT `fk_image_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`)
)
    COLLATE='latin1_swedish_ci'
    ENGINE=InnoDB
    AUTO_INCREMENT=15
;

INSERT INTO `blog`.`category` (`cat_id`,`cat_name_en`,`cat_name_bg`) VALUES (1,'Fashion','Мода');
INSERT INTO `blog`.`category` (`cat_id`,`cat_name_en`,`cat_name_bg`) VALUES (2,'Beauty','Красота');
INSERT INTO `blog`.`category` (`cat_id`,`cat_name_en`,`cat_name_bg`) VALUES (3,'Lifestyle','Лайфстайл');



