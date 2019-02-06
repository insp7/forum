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