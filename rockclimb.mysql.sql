DROP DATABASE IF EXISTS rockclimb;

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


CREATE TABLE speed (
        workout_count INTEGER,
        speedTime INTEGER,
        attempts INTEGER NOT NULL,

        PRIMARY KEY (workout_count),
        FOREIGN KEY (workout_count) REFERENCES workout (workout_count)
                ON UPDATE CASCADE ON DELETE RESTRICT
);
CREATE TABLE boulder (
        workout_count INTEGER,
        bGrade INTEGER NOT NULL,
        typeOfGrade VARCHAR(10) NOT NULL,

        PRIMARY KEY (workout_count),
        FOREIGN KEY (workout_count) REFERENCES workout (workout_count)
                ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE sport (
        workout_count INTEGER,
        timeARC INTEGER,
        gradesClimbed INTEGER NOT NULL,

        PRIMARY KEY (workout_count),
        FOREIGN KEY (workout_count) REFERENCES workout (workout_count)
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


CREATE TABLE user_work (
        workout_count INTEGER,
        user_id INTEGER,

        PRIMARY KEY (workout_count, user_id),
        FOREIGN KEY (user_id) REFERENCES user (user_id)
                ON UPDATE CASCADE ON DELETE RESTRICT,
        FOREIGN KEY (workout_count) REFERENCES workout (workout_count)
                ON UPDATE CASCADE ON DELETE RESTRICT
);


CREATE TABLE progress_report (
        user_id INTEGER,
        timeSpeed INTEGER,
        timeARC INTEGER,
        highestBgrade INTEGER,
        highestSgrade INTEGER,

        PRIMARY KEY (user_id)
);


INSERT INTO user (username, weight, height, birthdate) VALUES
        ('caleb', '75', '160','1998-02-10'),
        ('cassie','60','140','1997-01-11'),
        ('tom','70','165','1998-10-15'),
        ('zachery','100','110','1980-10-10');
        
        
INSERT INTO workout (date, time, duration, comments) VALUES
        ('2020-11-11', '12:10:10', '100', 'hard as hell'),
        ('2020-11-11', '12:11:10', '120', 'easy'),
        ('2020-12-12', '01:01:00', '90', 'crimps!'),
        ('2020-10-10', '10:10:10', '30', 'short and sweet'),
        ('2020-09-09', '09:00:00', '400', 'proj day'),
        ('2021-11-11', '13:01:11', '10', 'I touched the wall'),
        ('2020-01-01', '00:00:01', '100', 'start the new year off right'),
        ('2021-02-02', '12:12:12', '8', '');


INSERT INTO boulder (workout_count,typeOfGrade, bgrade) VALUES
        ((SELECT workout_count
            FROM workout
            WHERE date = '2021-02-02'), 'crimp', '6'),
        ((SELECT workout_count 
            FROM workout
            WHERE date = '2020-09-09'), 'dyno', '4'),
        ((SELECT workout_count
            FROM workout
            WHERE date = '2020-11-11' AND time = '12:10:10'), 'jugs', '5');
    
INSERT INTO sport (workout_count, timeARC, gradesClimbed) VALUES
        ((SELECT workout_count
            FROM workout
            WHERE date = '2020-10-10'), '100', '12'),
        ((SELECT workout_count 
            FROM workout
            WHERE date = '2020-12-12'), '20', '6'),
        ((SELECT workout_count
            FROM workout
            WHERE date = '2020-11-11' AND time = '12:11:10'), '75', '10');

INSERT INTO speed (workout_count,speedTime, attempts) VALUES
        ((SELECT workout_count
            FROM workout
            WHERE date = '2020-01-01'), '6', '6'),
        ((SELECT workout_count 
            FROM workout
            WHERE date = '2021-11-11'), '10', '4');

INSERT INTO user_work (workout_count, user_id) VALUES
        ((SELECT workout_count FROM workout WHERE date = '2020-11-11' AND time = '12:10:10'), (SELECT user_id FROM user WHERE username = 'caleb')),
        ((SELECT workout_count FROM workout WHERE date = '2020-11-11' AND time = '12:11:10'), (SELECT user_id FROM user WHERE username = 'cassie')),
         ((SELECT workout_count FROM workout WHERE date = '2020-12-12' AND time = '01:01:00'), (SELECT user_id FROM user WHERE username = 'tom')),
         ((SELECT workout_count FROM workout WHERE date = '2020-10-10' AND time = '10:10:10'), (SELECT user_id FROM user WHERE username = 'zachery')),
         ((SELECT workout_count FROM workout WHERE date = '2020-09-09'), (SELECT user_id FROM user WHERE username = 'caleb')),
        ((SELECT workout_count FROM workout WHERE date = '2021-11-11'), (SELECT user_id FROM user WHERE username = 'cassie')),
        ((SELECT workout_count FROM workout WHERE date = '2020-01-01'), (SELECT user_id FROM user WHERE username = 'tom')),
        ((SELECT workout_count FROM workout WHERE date = '2021-02-02'), (SELECT user_id FROM user WHERE username = 'zachery'));
        
        
INSERT INTO progress_report (user_id, timeSpeed, timeARC, highestBgrade, highestSgrade) VALUES
        ((SELECT user_id FROM user WHERE username = 'caleb'),(
                        SELECT min(speedTime)
                        FROM speed, user_work, (SELECT user_id FROM user WHERE username = 'caleb')n
                        WHERE user_work.workout_count = speed.workout_count AND n.user_id = user_work.user_id
                        ),
                        (SELECT max(timeARC)
                        FROM sport, user_work, (SELECT user_id FROM user WHERE username = 'caleb')n
                        WHERE user_work.workout_count = sport.workout_count AND n.user_id = user_work.user_id
                        ),
                        (SELECT max(bGrade)
                        FROM boulder, user_work, (SELECT user_id FROM user WHERE username = 'caleb')n
                        WHERE user_work.workout_count = boulder.workout_count AND n.user_id = user_work.user_id
                        ),
                        (SELECT max(gradesClimbed)
                        FROM sport, user_work, (SELECT user_id FROM user WHERE username = 'caleb')n
                        WHERE user_work.workout_count = sport.workout_count AND n.user_id = user_work.user_id
                        )),
        ((SELECT user_id FROM user WHERE username = 'cassie'),(
                        SELECT min(speedTime)
                        FROM speed, user_work, (SELECT user_id FROM user WHERE username = 'cassie')n
                        WHERE user_work.workout_count = speed.workout_count AND n.user_id = user_work.user_id
                        ),
                        (SELECT max(timeARC)
                        FROM sport, user_work, (SELECT user_id FROM user WHERE username = 'cassie')n
                        WHERE user_work.workout_count = sport.workout_count AND n.user_id = user_work.user_id
                        ),
                        (SELECT max(bGrade)
                        FROM boulder, user_work, (SELECT user_id FROM user WHERE username = 'cassie')n
                        WHERE user_work.workout_count = boulder.workout_count AND n.user_id = user_work.user_id
                        ),
                        (SELECT max(gradesClimbed)
                        FROM sport, user_work, (SELECT user_id FROM user WHERE username = 'cassie')n
                        WHERE user_work.workout_count = sport.workout_count AND n.user_id = user_work.user_id
                        )),

        ((SELECT user_id FROM user WHERE username = 'tom'),(
                        SELECT min(speedTime)
                        FROM speed, user_work, (SELECT user_id FROM user WHERE username = 'tom')n
                        WHERE user_work.workout_count = speed.workout_count AND n.user_id = user_work.user_id
                        ),
                        (SELECT max(timeARC)
                        FROM sport, user_work, (SELECT user_id FROM user WHERE username = 'tom')n
                        WHERE user_work.workout_count = sport.workout_count AND n.user_id = user_work.user_id
                        ),
                        (SELECT max(bGrade)
                        FROM boulder, user_work, (SELECT user_id FROM user WHERE username = 'tom')n
                        WHERE user_work.workout_count = boulder.workout_count AND n.user_id = user_work.user_id
                        ),
                        (SELECT max(gradesClimbed)
                        FROM sport, user_work, (SELECT user_id FROM user WHERE username = 'tom')n
                        WHERE user_work.workout_count = sport.workout_count AND n.user_id = user_work.user_id
                        )),
        ((SELECT user_id FROM user WHERE username = 'zachery'),(
                        SELECT min(speedTime)
                        FROM speed, user_work, (SELECT user_id FROM user WHERE username = 'zachery')n
                        WHERE user_work.workout_count = speed.workout_count AND n.user_id = user_work.user_id
                        ),
                        (SELECT max(timeARC)
                        FROM sport, user_work, (SELECT user_id FROM user WHERE username = 'zachery')n
                        WHERE user_work.workout_count = sport.workout_count AND n.user_id = user_work.user_id
                        ),
                        (SELECT max(bGrade)
                        FROM boulder, user_work, (SELECT user_id FROM user WHERE username = 'zachery')n
                        WHERE user_work.workout_count = boulder.workout_count AND n.user_id = user_work.user_id
                        ),
                        (SELECT max(gradesClimbed)
                        FROM sport, user_work, (SELECT user_id FROM user WHERE username = 'zachery')n
                        WHERE user_work.workout_count = sport.workout_count AND n.user_id = user_work.user_id
                        ));
