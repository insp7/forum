# simpleForum
Simple Implementation of a Q&amp;A Forum website

# Abstract
Gone are the days of traditional teaching approach, where the teacher can only answer students’ questions when they are in the lecture or when the students have to explicitly go to the teacher to clarify their doubts. This simple implementation of forum will help the student to ask/post their doubts/questions and the teacher can reply to those questions on the forum. Other students can also see what are the questions asked and hence understand the topic in even greater depth. 

This way we can save a lot of physical effort and utilize time in an efficient manner. 
After all, there should not be any kind of hindrance in a student’s education.

# Structure

> Assuming there are 2 roles for our website: Admin & user(more roles can specified further).

### Brief summary  

#### admin: 
A directory named 'admin' for files that can ONLY be accessed by the admin. The root directory contains all the files related to the user role and can be accessed by the admin.

#### ui-elements: 
Contains all the common, re-usable ui elements. These files are later 'included/required'(imported) as and when required.

#### posts: 
* *view-all-posts* -> Makes request to the database for viewing all the posts.
* *comments* -> Fetches all the comments on the current post and displays a text-area for the current user to add(create new) his own comment.
* *add-post* -> Lets the current user to add/create new posts.

#### assets: 
* **js** Contains core javascript for the website(in the file scripts.js)
* **dist** Contains the template's css & js distributions.
* **css** Contains custom css styles that override certain template's distributed CSS properties.

#### classes: 
Contains the backend 'functionality' code for the website. Classes are written for all relations in the database. Every class has utility methods for communicating with its specific(& if required any other) relations in the database. Additional classes can be added as per usecase. 

#### manage-ajax.php:
The HTTP request sent from the 'assets/js/scripts.js' file shall be handled here. The request is served by methods which belong to one of the classes in the 'classes' folder. The response from the methods is returned to the 'assets/js/scripts.js' file and that response is handled there itself.

#### register.php: 
Register form page for new users.

#### login.php: 
Login page for the website.

#### index.php: 
The website homepage.

#### forumdb.sql: 
Latest updated copy of SQL database.

#### admin-access-denied.html & access-denied.html: 
The access-denied pages designed for specific situations.

# Installation Notes 
1. Open cmd in the project root folder & Run **'npm install'.**
2. Start Xampp control panel; **start Apache & MySQL server.**
3. Open browser, go to **'localhost/phpmyadmin'.**
4. **Create a new user** Click 'User Accounts' > 'Add user account', set username, select hostname as 'local', set password, click 'check all' for 'Global Privileges' & click 'Go'. Now a new user is created. This step is optional, you can use 'root'; however, its recommended that you create a custom user for yourself.
5. Click *'new'* to Create a new databse and name it 'forumdb'(Or set any name as per your preference).
6. Click the 'Import' tab & import the 'forumdb.sql' file. **Make sure that the newly created database is selected.** Now all the schema for 'forumdb' is imported into this database.
7. Open file **'/classes/Database.php'**; In the constructor, set the following values: *$this->username* = **your_username_or_root**, *$this->password* = **your_password_if_any_else_keep_this_blank**, *$this->database* = **your_database_name**. 
8. (If you haven't already done this) Quickly move this entire project folder into **'C:\xampp\htdocs'**(By default xampp is installed in C drive, if thats not the case, move to *'your_drive':\xampp\htdocs*).
9. Open the browser, and go to 'localhost/**forum**/index.php'. (Note: Here, **forum** is the assumed name for the project directory); An *'access-denied.html'* page should be displayed; Thats because, you need to login/register first.
10. To register newly, go to *'localhost/forum/register.php'*; Enter the necessary details, and once you're done with regisetering, you're good to go! Return to the login page & login with the currently created user!
11. To login as an **admin**, look for the details(useremail & password) of the existing users from the database relation **'users'.**
12. *Welp, that's that! Now go have a look at the website for yourself!*
