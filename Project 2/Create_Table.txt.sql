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
end_user_username varchar(40),
first_name varchar(20),
last_name varchar(20),
password varchar(40),
PRIMARY KEY (username)
);

CREATE TABLE company(
CID integer(16),
name varchar(100) NOT NULL,
address varchar(100) NOT NULL,
phone integer(12) NOT NULL,
PRIMARY KEY (CID)
);

CREATE TABLE employment_history(
username varchar(40),
start_date DATE NOT NULL,
end_date DATE NOT NULL,
duration INT GENERATED ALWAYS AS (end_date-start_date) VIRTUAL,
position varchar(25) NOT NULL,
CID int(16) NOT NULL,
PRIMARY KEY (username,start_date,CID),
FOREIGN KEY(username) REFERENCES end_user(username) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(CID) REFERENCES Company(CID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE job_posting(
JID integer(16),
descr varchar(100) NOT NULL,
salary integer(16) NOT NULL,
phone integer(12) NOT NULL,
is_man_or_intern varchar(10) NOT NULL,
contract_type varchar(15) NOT NULL,
opening_date DATE NOT NULL,
duration integer(10) NOT NULL,
CID integer(16) NOT NULL,
HRR_username varchar(40) NOT NULL,
PRIMARY KEY (JID),
FOREIGN KEY(CID) REFERENCES Company(CID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(HRR_username) REFERENCES HRR(username) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE manager_job_posting(
JID integer(16),
dept_name varchar(40) NOT NULL,
dept_Size integer(10) NOT NULL,
PRIMARY KEY (JID),
FOREIGN KEY(JID) REFERENCES job_posting(JID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE internship_job_posting(
JID integer(16),
min_num_days integer(10) NOT NULL,
PRIMARY KEY (JID),
FOREIGN KEY(JID) REFERENCES job_posting(JID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE application(
JID integer(16),
username varchar(40),
date_applied  DATE NOT NULL,
resume varchar(40) NOT NULL,
univ varchar(40),
program  varchar(40),
gpa double,
standing varchar(40),
num_days integer(10),
PRIMARY KEY (username,JID),
FOREIGN KEY(username) REFERENCES end_user(username) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(JID) REFERENCES job_posting(JID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE end_user_employer(
CID integer(16),
username varchar(40),
start_date DATE NOT NULL,
PRIMARY KEY (username,CID),
FOREIGN KEY(CID) REFERENCES Company(CID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(username) REFERENCES end_user(username) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE courses_for_internship_apps(
CIAID integer(16),
JID integer(16) NOT NULL,
username varchar(40) NOT NULL,
course varchar(40) NOT NULL,
PRIMARY KEY (CIAID),
FOREIGN KEY(JID) REFERENCES job_posting(JID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(username) REFERENCES end_user(username) ON DELETE CASCADE ON UPDATE CASCADE
);
