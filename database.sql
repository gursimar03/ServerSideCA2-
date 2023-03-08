
--Create tables for the database

CREATE TABLE Users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255)
);
CREATE TABLE riders 
(
    race_id	INT,
    name	VARCHAR(512),
    team	VARCHAR(512),
    born	VARCHAR(512),
    nationality	VARCHAR(512),
    profile_img	VARCHAR(512)
);

INSERT INTO riders (race_id, name, team, born, nationality, profile_img) VALUES ('5', 'Johann Zarco', 'Pramac Racing', '06/07/1990', 'France', 'https://cdn-5.motorsport.com/images/mgl/6l9yZQx0/s600/johann-zarco-pramac-racing-1.webp');
INSERT INTO riders (race_id, name, team, born, nationality, profile_img) VALUES ('10', 'Luca Marini', 'Team VR46', '07/08/1990', 'Italy', 'https://cdn-7.motorsport.com/images/mgl/YN1nRqa2/s600/luca-marini-team-vr46-1.webp');
INSERT INTO riders (race_id, name, team, born, nationality, profile_img) VALUES ('12', 'Maverick Vinales', 'Aprilia Racing Team', '12/01/1995', 'Spain', 'https://cdn-7.motorsport.com/images/mgl/254Axq90/s600/maverick-vinales-aprilia-racin-1.webp');
INSERT INTO riders (race_id, name, team, born, nationality, profile_img) VALUES ('20', 'Fabio Quartararo', 'Yamaha Factory Racing', '20/04/1999', 'France', 'https://cdn-4.motorsport.com/images/mgl/YpNWzb30/s600/fabio-quartararo-yamaha-factor-1.webp');
INSERT INTO riders (race_id, name, team, born, nationality, profile_img) VALUES ('21', 'Franco Morbidelli', 'Yamaha Factory Racing', '04/12/1994', 'Italy', 'https://cdn-3.motorsport.com/images/mgl/0ZRomoo0/s600/franco-morbidelli-petronas-yam-1.webp');
INSERT INTO riders (race_id, name, team, born, nationality, profile_img) VALUES ('23', 'Enea Bastianini', 'Ducati Team', '30/12/1997', 'Italy', 'https://cdn-2.motorsport.com/images/mgl/68yA77B0/s600/enea-bastianini-gresini-racing-1.webp');
INSERT INTO riders (race_id, name, team, born, nationality, profile_img) VALUES ('25', 'Raúl Fernández', 'RNF Racing', '23/10/2000', 'Spain', 'https://cdn-6.motorsport.com/images/mgl/6zQ7nn7Y/s600/raul-fernandez-ktm-tech3-1.webp');
INSERT INTO riders (race_id, name, team, born, nationality, profile_img)
VALUES
(1, 'Chris Froome', 'Ineos Grenadiers', '1985-05-20', 'British', 'https://example.com/chris_froome.jpg'),
(2, 'Geraint Thomas', 'Ineos Grenadiers', '1986-05-25', 'British', 'https://example.com/geraint_thomas.jpg'),
(3, 'Egan Bernal', 'Ineos Grenadiers', '1997-01-13', 'Colombian', 'https://example.com/egan_bernal.jpg'),
(4, 'Peter Sagan', 'Bora-Hansgrohe', '1990-01-26', 'Slovakian', 'https://example.com/peter_sagan.jpg'),
(73, 'Julian Alaphilippe', 'Deceuninck-Quick-Step', '1992-06-11', 'French', 'https://example.com/julian_alaphilippe.jpg'),
(6, 'Primoz Roglic', 'Team Jumbo-Visma', '1989-10-29', 'Slovenian', 'https://example.com/primoz_roglic.jpg'),
(7, 'Tadej Pogacar', 'UAE Team Emirates', '1998-09-21', 'Slovenian', 'https://example.com/tadej_pogacar.jpg'),
(8, 'Emanuel Buchmann', 'Bora-Hansgrohe', '1992-11-18', 'German', 'https://example.com/emanuel_buchmann.jpg'),
(9, 'Miguel Angel Lopez', 'Astana-Premier Tech', '1994-02-04', 'Colombian', 'https://example.com/miguel_angel_lopez.jpg');