CREATE TABLE end_user (
    username VARCHAR(15) NOT NULL,
    passwrd VARCHAR(10) NULL DEFAULT NULL,
    fname VARCHAR(15) NULL DEFAULT NULL,
    lname VARCHAR(15) NULL DEFAULT NULL,
    military_service_stat CHAR CHECK (military_service_stat IN ('E' , 'D', 'C')),
    PRIMARY KEY (username)
);

CREATE TABLE eu_emails (
    username VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    PRIMARY KEY (username , email),
    FOREIGN KEY (username) REFERENCES end_user (username) ON DELETE CASCADE
);

CREATE TABLE hrr (
    username VARCHAR(15) NOT NULL,
    passwrd VARCHAR(10),
    email VARCHAR(50),
    fname VARCHAR(15),
    lname VARCHAR(15),
    endUser_username VARCHAR(15),
    PRIMARY KEY (username),
    FOREIGN KEY (endUser_username) REFERENCES end_user (username) ON DELETE CASCADE
);

CREATE TABLE company (
    cid INT(11) NOT NULL,
    name VARCHAR(20),
    address VARCHAR(50),
    phone DECIMAL(10 , 0 ),
    PRIMARY KEY (cid)
);
  
CREATE TABLE employment_history (
    beginDate DATE,
    endDate DATE NOT NULL,
    positionn VARCHAR(20),
    username VARCHAR(15) NOT NULL,
    cid INT(11) NOT NULL,
    PRIMARY KEY (username , cid , beginDate),
    FOREIGN KEY (cid)
        REFERENCES company (cid)
        ON DELETE CASCADE,
    FOREIGN KEY (username)
        REFERENCES end_user (username)
        ON DELETE CASCADE    
);

CREATE TABLE eu_employer (
    username VARCHAR(15) NOT NULL,
    comp_cid INT(11) NOT NULL,
    beginDate DATE NOT NULL,
    PRIMARY KEY (username),
    FOREIGN KEY (comp_cid)
        REFERENCES company (cid)
        ON DELETE CASCADE,
    FOREIGN KEY (username)
        REFERENCES end_user (username)
        ON DELETE CASCADE
) ;


CREATE TABLE job_posting (
    jid INT,
    description VARCHAR(200),
    salary DECIMAL(10 , 2 ),
    phone DECIMAL(10 , 0 ),
    numOpenings INT CHECK (numOpenings > 0),
    hrr_username VARCHAR(15) NOT NULL,
    openingdate DATE,
    duration INT CHECK (duration > 0),
    comp_cid INT NOT NULL,
    is_manOrIntern int, #0 for none, 1 for manager, 2 for intern
    contract_type VARCHAR(2) CHECK (contract_type IN ('PT' , 'FT')),
    PRIMARY KEY (jid),
    FOREIGN KEY (hrr_username)
        REFERENCES hrr (username)
        ON DELETE CASCADE,
    FOREIGN KEY (comp_cid)
        REFERENCES company (cid)
        ON DELETE CASCADE            
);

CREATE TABLE manager_job_posting (
    jid INT,
    deptName VARCHAR(20),
    deptSize INT CHECK (deptSize > 0),
    PRIMARY KEY (jid),
    FOREIGN KEY (jid)
        REFERENCES job_posting (jid)
        ON DELETE CASCADE
);

CREATE TABLE application (
    jid INT(11) NOT NULL,
    username VARCHAR(15) NOT NULL,
    applyDate DATE NOT NULL,
    resumee VARCHAR(500) NULL DEFAULT NULL,
	univ VARCHAR(500),
	program VARCHAR(500),
	gpa double,
	standing int(1),
	numDays int(3),
    PRIMARY KEY (jid , username),
    FOREIGN KEY (username) REFERENCES end_user (username) ON DELETE CASCADE,
    FOREIGN KEY (jid) REFERENCES job_posting (jid) ON DELETE CASCADE
) ;

create table coursesForInterShipApps(
	ciaid int NOT NULL AUTO_INCREMENT,
	jid INT, 
	username VARCHAR(15) NOT NULL,
	course varchar(50),
	PRIMARY KEY (ciaid), 
	FOREIGN KEY (jid) REFERENCES job_posting (jid) ON DELETE CASCADE, 
	FOREIGN KEY (username) REFERENCES end_user (username) ON DELETE CASCADE
);

create table internshipJobPosting(
	jid INT,
    minnumDays int(3),    
    PRIMARY KEY (jid),
    FOREIGN KEY (jid)
        REFERENCES job_posting (jid)
        ON DELETE CASCADE
);