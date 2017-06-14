<?php
/**
 * Description: main functions of the theme
 * User: PCPV
 * Date: 06/14/2017
 * Time: 04:10 PM
 */

/**
 * define necessary variables
 */
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL .'/core');

/**
 * load core init
 */
require_once (CORE . '/init.php');