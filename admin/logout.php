<?php
require_once 'php/ca4nafa3ga.php';
session_start();
logged();

unset($_SESSION);
session_unset();
session_destroy();
session_start();
redirect('login.html');