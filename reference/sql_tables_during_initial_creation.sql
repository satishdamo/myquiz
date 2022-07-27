start TRANSACTION;
drop table if EXISTS mst_quiz_subjects;
create table mst_quiz_subjects (
subject_id int primary key AUTO_INCREMENT,
subject varchar(200) not null,
create_date datetime default now(),    
update_date datetime default null,
 is_active tinyint default 1   
);

-- Sports, Science & Technology, Arts, Politics.

insert into mst_quiz_subjects (subject) values ('Sports'), ('Science & Technology'), ('Arts'), ('Politics');

drop table if EXISTS mst_subject_levels; 
create table mst_subject_levels (
level_id int primary key AUTO_INCREMENT,
vlevel varchar(100) not null,    
create_date datetime default now(),    
update_date datetime default null,
 is_active tinyint default 1       
   );
    
insert into  mst_subject_levels (vlevel) values 
    ('Beginner'), ('Intermediate'), ('Professional');

drop table if EXISTS mst_quiz_questions; 
create table mst_quiz_questions (
question_id int primary key AUTO_INCREMENT,
question varchar(500) not null,
level_id int,
subject_id int,
foreign key (level_id) REFERENCES mst_subject_levels (level_id),
foreign key (subject_id) REFERENCES mst_quiz_subjects (subject_id),    
    create_date datetime default now(),    
update_date datetime default null,
 is_active tinyint default 1   
);   


insert into mst_quiz_questions (question,level_id,subject_id) values 
('What is his world record time for the 100 metres?',1,1),
('How many regulation strokes are there in swimming?',1,1),
('What sport is described as “the beautiful game?',1,1),
('What five colours make up the Olympic rings?',1,1),


-- medium --
('In which sport do teams compete to win the Stanley Cup?',2,1),
('Which country won the first ever football world cup?',2,1),
('The Chicago Cubs and Boston Red Sox play which sport?',2,1),


-- professional --
('What is the maximum break you can score in snooker?',3,1),
('What is Canada’s national sport?',3,1),
('Which Formula 1 driver has won the most races in the history of the sport?',3,1);


drop table if EXISTS mst_quiz_question_options;
create table mst_quiz_question_options (
option_id int primary key AUTO_INCREMENT,
voption varchar(500) not null,
question_id int,
is_correct tinyint not null,   
foreign key (question_id) REFERENCES mst_quiz_questions (question_id),
    create_date datetime default now(),    
update_date datetime default null,
 is_active tinyint default 1   
);    



insert into mst_quiz_question_options (voption,question_id,is_correct) values 
('9.58 seconds',1,1),
('9.50 seconds',1,0),
('9.52 seconds',1,0),
('9.40 seconds',1,0),


('5',2,0),
('4',2,1),
('2',2,0),
('1',2,0),


('Golf',3,0),
('Tennis',3,0),
('Cricket',3,0),
('Football',3,1),


('Blue, black, green, red and yellow',4,1),
('Blue, black, green, red and orange',4,0),
('Pink, black, green, red and yellow.',4,0),
('Blue, white, green, red and yellow',4,0),


-- medium --

('Women\'s ice hockey',5,0),
('Men\'s ice hockey',5,1),
('Men\'s tennis',5,0),
('Women\'s tennis',5,0),

('Germany',6,0),
('Brazil',6,0),
('India',6,0),
('Uruguay',6,1),


('Basketball',7,0),
('Baseball',7,1),
('Tennis',7,0),
('Golf',7,0),





-- professional --

('125',8,0),
('182',8,0),
('120',8,0),
('147',8,1),


('Hockey',9,0),
('Golf',9,0),
('Lacrosse',9,1),
('Tennis',9,0),


('Michael Schumacher',10,0),
('Lewis Hamilton',10,1),
('Sebastian Vettel',10,0),
('Alain Prost',10,0);





-- he would get 10 questions,
--  4 of beginner level,
 -- 3 of intermediate level, 
-- 3 of professional level in that order.


drop table if EXISTS trn_quiz_attempts;
create table trn_quiz_attempts (
attempt_id int primary key AUTO_INCREMENT,
user_name varchar(100) not null,
user_email varchar(100) not null,
score int not null,
subject_id int,
foreign key (subject_id) REFERENCES mst_quiz_subjects(subject_id),    
create_date datetime default now(),    
 is_active tinyint default 1   
    );

drop table if EXISTS trn_quiz_attempt_answers; 
create table trn_quiz_attempt_answers (
answers_id int primary key AUTO_INCREMENT,
attempt_id int,
question_id int,
option_id int,
    
    foreign key (option_id) REFERENCES mst_quiz_question_options(option_id),
    foreign key (question_id) REFERENCES mst_quiz_questions(question_id),
      foreign key (attempt_id) REFERENCES trn_quiz_attempts(attempt_id),
    
 create_date datetime default now(),    
 is_active tinyint default 1   
);   
    
 
 commit;