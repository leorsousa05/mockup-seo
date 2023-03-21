<?php
header('Cache-Control: public, max-age=3600');
header('Expires: '.gmdate('D, d M Y H:i:s', time()+3600).' GMT');
require 'includes/configurations/routes.php';

?>
