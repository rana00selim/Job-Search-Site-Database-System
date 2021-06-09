insert into end_user values 
("johnDoe", "1111", "john", "doe", 'D'),
("jimStevens", "1111", "jim", "stevens", 'C'),
("maryAnn", "1111", "mary", "ann", 'E'),
("jackDaniels", "1111", "jack", "daniels", 'E'),
("robertNix", "1111", "robert", "nix", 'D'),
("michaelphelps", "1111", "michael", "phelps", 'E'),
("naomiosaka", "1111", "naomi", "osaka", 'E'),
("compest1", "1111", "compe", "st1", 'E'),
("softest1", "1111", "softe", "st1", 'E');


insert into hrr values 
("johnDoeHRR", "1111", "johnny@gmail.com", "john", "doe", "johnDoe"),
("julieEvansHRR", "1111", "july@hotmail.com", "july", "evans", null),
("philCollinsHRR", "1111", "philly@gmail.com", "phil", "collins", null),
("maryAnnHRR", "1111", "maria@hotmail.com", "mary", "ann", "maryann"),
("donaldDuckHRR", "1111", "ducky@gmail.com", "donald", "duck", null);

insert into company values 
(1, "Oracle", "US", 1112223344),
(2, "Microsoft", "US", 1112223344),
(3, "Bodrumda bir otel", "Bodrum Yalikavak", 1112223344),
(4, "Ibm", "US", 1112223344),
(5, "Alcatel", "US", 1112223344),
(6, "TUBITAK", "TR", 1112223344),
(7, "Google", "IR", 1112223344);


insert into employment_history values 
("2010-01-01", "2011-01-01", "manager", "johnDoe", 1),
("2009-01-01", "2010-01-01", "engineer", "johnDoe", 1),
("2008-01-01", "2009-01-01", "engineer", "johnDoe", 2),
("2010-01-01", "2011-01-01", "manager", "jimStevens", 3),
("2009-01-01", "2010-01-01", "engineer", "jimStevens", 3),
("2008-01-01", "2009-01-01", "intern", "jimStevens", 3),
("2010-01-01", "2011-01-01", "secretary", "maryAnn", 4),
("2009-01-01", "2010-01-01", "analyst", "robertNix", 5),
("2010-01-01", "2011-01-01", "financial specialist", "jackDaniels", 4),
("2009-01-01", "2010-01-01", "intern", "jackDaniels", 4);

insert into job_posting values 
(1, "computer engineer", 80000, 1112223344, 3, "johnDoeHRR", "2011-03-15",20,1,0,"PT"),
(2, "secretary", 60000, 1112223344, 2, "johnDoeHRR","2011-02-01",30,1,0,"FT"), 
(3, "software engineer", 90000, 1112223344, 1, "johnDoeHRR","2011-03-01",30,1,0,"PT"), 
(4, "head of IT", 100000, 1112223344, 1, "johnDoeHRR","2011-03-20",30, 2,1,"FT"), 
(5, "software test architect", 400000, 1112223344, 5, "julieEvansHRR","2011-02-01",30, 2,0,"FT"),
(6, "Computer Vision Researcher", 40000, 1112223344, 8, "julieEvansHRR", "2011-04-01",30,2,0,"PT"), 
(7, "office boy", 30000, 1112223344, 2, "philCollinsHRR","2011-03-27",30, 3,0,"PT"), 
(8, "lifeguard", 200000, 1112223344, 1, "philCollinsHRR","2011-02-01",30,3,0,"FT"), 
(9, "database admin", 70000, 1112223344, 1, "maryAnnHRR", "2011-03-15",30,4,1,"FT"), 
(10, "CEO", 40000, 1112223344, 7, "donaldDuckHRR","2011-05-01",30,4,0,"FT"), 
(11, "Industrial Engineer", 200000, 1112223344, 1, "philCollinsHRR","2011-02-01",30,3,1,"FT"), 
(12, "computer engineer", 0, 1112223344, 8, "julieEvansHRR","2011-05-01",30,4,0,"FT"),
(13, "software test engineer", 0, 1112223344, 10, "julieEvansHRR","2011-05-01",30,7,0,"FT"), 
(14, "database systems", 0, 1112223344, 7, "maryAnnHRR","2011-05-01",30,4,0,"FT");

INSERT INTO manager_job_posting VALUES 
(4,"IT", 22),
(8,"BeachServices", 20),
(9,"databasedev", 5),
(11,"Management", 5);

INSERT INTO internshipJobPosting values 
(12, 20), 
(13,20), 
(14,20);


insert into application(jid, username, applyDate, resumee, univ, program, gpa, standing, numDays) values 
(8, "michaelphelps", "2011-03-27", "I won gold medal in olimpic games",null,null,null,null,null),
(8, "naomiosaka", "2011-02-21", "I play tennis, but swimming is also fine",null,null,null,null,null),
(9, "robertNix", "2011-03-31", "I really need the money.",null,null,null,null,null),
(7, "jackDaniels", "2011-04-01", "I dont have much experience, but I work hard.",null,null,null,null,null),
(2, "maryAnn", "2011-02-28", "Do you want more coffee sir?",null,null,null,null,null),
(1, "johnDoe", "2011-03-30", "I apply to all job postings.",null,null,null,null,null),
(2, "johnDoe", "2011-03-30", "I apply to all job postings.",null,null,null,null,null),
(3, "johnDoe", "2011-03-30", "I apply to all job postings.",null,null,null,null,null),
(4, "johnDoe", "2011-03-30", "I apply to all job postings.",null,null,null,null,null),
(5, "johnDoe", "2011-03-30", "I apply to all job postings.",null,null,null,null,null),
(12, "compest1", "2011-03-30", "I apply to all internship postings.","Işık Ün.","Computer Engineer",2.8,3,40),
(14, "compest1", "2011-03-30", "I apply to all internship postings.","Işık Ün.","Computer Engineer",2.8,3,40),
(12, "softest1", "2011-03-30", "I apply to all internship postings.","Şile Ün.","Software Engineer",3.2,2,20),
(13, "softest1", "2011-03-30", "I apply to all internship postings.","Şile Ün.","Software Engineer",3.2,2,20);


INSERT INTO `coursesforintershipapps`(jid, username,course) VALUES 
(12, "compest1","Java Programming"),
(12, "compest1","Object Oriented Programming"),
(12, "compest1","Database Systems"),
(12, "compest1","Software Engineering"),
(14, "compest1","Java Programming"),
(14, "compest1","Object Oriented Programming"),
(14, "compest1","Database Systems"),
(14, "compest1","Software Engineering"),
(14, "compest1","Data Engineering"),
(12, "softest1","Java Programming"),
(12, "softest1","Object Oriented Programming"),
(12, "softest1","Database Systems"),
(13, "softest1","Java Programming"),
(13, "softest1","Object Oriented Programming"),
(13, "softest1","Database Systems"),
(13, "softest1","Software Testing");



insert into eu_emails values
("johnDoe", "johhnyBoy@gmail.com"),
("johnDoe", "johhnyBoy@hotmail.com"),
("maryAnn", "maria@gmail.com"),
("jackDaniels", "live_drunk@gmail.com"),
("robertNix", "robnix@hotmail.com"),
("jimStevens", "jimStevens@gmail.com"),
 ("michaelphelps", "michaelphelps@gymail.com"),
 ("naomiosaka", "naomiosaka@gymail.com"),
 ("compest1", "compest1@gymail.com"),
 ("softest1", "softest1@gymail.com");

insert into eu_employer values
("jackDaniels", 1, "2011-01-01"),
("maryAnn", 2, "2011-02-01"),
("robertNix", 3, "2011-01-02");
