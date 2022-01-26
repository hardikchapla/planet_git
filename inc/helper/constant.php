<?php

    // Defining base url
    if($_SERVER['HTTP_HOST'] == "localhost"){
        define("BASE_URL", "http://localhost/planet_git/");
    } else {
        define("BASE_URL", "https://uniformedtech.com/planethopper/");
    }
    

    // Getting Admin url
    define("ADMIN_URL", BASE_URL . "admin" . "/");

    define('DATE_FORMAT_YMD', 'Y-m-d H:i:s');
    define('IS_PRODUCT_DEVELOPMENT_MODE', false);
    define('APP_NAME', 'Planet Hopper TV');
    define('DATE_TIME_ZON', 'UTC');
    define('PASSWORD_RECOVERY', 'Planet Hopper TV Password Recovery');
    define('QUERY_RESPONSE', 'Response about your query');
    define('RESET_LINK', ADMIN_URL.'admin_reset_password');
    define('FAVICON', BASE_URL . 'images/Payload_logo2_3x.png');
    define('IMGURL', BASE_URL . 'images/');

    if (IS_PRODUCT_DEVELOPMENT_MODE):
    // EMAIL SETUP
    define('MAIL_FROM', 'admin@gmail.com');
    define('MAIL_FROM_NAME', 'Planet Hopper TV ');
    define('MAIL_HOST', 'smtp.gmail.com');
    define('MAIL_USERNAME', 'info.artechdev@gmail.com');
    define('MAIL_PASSWORD', 'ducfbawbzfhwljkp');
    define('MAIL_SMTP_SECURE', 'tls'); // SSL OR TLS
    define('MAIL_SMTP_PORT', '587');
	else:
    // EMAIL SETUP
    define('MAIL_FROM', 'admin@gmail.com');
    define('MAIL_FROM_NAME', 'Planet Hopper TV');
    define('MAIL_HOST', 'smtp.gmail.com');
    define('MAIL_USERNAME', 'info.artechdev@gmail.com');
    define('MAIL_PASSWORD', 'ducfbawbzfhwljkp');
    define('MAIL_SMTP_SECURE', 'tls'); // SSL OR TLS
    define('MAIL_SMTP_PORT', '587');
    endif;
    define('IS_DEBUG_MODE', TRUE);
    if (IS_DEBUG_MODE):
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        ini_set("error_reporting", E_ALL ^ E_NOTICE);
        ini_set('display_errors', 1);
    else:
        error_reporting(0);    
    endif;
