
--Create tables for the database

CREATE TABLE Users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255)
);
CREATE TABLE riders 
(
    rider_id INT,
    name	VARCHAR(512),
    born	VARCHAR(512),
    nationality	VARCHAR(512),
    profile_img	VARCHAR(512),
	  PRIMARY key (rider_id)
);


CREATE TABLE teams (
  team_id INT AUTO_INCREMENT PRIMARY KEY,
  team_name VARCHAR(255)
);


CREATE TABLE rider_team (
  rider_id INT,
  team_id INT,
  PRIMARY KEY (rider_id, team_id),
  FOREIGN KEY (rider_id) REFERENCES riders(rider_id),
  FOREIGN KEY (team_id) REFERENCES teams(team_id)
);

INSERT INTO teams (team_name) VALUES
('Pramac Racing'),
('Team VR46'),
('Aprilia Racing Team'),
('Yamaha Factory Racing'),
('Ducati Team'),
('RNF Racing'),
('Ineos Grenadiers'),
('Bora-Hansgrohe'),
('Deceuninck-Quick-Step'),
('Team Jumbo-Visma'),
('UAE Team Emirates'),
('Astana-Premier Tech');


INSERT INTO riders (rider_id, name, born, nationality, profile_img) VALUES ('10', 'Luca Marini','07/08/1990', 'Italy', 'https://cdn-7.motorsport.com/images/mgl/YN1nRqa2/s600/luca-marini-team-vr46-1.webp');
INSERT INTO riders (rider_id, name, born, nationality, profile_img) VALUES ('12', 'Maverick Vinales',  '12/01/1995', 'Spain', 'https://cdn-7.motorsport.com/images/mgl/254Axq90/s600/maverick-vinales-aprilia-racin-1.webp');
INSERT INTO riders (rider_id, name, born, nationality, profile_img) VALUES ('20', 'Fabio Quartararo',  '20/04/1999', 'France', 'https://cdn-4.motorsport.com/images/mgl/YpNWzb30/s600/fabio-quartararo-yamaha-factor-1.webp');
INSERT INTO riders (rider_id, name, born, nationality, profile_img) VALUES ('21', 'Franco Morbidelli',  '04/12/1994', 'Italy', 'https://cdn-3.motorsport.com/images/mgl/0ZRomoo0/s600/franco-morbidelli-petronas-yam-1.webp');
INSERT INTO riders (rider_id, name, born, nationality, profile_img) VALUES ('23', 'Enea Bastianini', '30/12/1997', 'Italy', 'https://cdn-2.motorsport.com/images/mgl/68yA77B0/s600/enea-bastianini-gresini-racing-1.webp');
INSERT INTO riders (rider_id, name, born, nationality, profile_img) VALUES ('25', 'Raúl Fernández',  '23/10/2000', 'Spain', 'https://cdn-6.motorsport.com/images/mgl/6zQ7nn7Y/s600/raul-fernandez-ktm-tech3-1.webp');


insert into rider_team (rider_id,team_id) VALUES (5,1),(10,2),(12,3),(20,4),(21,4),(23,5),(25,6);

SELECT riders.rider_id,name ,team_name , profile_img FROM `riders` , rider_team , teams where rider_team.rider_id = riders.rider_id AND rider_team.team_id = teams.team_id;

CREATE TABLE races (
  race_id INT AUTO_INCREMENT PRIMARY KEY,
  race_name VARCHAR(255),
  race_date DATE,
  race_location VARCHAR(255)
);

CREATE TABLE race_results (
  result_id INT AUTO_INCREMENT PRIMARY KEY,
  race_id INT,
  rider_id INT,
  result_time TIME,
  result_rank INT,
  FOREIGN KEY (race_id) REFERENCES races(race_id),
  FOREIGN KEY (rider_id) REFERENCES riders(rider_id)
);


INSERT INTO races (race_name, race_date) VALUES
('Qatar Grand Prix', '2022-03-20'),
('Argentine Grand Prix', '2022-04-03'),
('Americas Grand Prix', '2022-04-10'),
('Spanish Grand Prix', '2022-04-24'),
('French Grand Prix', '2022-05-08'),
('Italian Grand Prix', '2022-05-22'),
('Catalan Grand Prix', '2022-06-05'),
('German Grand Prix', '2022-06-19'),
('Dutch Grand Prix', '2022-06-26'),
('Austrian Grand Prix', '2022-07-10'),
('British Grand Prix', '2022-07-31'),
('San Marino Grand Prix', '2022-09-11'),
('Aragon Grand Prix', '2022-09-25'),
('Japanese Grand Prix', '2022-10-02'),
('Thai Grand Prix', '2022-10-09'),
('Australian Grand Prix', '2022-10-23'),
('Malaysian Grand Prix', '2022-11-06'),
('Valencia Grand Prix', '2022-11-13');


INSERT INTO race_results (race_id, rider_id, result_time, result_rank) VALUES
(1, 10, '00:41:35', 1),
(1, 20, '00:41:39', 2),
(1, 21, '00:41:42', 3),
(1, 12, '00:41:46', 4),
(1, 23, '00:42:01', 5),
(1, 25, '00:42:08', 6),
(2, 20, '00:47:52', 1),
(2, 10, '00:47:54', 2),
(2, 21, '00:47:56', 3),
(2, 12, '00:47:58', 4),
(2, 23, '00:48:02', 5),
(2, 25, '00:48:05', 6),
(3, 12, '00:52:20', 1),
(3, 21, '00:52:23', 2),
(3, 20, '00:52:25', 3),
(3, 10, '00:52:28', 4),
(3, 25, '00:52:30', 5),
(3, 23, '00:52:33', 6),
(4, 25, '01:00:10', 1),
(4, 12, '01:00:15', 2),
(4, 10, '01:00:20', 3),
(4, 21, '01:00:25', 4),
(4, 20, '01:00:30', 5),
(4, 23, '01:00:35', 6),
(5, 23, '01:12:20', 1),
(5, 10, '01:12:25', 2),
(5, 20, '01:12:30', 3),
(5, 12, '01:12:35', 4),
(5, 21, '01:12:40', 5),
(5, 25, '01:12:45', 6),
(6, 10, '00:43:50', 1),
(6, 23, '00:43:55', 2),
(6, 12, '00:44:00', 3),
(6, 20, '00:44:05', 4),
(6, 25, '00:44:10', 5),
(6, 21, '00:44:15', 6),
(7, 12, '00:55:40', 1),
(7, 20, '00:55:45', 2),
(7, 10, '00:55:50', 3),
(7, 23, '00:55:55', 4),
(7, 21, '00:56:00', 5),
(7, 25, '00:56:05', 6),
(8, 21, '01:02:10', 1),
(8, 23, '01:02:15', 2),
(8, 20, '01:02:20', 3);


ALTER TABLE users ADD COLUMN privilege VARCHAR(255) DEFAULT 'user';
INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`, `privilege`) VALUES ('99', 'ADMIN', 'Gursimar', 'admin@admin.com', 'admin99', 'admin');
