<?php

/* 
 * Template Name: Sair
 */
wp_logout();
wp_redirect( home_url() );
exit;
