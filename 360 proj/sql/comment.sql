CREATE TABLE `comment` (
    `commentid` INT UNSIGNED AUTO_INCREMENT,
    `content` varchar(255) NOT NULL,
    `date` time NOT NULL,
    `username` varchar(255) NOT NULL,
    PRIMARY KEY (`commentid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


