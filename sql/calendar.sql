CREATE TABLE `club` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `club_name` varchar(50),
  `league` varchar(50),
  `country` varchar(50),
  `created_at`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `sportCategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sportCategory_name` varchar(50),
  `created_at`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `venue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_name` varchar(50),
  `capacity` varchar(50),
  `created_at`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);


CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `_clubIdHost` int,
  `_clubIdGuest` int,
  `_sportCategoryId` int,
  `_venueId` int,
  `datetime` datetime,
  `created_at`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`_sportCategoryId`) REFERENCES `sportCategory`(`id`),
  FOREIGN KEY (`_venueId`) REFERENCES `venue`(`id`)
);

INSERT INTO `sportCategory`(`id`, `sportCategory_name`) VALUES (1, 'Football'), (2, 'Basketball');

INSERT INTO `club`(`id`, `club_name`, `league`, `country`) VALUES (1, 'Arsenal', 'Premier League', 'England'), (2, 'Chelsea', 'Premier League', 'England'), (3, 'Tottenham', 'Premier League', 'England'), (4, 'Phoenix Suns', 'NBA', 'USA'), (5, 'Golden State Warriors', 'NBA', 'USA'), (6, 'Los Angeles Lakers', 'NBA', 'USA');

INSERT INTO `venue`(`id`, `venue_name`, `capacity`) VALUES (1, 'Emirates', '38,419'), (2, 'Stamford Bridge', '41,837'),  (3, 'Tottenham Hotspur Stadium', '62,850'), (4, 'PHX Arena', '18,422'), (5, 'Chase Center', '18,064'), (6, 'Staples Center', '19,079');

INSERT INTO `event`(`_clubIdHost`, `_clubIdGuest`, `_sportCategoryId`, `_venueId`, `datetime`) VALUES (1,2,1,1,'2021-12-12 14:00:00');








