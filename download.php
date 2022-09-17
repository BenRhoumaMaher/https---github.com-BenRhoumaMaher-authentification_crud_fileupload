<?php
require('app/app.php');

header("Content-Type: application/vnd.ms-excel");
$filename = 'Users' . '.xls';
header("Content-Disposition:attachment;filename = $filename");

view('download');