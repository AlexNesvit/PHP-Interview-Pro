<?php

session_start();
session_unset();
session_destroy();
header('Location: /PHP-Interview-Pro/public/index.php');
exit;