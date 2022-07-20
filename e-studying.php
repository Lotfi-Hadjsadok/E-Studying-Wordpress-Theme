<?php

/**
 * Plugin Name: E-Studying
 * Description: E-Studying Plugin
 * Author: Lotfi Hadjsadok
 * Domain Name: e-studying
 * Version: 1.2
 */

use Inc\Config;

if (!defined('ABSPATH')) die;
require_once plugin_dir_path(__FILE__) . '/vendor/autoload.php';
define('API_POSTS_PER_PAGE', 10);
define('PLUGIN_DIR', plugin_dir_path(__FILE__));
// START SERVICES
(new Config())->start();
