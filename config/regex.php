<?php 
// déclaration des constante pour le regex
define('REGEX_TYPE', '^[A-Za-zÀ-ÿ-]{2,50}+$'); 
define('REGEX_BRAND', '^[A-Za-zéèöçäëïà]{2,50}(-| )?([A-Za-zäëïöéèçà\']{2,50})?$');
define('REGEX_MODEL', '^[A-Za-z0-9\s-]{1,50}$');
define('REGEX_REGISTRATION', '^[A-Z]{2}-\d{3}-[A-Z]{2}$');
define('REGEX_MILEAGE', '^[0-9]*$');

define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);
define('FILE_SIZE', [3*1000*1000]);


?>