<?php
    require_once '../vendor/autoload.php';
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

    use App\core\Controller;


    if (isset($_REQUEST) && !empty($_REQUEST)) {
      
       $start = new Controller($_REQUEST);
       echo $start->run();

    }