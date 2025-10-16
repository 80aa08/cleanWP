<?php

$msg = "Imię i nazwisko: ". $_POST['name'];
echo $msg;
echo home_url();
wp_redirect();
exit
?>