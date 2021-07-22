<?php

$session = \Config\Services::session();
echo $session->get('userData')['Email'];

?>

hi