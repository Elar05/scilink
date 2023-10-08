-- Active: 1696474824849@@127.0.0.1@3306@scilink

DROP TABLE IF EXISTS categories;

CREATE TABLE
    `categories` (
        `id` int NOT NULL AUTO_INCREMENT,
        `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = MyISAM DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS comments;

CREATE TABLE
    `comments` (
        `id` int NOT NULL AUTO_INCREMENT,
        `iduser` int DEFAULT NULL,
        `idproject` int DEFAULT NULL,
        `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) ENGINE = MyISAM DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS likes;

CREATE TABLE
    `likes` (
        `id` int NOT NULL AUTO_INCREMENT,
        `iduser` int DEFAULT NULL,
        `idproject` int DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = MyISAM DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS participants;

CREATE TABLE
    `participants` (
        `id` int NOT NULL AUTO_INCREMENT,
        `iduser` int DEFAULT NULL,
        `idproject` int DEFAULT NULL,
        `status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
        PRIMARY KEY (`id`)
    ) ENGINE = MyISAM DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS projects;

CREATE TABLE
    `projects` (
        `id` int NOT NULL AUTO_INCREMENT,
        `iduser` int NOT NULL,
        `idcategory` int NOT NULL,
        `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
        `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `agency_sponsor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `fields_of_science` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `participation_tasks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `geographic_scope` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        `status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
        PRIMARY KEY (`id`)
    ) ENGINE = MyISAM DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS ratings;

CREATE TABLE
    `ratings` (
        `id` int NOT NULL AUTO_INCREMENT,
        `iduser` int DEFAULT NULL,
        `idproject` int DEFAULT NULL,
        `value` int DEFAULT NULL,
        PRIMARY KEY (`id`),
        CONSTRAINT `ratings_chk_1` CHECK ( ( (`value` >= 1)
                and (`value` <= 5)
            )
        )
    ) ENGINE = MyISAM DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS user_types;

CREATE TABLE
    `user_types` (
        `id` int NOT NULL AUTO_INCREMENT,
        `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = MyISAM DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS users;

CREATE TABLE
    `users` (
        `id` int NOT NULL AUTO_INCREMENT,
        `idtype_user` int NOT NULL,
        `names` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `provider` enum(
            'google',
            'github',
            'facebook',
            'linkedin'
        ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = MyISAM DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

