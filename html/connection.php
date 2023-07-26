<?php
Define ('DB_USER','root');
Define('DB_PASSWORD','');
Define('DB_HOST','localhost');
Define('DB_NAME','ad_desc');


try{
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    mysqli_set_charset($conn,'utf8');

}

catch(Exception $e){
    print "An exception occured. message ."  . $e->getMessage();
    print "The system is busy please try later";
}
catch(Error $e){
    print "An exception occured. message ."  . $e->getMessage();
    print "The system is busy please try later";

}
?>