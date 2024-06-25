<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path . "/attendancemanager/database/database.php";
function clearTable($dbo, $tabName)
{
  $c = "delete from ".$tabName;
  $s = $dbo->conn->prepare($c);
  try {
    $s->execute();
    echo($tabName." cleared");
  } catch (PDOException $oo) {
    echo($oo->getMessage());
  }
}
$dbo = new Database();
$c = "create table student_details
(
    id int auto_increment primary key,
    roll_no varchar(20) unique,
    name varchar(50),
    email_id varchar(100)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>student_details created");
} catch (PDOException $o) {
  echo ("<br>student_details not created");
}

$c = "create table course_details
(
    id int auto_increment primary key,
    code varchar(20) unique,
    title varchar(50),
    credit int
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_details created");
} catch (PDOException $o) {
  echo ("<br>course_details not created");
}


$c = "create table faculty_details
(
    id int auto_increment primary key,
    user_name varchar(20) unique,
    name varchar(100),
    password varchar(50)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>faculty_details created");
} catch (PDOException $o) {
  echo ("<br>faculty_details not created");
}


$c = "create table session_details
(
    id int auto_increment primary key,
    year int,
    term varchar(50),
    unique (year,term)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>session_details created");
} catch (PDOException $o) {
  echo ("<br>session_details not created");
}



$c = "create table course_registration
(
    student_id int,
    course_id int,
    session_id int,
    primary key (student_id,course_id,session_id)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_registration created");
} catch (PDOException $o) {
  echo ("<br>course_registration not created");
}
clearTable($dbo, "course_registration");

$c = "create table course_allotment
(
    faculty_id int,
    course_id int,
    session_id int,
    primary key (faculty_id,course_id,session_id)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_allotment created");
} catch (PDOException $o) {
  echo ("<br>course_allotment not created");
}
clearTable($dbo, "course_allotment");

$c = "create table attendance_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    status varchar(10),
    primary key (faculty_id,course_id,session_id,student_id,on_date)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>attendance_details created");
} catch (PDOException $o) {
  echo ("<br>attendance_details not created");
}
clearTable($dbo, "attendance_details");

$c = "create table sent_email_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    id int auto_increment primary key,
    message varchar(200),
    to_email varchar(100)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>sent_email_details created");
} catch (PDOException $o) {
  echo ("<br>sent_email_details not created");
}
clearTable($dbo, "sent_email_details");

clearTable($dbo, "student_details");
$c = "insert into student_details
(id,roll_no,name,email_id)
values
(1, 'IIT2021157', 'Sarvesh Shukla', 'shuklasarvesh495@gmail.com'),
(2, 'IIT2021123', 'Vivek Mishra', 'sstutor06@gmail.com'),
(3, 'IIT2021124', 'Virat Panday', 'abc@gmail.com'),
(4, 'IIT2021101', 'Priya Gupta', 'abc@gmail.com'),
(5, 'IIT2021104', 'Rohan Verma', 'abc@gmail.com'),
(6, 'IIT2021109', 'Neha Agarwal', 'abc@gmail.com'),
(7, 'IIT2021174', 'Pratibha Chatterjee', 'pratibhachatterjee@gmail.com'),
(8, 'IIT2021164', 'Meera Gupta', 'abc@gmail.com'),
(9, 'IIT2021129', 'Aman Desai', 'abc@gmail.com'),
(10, 'IIT20211206', 'Vivek Manwar', 'vmanwar364@gmail.com'),
(11, 'IIT2021100', 'Kunal Joshi', 'abc@gmail.com'),
(12, 'IIT2021105', 'Isha Patel', 'abc@gmail.com'),

(13, 'IIT2021134', 'Nikhil Reddy', 'abc@gmail.com'),
(14, 'IIT2021133', 'Sneha Mehta', 'abc@gmail.com'),
(15, 'IIT2021002', 'Amit Khanna', 'abc@gmail.com'),
(16, 'IIT2021003', 'Ritu Yadav', 'abc@gmail.com'),
(17, 'IIT2021007', 'Arjun Rao', 'abc@gmail.com'),
(18, 'IIT2021209', 'Lakshmi Menon', 'abc@gmail.com'),
(19, 'IIT2021144', 'Ravi Kumar', 'abc@gmail.com'),
(20, 'IIT2021120', 'Asha Reddy', 'abc@gmail.com'),
(21, 'IIT2021143', 'Gaurav Sharma', 'abc@gmail.com'),
(22, 'IIT2021102', 'Pooja Malhotra', 'abc@gmail.com'),
(23, 'IIT2021187', 'Rohit Patil', 'abc@gmail.com'),
(24, 'IIT2021142', 'Sanya Kapoor', 'abc@gmail.com')
";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

clearTable($dbo, "faculty_details");
$c = "insert into faculty_details
(id,user_name,password,name)
values
(1,'aayu','123','Ayush Panday'),
(2,'Adii','123','Aditi Tripathi'),
(3,'pal','123','Pallabi Mishra'),
(4,'yashu','123','Yashvi Mishra'),
(5,'Sarv','123','Sarvaksh Shukla'),
(6,'anu','123','Ankur')";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

clearTable($dbo, "session_details");
$c = "insert into session_details
(id,year,term)
values
(1,2023,'SPRING SEMESTER'),
(2,2023,'AUTUMN SEMESTER'),
(3,2024,'SPRING SEMESTER')";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

clearTable($dbo, "course_details");
$c = "insert into course_details
(id,title,code,credit)
values
  (1,'Database management system ','CO321',2),
  (2,'OPERATING SYSTEM','CO215',3),
  (3,'DATA MINING ','CS112',4),
  (4,'ARTIFICIAL INTELLIGENCE','CS670',4),
  (5,'THEORY OF COMPUTATION ','CO432',3),
  (6,'COMPUTER NETWORKS ','CS673',1)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

//if any record already there in the table delete them
clearTable($dbo, "course_registration");
$c = "insert into course_registration
  (student_id,course_id,session_id)
  values
  (:sid,:cid,:sessid)";
$s = $dbo->conn->prepare($c);
//iterate over all the 24 students
//for each of them chose max 3 random courses, from 1 to 6

for ($i = 1; $i <= 24; $i++) {
  for ($j = 0; $j < 3; $j++) {
    $cid = rand(1, 6);
    //insert the selected course into course_registration table for 
    //session 1 and student_id $i
    try {
      $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 1]);
    } catch (PDOException $pe) {
    }

    //repeat for session 2
    $cid = rand(1, 6);
    //insert the selected course into course_registration table for 
    //session 2 and student_id $i
    try {
      $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 2]);
    } catch (PDOException $pe) {
    }

    //repeat for session 3
    $cid = rand(1, 6);
    //insert the selected course into course_registration table for 
    //session 2 and student_id $i
    try {
      $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 3]);
    } catch (PDOException $pe) {
    }
  }
}


//if any record already there in the table delete them
clearTable($dbo, "course_allotment");
$c = "insert into course_allotment
  (faculty_id,course_id,session_id)
  values
  (:fid,:cid,:sessid)";
$s = $dbo->conn->prepare($c);
//iterate over all the 6 teachers
//for each of them chose max 2 random courses, from 1 to 6

for ($i = 1; $i <= 6; $i++) {
  for ($j = 0; $j < 2; $j++) {
    $cid = rand(1, 6);
    //insert the selected course into course_allotment table for 
    //session 1 and fac_id $i
    try {
      $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 1]);
    } catch (PDOException $pe) {
    }

    //repeat for session 2
    $cid = rand(1, 6);
    //insert the selected course into course_allotment table for 
    //session 2 and student_id $i
    try {
      $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 2]);
    } catch (PDOException $pe) {
    }

    //repeat for session 3
    $cid = rand(1, 6);
    //insert the selected course into course_allotment table for 
    //session 2 and student_id $i
    try {
      $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 3]);
    } catch (PDOException $pe) {
    }
  }
}
