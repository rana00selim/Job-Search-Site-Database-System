/* Example 1 =>  Select the last names of unemployed end-users.*/
SELECT last_name as 'Last Names of Unemployed End-Users' 
FROM end_user
WHERE end_user.last_name not in 
(SELECT last_name FROM  END_USER e RIGHT OUTER JOIN employment_history h on e.username=h.username order by h.username != 'null');


/* Example 2 => Select the count of HRRs that also have an end-user profile.*/
SELECT COUNT(*) AS 'Count of HRR s That Have An End-User Profile' 
FROM HRR 
WHERE end_user_username != 'null';


/* Example 3 => Select the company (or companies) that listed the highest paying job’s posting.*/
SELECT C.CID, C.Name, salary AS 'Highest Paying Job Salary' 
FROM job_posting j LEFT OUTER JOIN company c ON j.CID = c.CID 
WHERE salary = (SELECT MAX(salary) FROM job_posting);

/* Example 4 => Select the end-user that has been working at the same company for the longest period.*/
SELECT Username, CID, Position, MAX(Duration) AS 'Max Duration' 
FROM employment_history 
WHERE duration = (SELECT MAX(duration) FROM employment_history);

/* Example 5 => Select the first name and last name of the HRRs that posted a job listing for company C.*/
SELECT JID, first_name as 'First Name', last_name as 'Last Name' 
FROM HRR h LEFT OUTER JOIN job_posting j on h.username = j.HRR_username 
WHERE cid = 2;

/* Example 6 => Select the number of end-users that applied to job listing J.*/
SELECT JID, COUNT(*) as 'Number of End-Users That Applied' 
FROM application 
WHERE JID = 1; 

/* Example 7 => Select the number of applications by end-user E.*/
SELECT Username, COUNT(*) AS 'Number of Applications' 
FROM application 
WHERE username = 'rana00selim';

/* Example 8 => Select the username of the end-user(s) that has the maximum experience. Experience is measured by 
the duration of employment and does not include current employment.*/
SELECT Username, Duration AS 'Max Duration' 
FROM employment_history WHERE duration = (SELECT MAX(duration) FROM employment_history);

/* Example 9 => Select the highest paying job listing.*/
SELECT JID, MAX(salary) AS 'Highest Paying Job Salary' 
FROM job_posting 
WHERE salary = (SELECT MAX(salary) FROM job_posting);

/* Example 10 => For each end-user, list the number of applications to job listings. Order the result set by count in 
descending order.*/
SELECT Username, COUNT(JID) as 'Number of Applications' 
FROM application 
GROUP BY username ORDER BY COUNT(JID) desc;

/* Example 11 =>  Find the jobs those are suitable for an end user E, who is looking for a part-time job to work during 
the summer in Bodrum.*/
SELECT * FROM job_posting j LEFT OUTER JOIN company c ON c.CID = j.CID 
WHERE contract_type = 'part time' AND (opening_date >= "2021-06-01" AND opening_date < "2021-09-01") AND address = 'Bodrum';

/* Example 12 => Find the highest paying manager job with department size <50 for an end user E.*/
SELECT dept_name as 'Department Name', dept_Size as 'Department Size', MAX(salary), j.* 
FROM manager_job_posting m
LEFT OUTER JOIN job_posting j ON m.jid = j.jid
WHERE dept_Size <50;

/* Example 13 => List the open internships positions of a particular company C which allows more than 20 days.*/
SELECT j.* FROM internship_job_posting i
LEFT OUTER JOIN job_posting j ON i.JID = j.JID
WHERE min_num_days >= 20 AND cid = 4;