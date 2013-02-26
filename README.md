Vicspace
========

Vicspace - Victoria based social network
My intention with this website was initially to build a dynamic online dating portal whereby users can interact with each other and post photo's.
The idea slowly changed while I was catching the local train to work and reading the dailyMX vent your spleen/train stalker section, I was inspired
to develop a website solely based on the concept of 'venting your spleen' and 'white crush stalking' but on a larger scale - State based rather
than only public transport. Hence I developed vicspace.com.

Live Demo: www.vicspace.com

Version 1.0.10
==============
Improvements
-------------
-PNG photo upload support





Installation:
----------------
-Copy all files into your public-html or hosted web directory

-Use CRON tool to schedule the PHP scripts within the cron directory (reset_daily_views.php 12AM-EVERYDAY, reset_post_limit.php 12AM-EVERYDAY, reset_weekend 8PM-SUNDAY)

-Modify MySQL database credential parameters within header.php, chat/get_table.php, chat/insert_table.php and INSTALL/index.php

-Run INSTALL directory (http://webserverurl/INSTALL or http://webserverurl/INSTALL/index.php) to import database

-Modify Apache (PHP.ini or .httaccess) to allow a MAX_UPLOAD_SIZE and MAX_POST_SIZE of over 4MB if you want large photo file uploads to function

-Access/Run website!

-Default Admin Username: admin Password: Kangan123



Features:
-----------
-User Registration

-Registration form authentication

-Email sent to user's email account once successfully registered
-User login
-Login authentication
-MySQL query sanitization
-User passwords are hashed using MD5
-Panel photo upload
-User profile view
-User profile number of views counter
-Views counter only updates per daily, unique user
-Cron job php script which truncates the daily_views mysql tables daily (I configured the CRON utility to run this script on a daily basis 12AM)
-Panel "Where are you going for the weekend"
-Weekend feature made to look nice using "Google Maps API"
-Cron job php script which resets the user's weekend preference (I configured the CRON utility to run this script on a weekly basis Sundays)
-Post a gossip post (optionally with a photo)
-Photo upload with a 4MB limit
-Comment a gossip
-Delete a comment
-Delete a gossip post (only original creator)
-"Open Chat" public chat 1.0
-Users online feature
-DPR "Daily Posts Remaining" feature which limits the users ability to post to 2 times a day
-Cron job php script which resets every user's DPR (I configured the CRON utility to run this script on a daily basis 12AM)
-Post photo upload
-Post 100 character limit
-IP address logging
-Postcode retrivel via XML utilizing simpleXML
-Postcode feedback in realtime via AJAX
-Feedback page wherevy users can post a review about the site or complaints
-Admin accounts with an accesslevel of 100 can access the 'Admin Panel'
-'Admin Panel' search user accounts
-'Admin Panel' delete and moderate posts
-'Admin Panel' view feedback messages
-CSS round table edges
-CSS table highlight onMouseOver


To do:
--------
-Need to implement a contact us page
-Need to implement feedback page
-Passwords are hashed using MD5 (This should ideally be replaced with using SHA-512 encryption)
-Users online feature must be polished as it does not detect offline users who's sessions have timed out - This is usually the case when they don't log out by closing the browser instead


Tools used:
--------------
-HTML
-CSS
-PHP5
-Javascript
-CRON




I've decided that this project is now opensource - assuming that I recieve accreditation if you decide to deploy it (Just mention my name somewhere on the about-us page)
