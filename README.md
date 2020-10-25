# PHP_CRUD_with_AUTH


<h3>Project Description:</h3></br>
Created a basic PHP CRUD with Login and Signup page.</br>
The database used is MySQL.</br>

First of all user can get themselves registered on the website then can login and view the users details</br>
and they'll have various options to manipulate the same like:</br> 
Adding users</br>
Reload the data</br>
Bulk Delete</br>
Bulk Insert through CSV file</br>
Log out </br>

<h3>Requirements</h3>
1. Please make sure php is installed and running in your system</br>
2. Open browser and goto localhost/phpmyadmin</br>
   and create 1 databse named assignment. Now create two tables inside this database.</br>
   <b>Table 1:</b></br>
   CREATE TABLE admin (</br>
   id int AUTO_INCREMENT PRIMARY KEY,</br>
   email varchar(25),</br>
   password varchar(70)</br>
   );</br>
   
   <b>Table 2:</b></br>
   CREATE TABLE users ( </br>
   id int AUTO_INCREMENT PRIMARY KEY, </br>
   first_name varchar(25),</br>
   last_name varchar(25),</br>
   gender varchar(8),</br>
   country varchar(12),</br>
   dob date</br>
   );</br>

<h3>Running the project </h3>
The easiest way to run the project is:</br>
1. Get this repository to your local system</br>
2. Goto the php installed files location and find htdocs</br>
3. paste this project inside the htdocs </br>
4. Open browser and goto localhost:/['folder_name']</br>

example: My folder is htdocs>PHP_CRUD_with_AUTH</br>
         so url will be:  localhost/PHP_CRUD_with_AUTH/</br>
        
