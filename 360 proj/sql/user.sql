CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY ( `username` )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `users`
  ADD UNIQUE KEY `email` (`email`);

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('test', '123456@gmail.com', '0f359740bd1cda994f8b55330c86d845');
INSERT INTO `users` (`username`, `email`, `password`) VALUES
('admin', 'admin@qq.com', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `users` (`username`, `email`, `password`) VALUES
('12341', '12322456@gmail.com', '0f359740bd1cda994f8b55330c86d845');