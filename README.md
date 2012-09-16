Rubenwardy's Mod Forum
======================
 
A php and mysql forum for mods.

Also a mod database for Jeija' s Ingame Mod Manager, Sfan's Python Mod Manager and Phitherek_' s 3m Minetest Mod Manager

License
=======

This project is Copyright (c) 2012, Andrew "Rubenwardy" Ward.

Some sections of code and the 3m api is Copyright (c) 2012 to Piotr "Phitherek_" Żurek


All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met: 

1. Redistributions of source code must retain the above copyright notice, this
   list of conditions and the following disclaimer. 
2. Redistributions that are hosted on the website must retain the above copyright notice, this
   list of conditions and the following disclaimer, and also the notice at the bottom of each page.
3. This source code/software modified/unmodified must not be used for commercial use .
4. The copyright owner has the right to change these conditions at anytime with/without notice.
5. The copyright owner can issue an exception to these conditions by giving specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

The views and conclusions contained in the software and documentation are those
of the authors and should not be interpreted as representing official policies, 
either expressed or implied, of the FreeBSD Project.

To Do
=====
* (done)  list of mods, show license
* (done) More mods in demo
* (done)BBCode
* (work in progress) Keep up-to-date
* (done) user creation
* Search mod names and descriptions
* (done) wrap desc text
* (almost done) edit posts

Database
========
The database structure.

mysql> show tables;
+-----------------------------+
| Tables_in_minetest_forum_db |
+-----------------------------+
| 3m_specific                 |
| mods                        |
| posts                       |
| users                       |
+-----------------------------+
4 rows in set (0.00 sec)

mysql> describe users;
+----------+--------------+------+-----+---------+----------------+
| Field    | Type         | Null | Key | Default | Extra          |
+----------+--------------+------+-----+---------+----------------+
| id       | int(11)      | NO   | PRI | NULL    | auto_increment |
| name     | varchar(100) | YES  |     | NULL    |                |
| email    | varchar(300) | YES  |     | NULL    |                |
| password | varchar(500) | YES  |     | NULL    |                |
| level    | int(11)      | YES  |     | NULL    |                |
| stars    | int(11)      | YES  |     | NULL    |                |
| avatar   | int(11)      | YES  |     | NULL    |                |
| location | varchar(50)  | YES  |     | NULL    |                |
| sig      | varchar(500) | YES  |     | NULL    |                |
+----------+--------------+------+-----+---------+----------------+
9 rows in set (0.00 sec)

mysql> describe mods;
+-------------------+--------------+------+-----+---------+----------------+
| Field             | Type         | Null | Key | Default | Extra          |
+-------------------+--------------+------+-----+---------+----------------+
| mod_id            | int(11)      | NO   | PRI | NULL    | auto_increment |
| name              | varchar(100) | YES  |     | NULL    |                |
| version           | varchar(20)  | YES  |     | NULL    |                |
| owner             | int(11)      | YES  |     | NULL    |                |
| description       | varchar(500) | YES  |     | NULL    |                |
| likes             | int(11)      | YES  |     | NULL    |                |
| dislikes          | int(11)      | YES  |     | NULL    |                |
| tags              | varchar(100) | YES  |     | NULL    |                |
| license           | varchar(10)  | YES  |     | NULL    |                |
| file              | varchar(500) | YES  |     | NULL    |                |
| depend            | varchar(500) | YES  |     | NULL    |                |
| basename          | varchar(100) | YES  |     | NULL    |                |
| date_released     | date         | YES  |     | NULL    |                |
| quality_total     | int(11)      | YES  |     | NULL    |                |
| quality_voters    | int(11)      | YES  |     | NULL    |                |
| usefullness_total | int(11)      | YES  |     | NULL    |                |
| cpu_total         | int(11)      | YES  |     | NULL    |                |
| cpu_voters        | int(11)      | YES  |     | NULL    |                |
+-------------------+--------------+------+-----+---------+----------------+
18 rows in set (0.01 sec)

mysql> describe posts;
+----------+--------------+------+-----+---------+----------------+
| Field    | Type         | Null | Key | Default | Extra          |
+----------+--------------+------+-----+---------+----------------+
| post_id  | int(11)      | NO   | PRI | NULL    | auto_increment |
| owner    | int(11)      | YES  |     | NULL    |                |
| post     | varchar(500) | YES  |     | NULL    |                |
| topic    | int(11)      | YES  |     | NULL    |                |
| likes    | int(11)      | YES  |     | NULL    |                |
| dislikes | int(11)      | YES  |     | NULL    |                |
+----------+--------------+------+-----+---------+----------------+
6 rows in set (0.00 sec)

mysql> describe 3m_specific;
+----------+-------------+------+-----+---------+-------+
| Field    | Type        | Null | Key | Default | Extra |
+----------+-------------+------+-----+---------+-------+
| id       | int(11)     | NO   | PRI | NULL    |       |
| rel      | int(11)     | YES  |     | NULL    |       |
| repotype | varchar(20) | YES  |     | NULL    |       |
+----------+-------------+------+-----+---------+-------+
3 rows in set (0.01 sec)