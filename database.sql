
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