<?php
/*
Template Name: LOGOUT
*/
wp_logout();
header('location: ' . get_bloginfo("wpurl"));

?>