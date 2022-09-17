<?php
session_start();
require('app/app.php');
ensureauthentif();




view('index');