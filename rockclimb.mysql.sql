DROP DATABASE IF EXISIS rockclimb;

CREATE DATABASE rockclimb;
USE rockclimb;


CREATE TABLE workout (
	workout_count INTEGER AUTO_INCREMENT,
	date DATE NOT NULL,
	time TIME NOT NULL,
	duration INTEGER NOT NULL,
	comments VARCHAR(255),

	PRIMARY KEY (workout_count)
);

CREATE TABLE boulder (
	workout_count INTEGER,
	bGrade INTEGER,
	typeOfGrade VARCHAR(10) NOT NULL,
	
	PRIMARY KEY (workout_count)
);

CREATE TABLE sport (
	workout_count INTEGER,
	timeARC INTEGER,
	gradesClimbed INTEGER NOT NULL,
	
	PRIMARY KEY (workout_count)
);

CREATE TABLE speed (
	workout_count INTEGER,
	speedTime INTEGER,
	attempts INTEGER NOT NULL,

	PRIMARY KEY (workout_count)
);

CREATE TABLE user_workout (
	workout_count INTEGER,
	user_id INTEGER,

	PRIMARY KEY (workout_count, user_id),
	FOREIGN KEY (user_id) REFERENCE user (user_id)
		ON UPDATE CASCADE ON DELETE RESTRICT, 
	FOREIGN KEY (workout_count) REFERNCES boulder (workout_count)
		ON UPDATE CASCADE ON DELETE RESTRICT,
	FOREIGN KEY (workout_count) REFERNCES sport  (workout_count)
                ON UPDATE CASCADE ON DELETE RESTRICT,

	FOREIGN KEY (workout_count) REFERNCES speed (workout_count)
                ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE user (
	user_id INTEGER AUTO_INCREMENT,
	weight Double Precision NOT NULL,
	height Double Precision NOT NULL,
	birthdate DATE NOT NULL,
 	username VARCHAR(50) NOT NULL,

	PRIMARY KEY (user_id)
);


CREATE TABLE progress_report (
	user_id INTEGER,
	timeSpeed INTEGER,
	timeARC INTEGER,
	highestBgrade INTEGER,
	highestSgrade INTEGER,

	PRIMARY KEY (user_id)
);

CREATE TABLE workout_data (
	user_id INTEGER,
	workout_count INTEGER,
	duration INTEGER NOT NULL,
	highestBgrade INTEGER,
	highestSgrade INTEGER,
	height Double Precision NOT NULL,
	weight Doulbe PRecision NOT NULL,
	comments VARCHAR(255),

	PRIMARY KEY (user_id, workout_count),
	FOREIGN KEY (user_id) REFERENCES user (user_id) 
		ON UPDATE CASCADE ON DELETE RESTRICT,
	
);

INSERT INTO user (username, weight, height, birthdate) VALUES 
	('caleb', '75', '160','1998-02-10'),
	('cassie','60','140','1997-01-11'),
	('tom','70','165','1998-10-15'),
	('zachery','100','110','1980-10-10');

INSERT INTO workout (date, time, duration, comments) VALUES 
	('11-11-2020', '12:10:10', '100', 'hard as hell'),
	('11-11-2020', '12:11:10', '120', 'easy'),
	('12-12-2020', '01:01:00', '90', 'crimps!'),
	('10-10-2020', '10:10:10', '30', 'short and sweet'),
	('09-09-2020', '09:00:00', '400', 'proj day'),
	('11-11-2020', '13:01:11', '10', 'I touched the wall'),
	('01-01-2020', '00:00:01', '100', 'start the new year off right'),
	('02-02-2021', '12:12:12', '8');

INSERT INTO user_workout (workout_count, user_id) VALUES
	((SELECT workout_count WHERE date = '11-11-2020' AND time = '12:10:10'), (SELECT user_id WHERE username = 'caleb')),
	((SELECT workout_count WHERE date = '11-11-2020' AND time = '12:11:10'), (SELECT user_id WHERE username = 'cassie')),
	 ((SELECT workout_count WHERE date = '12-12-2020' AND time = '01:01:00'), (SELECT user_id WHERE username = 'tom')),
	 ((SELECT workout_count WHERE date = '10-10-2020' AND time = '10:10:10'), (SELECT user_id WHERE username = 'zachery')),
	 ((SELECT workout_count WHERE date = '09-09-2020'), (SELECT user_id WHERE username = 'caleb')),
	((SELECT workout_count WHERE date = '11-11-2020'), (SELECT user_id WHERE username = 'cassie')),
	((SELECT workout_count WHERE date = '01-01-2020'), (SELECT user_id WHERE username = 'tom')),
	((SELECT workout_count WHERE date = '02-02-2021'), (SELECT user_id WHERE username = 'zachery'));

INSERT INTO progress_report (user_id, timeSpeed, timeARC, highestBgrade, highestSgrade) VALUES
	((SELECT user_id WHERE username = 'caleb'),(SELECT max(timeSpeed) WHERE username ='caleb'),(SELECT max(timeARC) WHERE username = 'caleb'), (SELECT max(bGrade) WHERE username ='caleb'), (SELECT max(gradesClimbed) WHERE username = 'caleb')),



















