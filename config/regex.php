<?php 
// déclaration des constante pour le regex
//[\wÀ-ÿ-] correspond à un caractère alphanumérique, un caractère accentué ou un trait d'union (dash)
define('REGEX_TYPE', '^[\wÀ-ÿ-]{1,20}$'); 
define('REGEX_BRAND', '^[A-Za-zéèöçäëïà]{2,50}(-| )?([A-Za-zäëïöéèçà\']{2,50})?$');
define('REGEX_MODEL', '^[A-Za-z0-9\s-]{1,50}$');
define('REGEX_REGISTRATION', '^[A-Z]{2}-\d{3}-[A-Z]{2}$');
define('REGEX_MILEAGE', '^[0-9]*$');

define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);
define('FILE_SIZE', [3*1000*1000]);
define('NB_PER_PAGE', 10);


?>