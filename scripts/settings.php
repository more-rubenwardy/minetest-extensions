<?php
//scripts/settings.conf
//---------------------
//configuration file

// Mod Forum/Browser details
// Settings that personalise the mod forum/browser

$game="Minetest"; // The game's name
$game_sh="MT"; // The game's name in short hand
$logo=""; // The game's logo
$serverpath="http://localhost/minetest-forum"; // The base url to the mod forum


// SQL Database
// Settings needed to connect to the MySql Database

$sql_url="localhost"; // The URL to the MySql Server
$sql_user="root"; // The username for the MySql Server
$sql_pass=""; // The password for the MySql Server
$sql_db="minetest";


// Email Address Settings
// Settings that change what users can do with/without a vertified account

$require_email=true; // Require Email Address
$emailver_mod=true; // Require Email Vertification to post
$emailver_login=false;  // Require Email Vertification to log in

$mt_lock_down=false; // if true, only admins can access forum
$mt_lock_msg="";
?>