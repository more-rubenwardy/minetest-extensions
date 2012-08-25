Rubenwardy's Mod Forum
======================
 
A php and mysgl forum for mods.

Also a mod database for Jeijas Ingame Mod Manager
and Sfan's Python Mod Manager

License
=======

CC BY-SA

To Do
=====

(Changes suggested by VannesaE - http://multa.bugs3.com/minetest/chat_with_VenessaE.txt)

* (done)  list of mods, show license
* (done) More mods in demo
* (done)BBCode
* (work in progress) Keep up-to-date
* user login

Database
========
The database structure.

USERS:

* id   (int)
* name
* email
* password
* level  (int)
* stars
* avatar
* location
* sig

MOD:

* mod_id (int)
* name
* version
* owner
* description
* likes    (int)
* dislikes  (int)
* tags
* license
* file
* depend
* basename (the mod name, eg: "moreblocks")
* date_released  (date)
* quality_total (int)
* quality_voters (int)
* usefullness_total (int)
* cpu_total (int)
* cpu_voters (int)

POSTS:

* post_id (int)
* Owner
* Post
* Topic (int)
* Like  (int)
* Dislike (int)