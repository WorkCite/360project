CREATE TABLE `post` (
    `postid` INT UNSIGNED AUTO_INCREMENT,
    `content` varchar(255) NOT NULL,
    `img` VARBINARY(100000) NOT NULL,
    `date` time NOT NULL,
    `username` varchar(255) NOT NULL,
    `tag` varchar(255) NOT NULL,
    PRIMARY KEY (`postid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `post` (`postid`, `content`, `img`,`date`,`username`,`tag`) VALUES
('0', 'hi', 'null','11:11:11','test','none');

INSERT INTO `post` (`postid`, `content`, `img`,`date`,`username`,`tag`) VALUES
('0', 'hi hi', 'null','11:11:22','admin','music');

INSERT INTO `post` (`postid`, `content`, `img`,`date`,`username`,`tag`) VALUES
('0', 'hi hi hi', 'null','11:11:33','12341','art');



