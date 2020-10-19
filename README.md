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



<h3>Running the project </h3></br>
The easiest way to run the project is:</br>
1. Get this repository to your local system</br>
2. Please make sure php is installed and running in your system</br>
3. Goto the php installed files location and find htdocs</br>
4. paste this project inside the htdocs </br>
5. Open browser and goto localhost/phpmyadmin</br>
   and create 1 databse named assignment. Now create two tables inside this database.</br>
   <b>Table 1:</b></br>
   table name: admin</br>
   No of coulmns: 3</br>
   column1:- name: id,    type: int(11), AUTO_INCREMENT</br>
   column2:- name: email, type: varchar(25),</br>
   column3:- name: password, type: varchar(25)</br>
   </br>
   <b>Table 2:</b></br>
   table name: users</br>
   No of coulmns: 2</br>
   column1:- name: id, type: int(11), AUTO_INCREMENT</br>
   column2:- name: first_name, type: varchar(25),</br>
   column3:- name: last_name, type: varchar(25)</br>
   column4:- name: gender, type: varchar(25)</br>
   column5:- name: country, type: varchar(25)</br>
   column6:- name: dob, type: date</br>

5. Open browser and goto localhost:/['folder_name']</br>

example: My folder is htdocs>PHP_CRUD_with_AUTH</br>
         so url will be:  localhost/PHP_CRUD_with_AUTH/</br>
        
