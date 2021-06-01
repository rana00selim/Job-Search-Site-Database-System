CREATE TABLE end_user(
username varchar(40),
password varchar(40) NOT NULL,
first_name varchar(20) NOT NULL,
last_name varchar(20) NOT NULL,
military_service_status varchar(50),
PRIMARY KEY (username)
);

CREATE TABLE end_user_email(
username varchar(40),
email varchar(50),
PRIMARY KEY (username,email),
FOREIGN KEY(username) REFERENCES end_user(username) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE HRR(
username varchar(40),
end_user_username varchar(40) NOT NULL,
first_name varchar(20) NOT NULL,
last_name varchar(20) NOT NULL,
password varchar(40) NOT NULL,
PRIMARY KEY (username),
FOREIGN KEY(end_user_username) REFERENCES end_user(username) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE company(
CID int(16),
name varchar(100) NOT NULL,
address varchar(100) NOT NULL,
phone bigint(12) NOT NULL,
PRIMARY KEY (CID)
);

CREATE TABLE employment_history(
username varchar(40),
start_date DATE NOT NULL,
end_date DATE NOT NULL,
position varchar(25) NOT NULL,
CID int(16) NOT NULL,
PRIMARY KEY (username,start_date,CID),
FOREIGN KEY(username) REFERENCES end_user(username) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(CID) REFERENCES Company(CID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE job_posting(
JID int(16),
descr varchar(100) NOT NULL,
salary int(16) NOT NULL,
phone bigint(12) NOT NULL,
is_man_or_intern varchar(10) NOT NULL,
contract_type varchar(15) NOT NULL,
opening_date DATE NOT NULL,
duration int(10) NOT NULL,
CID int(16) NOT NULL,
HRR_username varchar(40) NOT NULL,
PRIMARY KEY (JID),
FOREIGN KEY(CID) REFERENCES Company(CID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(HRR_username) REFERENCES HRR(username) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE manager_job_posting(
JID int(16),
dept_name varchar(40) NOT NULL,
dept_Size int(10) NOT NULL,
PRIMARY KEY (JID),
FOREIGN KEY(JID) REFERENCES job_posting(JID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE internship_job_posting(
JID int(16),
min_num_days int(10) NOT NULL,
PRIMARY KEY (JID),
FOREIGN KEY(JID) REFERENCES job_posting(JID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE application(
JID int(16),
username varchar(40),
date_applied  DATE NOT NULL,
resume varchar(40) NOT NULL,
univ varchar(40),
program  varchar(40),
gpa double,
standing varchar(40),
num_days int(10),
PRIMARY KEY (username,JID),
FOREIGN KEY(username) REFERENCES end_user(username) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(JID) REFERENCES job_posting(JID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE end_user_employer(
CID int(16),
username varchar(40),
start_date DATE NOT NULL,
PRIMARY KEY (username,CID),
FOREIGN KEY(CID) REFERENCES Company(CID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(username) REFERENCES end_user(username) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE courses_for_internship_apps(
CIAID serial AUTO_INCREMENT NOT NULL,
JID int(16) NOT NULL,
username varchar(40) NOT NULL,
course varchar(40) NOT NULL,
PRIMARY KEY (CIAID),
FOREIGN KEY(JID) REFERENCES job_posting(JID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(username) REFERENCES end_user(username) ON DELETE CASCADE ON UPDATE CASCADE
);

/*-----------------------------------------------------------------------------------------*/
INSERT INTO end_user(username,password,first_name,last_name,military_service_status) VALUES 
('rana00selim','123456','Rana','Selim',null),
('viper','sdasfsa','Viper','Player',null),
('phoenix','pass','Phoenix','Valo','completed'),
('breach','passiiiivord','Breach','Player','delayed'),
('astra','mycat','Astra','Valo',null),
('killjoy','minnak','Killjoy','Player',null),
('skye','tursu','Skye','Valo',null),
('sage','slkdjaslkdjsal','Sage','Player',null),
('reyna','birikiuc','Reyna','Valo',null),
('sova','ucikibir','Sova','Player','completed')
; 

INSERT INTO end_user_email(username, email) VALUES 
((SELECT username FROM end_user WHERE username = 'rana00selim'), 'rana00selim@gmail.com'),
((SELECT username FROM end_user WHERE username = 'viper'), 'viper@gmail.com'),
((SELECT username FROM end_user WHERE username = 'phoenix'), 'phoenix@gmail.com'),
((SELECT username FROM end_user WHERE username = 'breach'), 'breach@gmail.com'),
((SELECT username FROM end_user WHERE username = 'astra'), 'astra@gmail.com'),
((SELECT username FROM end_user WHERE username = 'killjoy'), 'killjoy@gmail.com'),
((SELECT username FROM end_user WHERE username = 'skye'), 'skye@gmail.com'),
((SELECT username FROM end_user WHERE username = 'sage'), 'sage@gmail.com'),
((SELECT username FROM end_user WHERE username = 'reyna'), 'reyna@gmail.com'),
((SELECT username FROM end_user WHERE username = 'sova'), 'sova@gmail.com')
;

INSERT INTO HRR(username, end_user_username, first_name, last_name, password) VALUES 
('HRR1', (SELECT username FROM end_user WHERE username = 'viper'), (SELECT first_name FROM end_user WHERE username = 'viper'), (SELECT last_name FROM end_user WHERE username = 'viper'), (SELECT password FROM end_user WHERE username = 'viper')),
('HRR2', (SELECT username FROM end_user WHERE username = 'skye'), (SELECT first_name FROM end_user WHERE username = 'skye'), (SELECT last_name FROM end_user WHERE username = 'skye'), (SELECT password FROM end_user WHERE username = 'skye')),
('HRR3', (SELECT username FROM end_user WHERE username = 'sova'), (SELECT first_name FROM end_user WHERE username = 'sova'), (SELECT last_name FROM end_user WHERE username = 'sova'), (SELECT password FROM end_user WHERE username = 'sova'))
;

INSERT INTO company(CID, name, address, phone) VALUES 
(1,'Apple Company', 'Istanbul',902165235598),
(2,'Bubble Company', 'Ankara',902165423387),
(3,'Center Company', 'Denizli',902162485591),
(4,'Daily Company', 'Rize',902163612215),
(5,'Easter Company', 'Antalya',902163528146)
;

INSERT INTO employment_history(username,start_date,end_date,position,CID) VALUES 
((SELECT username FROM end_user WHERE username = 'rana00selim'), "2016-05-15", "2018-04-20",'Manager',(SELECT CID FROM company WHERE CID = 3)),
((SELECT username FROM end_user WHERE username = 'rana00selim'), "2018-06-12", "2021-01-01",'CEO',(SELECT CID FROM company WHERE CID = 1)),
((SELECT username FROM end_user WHERE username = 'viper'), "2016-09-15", "2019-04-25",'HRR',(SELECT CID FROM company WHERE CID = 2)),
((SELECT username FROM end_user WHERE username = 'skye'), "2015-01-22", "2021-07-20",'HRR',(SELECT CID FROM company WHERE CID = 5)),
((SELECT username FROM end_user WHERE username = 'sova'), "2013-02-27", "2020-08-23",'HRR',(SELECT CID FROM company WHERE CID = 3)),
((SELECT username FROM end_user WHERE username = 'sage'), "2016-05-10", "2018-12-03",'Intern',(SELECT CID FROM company WHERE CID = 3)),
((SELECT username FROM end_user WHERE username = 'sage'), "2019-06-15", "2020-10-21",'Junior',(SELECT CID FROM company WHERE CID = 3)),
((SELECT username FROM end_user WHERE username = 'reyna'), "2016-05-15", "2020-07-29",'Senior',(SELECT CID FROM company WHERE CID = 3))
;

INSERT INTO job_posting(JID,descr,salary,phone,is_man_or_intern,contract_type,opening_date,duration,CID,HRR_username) VALUES 
(1, 'A new job is waiting for you. Qualified only.',15000,(SELECT phone FROM company WHERE CID = 5),'manager','full time',"2021-04-01",30,(SELECT CID FROM company WHERE CID = 5),(SELECT username FROM HRR WHERE username = 'viper')),
(2, 'A new job is waiting for you. Qualified only.',5000,(SELECT phone FROM company WHERE CID = 5),'manager','part time',"2021-04-01",60,(SELECT CID FROM company WHERE CID = 5),(SELECT username FROM HRR WHERE username = 'viper')),
(3, 'A new job is waiting for you. For starters.',3000,(SELECT phone FROM company WHERE CID = 2),'intern','internship',"2021-04-01",45,(SELECT CID FROM company WHERE CID = 2),(SELECT username FROM HRR WHERE username = 'skye')),
(4, 'A new job is waiting for you. Qualified only.',25000,(SELECT phone FROM company WHERE CID = 2),'manager','full time',"2021-04-01",70,(SELECT CID FROM company WHERE CID = 2),(SELECT username FROM HRR WHERE username = 'skye')),
(5, 'A new job is waiting for you. For starters.',2000,(SELECT phone FROM company WHERE CID = 4),'intern','internship',"2021-04-01",40,(SELECT CID FROM company WHERE CID = 4),(SELECT username FROM HRR WHERE username = 'sova')),
(6, 'A new job is waiting for you. For starters.',1000,(SELECT phone FROM company WHERE CID = 4),'intern','internship',"2021-04-01",120,(SELECT CID FROM company WHERE CID = 4),(SELECT username FROM HRR WHERE username = 'sova'))
;

INSERT INTO manager_job_posting(JID,dept_name,dept_Size) VALUES 
((SELECT JID FROM job_posting WHERE JID = 1),'IT',48),
((SELECT JID FROM job_posting WHERE JID = 2),'Finance',190),
((SELECT JID FROM job_posting WHERE JID = 4),'Sales',152)
;

INSERT INTO internship_job_posting(JID,min_num_days) VALUES 
((SELECT JID FROM job_posting WHERE JID = 3), 30),
((SELECT JID FROM job_posting WHERE JID = 5), 60),
((SELECT JID FROM job_posting WHERE JID = 6), 30)
;

INSERT INTO application(JID,username,date_applied,resume,univ,program,gpa,standing,num_days) VALUES 
((SELECT JID FROM job_posting WHERE JID = 1),(SELECT username FROM end_user WHERE username = 'reyna'),"2021-04-18",'The hunt begins!',null,null,null,null),
((SELECT JID FROM job_posting WHERE JID = 1),(SELECT username FROM end_user WHERE username = 'rana00selim'),"2021-04-19",'Graduated from Isık University. Want this job.',null,null,null,null),
((SELECT JID FROM job_posting WHERE JID = 2),(SELECT username FROM end_user WHERE username = 'sage'),"2021-04-18",'You will not kill my allies!',null,null,null,null),
((SELECT JID FROM job_posting WHERE JID = 3),(SELECT username FROM end_user WHERE username = 'astra'),"2021-04-07",'World divided','Riot University','Astral Form', 3.56,'Controller',680),
((SELECT JID FROM job_posting WHERE JID = 4),(SELECT username FROM end_user WHERE username = 'viper'),"2021-04-19",'Welcome to my world!',null,null,null,null),
((SELECT JID FROM job_posting WHERE JID = 5),(SELECT username FROM end_user WHERE username = 'breach'),"2021-04-22",'Off your feet!','Riot University','Flashing Enemies', 2.45, 'Initiator',240),
((SELECT JID FROM job_posting WHERE JID = 6),(SELECT username FROM end_user WHERE username = 'killjoy'),"2021-04-05",'You should run!','Riot University','Robotics', 3.96, 'Sentinel', 745)
;

INSERT INTO end_user_employer(CID,username,start_date) VALUES 
((SELECT CID FROM company WHERE CID = 4),(SELECT username FROM end_user WHERE username = 'rana00selim'), "2021-02-11"),
((SELECT CID FROM company WHERE CID = 5),(SELECT username FROM end_user WHERE username = 'viper'),"2019-05-13"),
((SELECT CID FROM company WHERE CID = 2),(SELECT username FROM end_user WHERE username = 'skye'),"2021-09-02"),
((SELECT CID FROM company WHERE CID = 4),(SELECT username FROM end_user WHERE username = 'sova'),"2020-12-27"),
((SELECT CID FROM company WHERE CID = 1),(SELECT username FROM end_user WHERE username = 'sage'),"2020-1-25")
;

INSERT INTO courses_for_internship_apps(JID,username,course) VALUES 
((SELECT JID FROM job_posting WHERE JID = 3),(SELECT username FROM end_user WHERE username = 'astra'),'Aim Course'),
((SELECT JID FROM job_posting WHERE JID = 3),(SELECT username FROM end_user WHERE username = 'astra'),'Dividing World Course'),
((SELECT JID FROM job_posting WHERE JID = 5),(SELECT username FROM end_user WHERE username = 'breach'),'Blinding From the Back Of the Wall'),
((SELECT JID FROM job_posting WHERE JID = 5),(SELECT username FROM end_user WHERE username = 'breach'),'Earthquake Type of Shaking Course'),
((SELECT JID FROM job_posting WHERE JID = 5),(SELECT username FROM end_user WHERE username = 'breach'),'Aim Course'),
((SELECT JID FROM job_posting WHERE JID = 6),(SELECT username FROM end_user WHERE username = 'killjoy'),'Electronics')
;

