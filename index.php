<?php 

use App\App;

include 'App/Helpers/helpers.php';
include "autoload.php";
include "web.php";

$app = new App();
$app->run();