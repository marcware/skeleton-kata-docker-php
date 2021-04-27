CREATE TABLE `User` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `username` varchar(255) DEFAULT NULL,
                        `email` varchar(255) DEFAULT NULL,
                        PRIMARY KEY (`id`),
                        UNIQUE KEY `username` (`username`),
                        UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Photo` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `user_id` int(11) NOT NULL,
                         `url_photo` varchar(255) DEFAULT NULL,
                         PRIMARY KEY (`id`),
                         KEY `user_idx` (`user_id`),
                         CONSTRAINT `user_idx` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;