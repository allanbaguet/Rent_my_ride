<?php 
// déclaration des constante pour le regex
//[\wÀ-ÿ-] correspond à un caractère alphanumérique, un caractère accentué ou un trait d'union (dash)
// regex véhicules
define('REGEX_TYPE', '^[\wÀ-ÿ-]{1,20}$'); 
define('REGEX_BRAND', '^[A-Za-zéèöçäëïà]{2,50}(-| )?([A-Za-zäëïöéèçà\']{2,50})?$');
define('REGEX_MODEL', '^[A-Za-z0-9\s-]{1,50}$');
define('REGEX_REGISTRATION', '^[A-Z]{2}-\d{3}-[A-Z]{2}$');
define('REGEX_MILEAGE', '^[0-9]*$');
define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);
define('FILE_SIZE', [3*1000*1000]);

// regex accueil -> 10 articles
define('NB_PER_PAGE', 10);

//regex formulaire clients
define('REGEX_LASTNAME', '^[A-Za-zÀ-ÿ-]+$'); 
define('REGEX_FIRSTNAME', "^([A-Za-zÀ-ÿ\-']+ ?)+$");
define('REGEX_EMAIL', '^[\w\.\-]+@[\w\-]+\.[a-z]{2,5}$');
// define('REGEX_BIRTHDAY', '^\d{4}-\d{2}-\d{2}$');
define('REGEX_PHONE', '^\d{10}$');
// define('REGEX_CITY');
define('REGEX_ZIPCODE', '^\d{5}$');



?>