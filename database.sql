
--Create tables for the database

CREATE TABLE Users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255)
);

CREATE TABLE Tasks (
  task_id INT AUTO_INCREMENT PRIMARY KEY,
  task_name VARCHAR(255),
  description TEXT,
  due_date DATE,
  status ENUM('Incomplete', 'Complete')
);

CREATE TABLE Teams (
  team_id INT AUTO_INCREMENT PRIMARY KEY,
  team_name VARCHAR(255)
);

CREATE TABLE Assignments (
  assignment_id INT AUTO_INCREMENT PRIMARY KEY,
  task_id INT,
  user_id INT,
  FOREIGN KEY (task_id) REFERENCES Tasks(task_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE TaskAssignments (
  task_id INT,
  user_id INT,
  PRIMARY KEY (task_id, user_id),
  FOREIGN KEY (task_id) REFERENCES Tasks(task_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Comments (
  comment_id INT AUTO_INCREMENT PRIMARY KEY,
  task_id INT,
  user_id INT,
  comment TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (task_id) REFERENCES Tasks(task_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);


--insert data into the database


INSERT INTO Users (username, email, password) VALUES
('JohnDoe', 'johndoe@gmail.com', 'password123'),
('JaneSmith', 'janesmith@yahoo.com', 'abc123'),
('BobJohnson', 'bjohnson@hotmail.com', 'passw0rd');

INSERT INTO Tasks (task_name, description, due_date, status) VALUES
('Finish report', 'Write a report on the project progress', '2023-03-15', 'Incomplete'),
('Send email', 'Send an email to the team with the project update', '2023-02-28', 'Complete'),
('Review code', 'Review the code changes made by the team', '2023-03-10', 'Incomplete');

INSERT INTO Teams (team_name) VALUES
('Marketing'),
('Engineering'),
('Sales');

INSERT INTO Assignments (task_id, user_id) VALUES
(1, 1),
(2, 2),
(3, 3);

INSERT INTO TaskAssignments (task_id, user_id) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 2),
(3, 3);

INSERT INTO Comments (task_id, user_id, comment) VALUES
(1, 1, 'I need more information about the project goals'),
(1, 2, 'I will send you the details via email'),
(2, 1, 'The email has been sent to the team'),
(2, 2, 'Thank you for the update'),
(3, 2, 'I found a bug in the code'),
(3, 3, 'Please share the details so that I can fix it');