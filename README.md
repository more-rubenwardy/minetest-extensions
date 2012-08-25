Rubenwardy's Mod Forum
======================
 
A php and mysgl forum for mods.

Also a mod database for Jeijas Ingame Mod Manager
and Sfan's Python Mod Manager

License
=======

Copyright (c) 2012, Andrew "Rubenwardy" Ward
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met: 

1. Redistributions of source code must retain the above copyright notice, this
   list of conditions and the following disclaimer. 
2. Redistributions in binary form must reproduce the above copyright notice,
   this list of conditions and the following disclaimer in the documentation
   and/or other materials provided with the distribution.
3. This source code/software modified/unmodified must not be used for commercial use .
4. The copyright owner has the right to change these conditions at anytime with/without notice.
5. The copyright owner can issue an exception to these conditions.

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

(Changes suggested by VannesaE - http://multa.bugs3.com/minetest/chat_with_VenessaE.txt)

* (done)  list of mods, show license
* (done) More mods in demo
* (done)BBCode
* (work in progress) Keep up-to-date
* (done) user creation
* Search mod names and descriptions
* wrap desc text
* (almost done) edit posts

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