<?php

require "request/library/Requests.php";

Requests::register_autoloader();
require "culqi/lib/culqi.php";

$SECRET_KEY = "sk_test_43fed75807cf7948";

$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

$charge = $culqi->Charges->create(
    array(
        "amount" => $_POST['precio'],
        "currency_code" => "PEN",
        "email" => $_POST['email'],
        "source_id" => $_POST['token']
      )
   );
   return $culqi->Charges->getList(array("country_code" => "PE"));

//$server = 'localhost';
//$login='root';
//$pass='';
//$db='finalapi';

//$spojeni=mysqli_connect($server,$login,$pass,$db) or die ('nelze se pripojit');

//$sql = 'insert into '
exit;