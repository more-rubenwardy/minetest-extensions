Rubenwardy's Mod Forum
======================
 
A php and mysgl forum for mods.

Also a repo for Jeijas Ingame Mod Manager
and Sfan's Python Mod Manager

License
=======

CC BY-SA
 
Database
========

USERS:

*id   (int)
*name
*email
*password
*level  (int)
*stars
*avatar
*location
*sig

MOD:

*mod_id (int)
*name
*version
*owner
*description
*likes    (int)
*dislikes  (int)
*tags
*license
*file
*depend
*basename (the mod name, eg: "moreblocks")
*date_released  (date)

POSTS:

*post_id (int)
*Owner
*Post
*Topic (int)
*Like  (int)
*Dislike (int)