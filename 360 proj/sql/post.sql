CREATE TABLE `post` (
    `postid` INT UNSIGNED AUTO_INCREMENT,
    `content` varchar(255) NOT NULL,
    `img` VARBINARY(100000) NOT NULL,
    `date` time NOT NULL,
    `username` varchar(255) NOT NULL,
    `tag` varchar(255) NOT NULL,
    PRIMARY KEY (`postid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


