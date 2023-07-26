
<?php
session_start();
$u_name=$_SESSION['user_name'];
 $u_email=$_SESSION['login'];
 $price=$_SESSION['fare'];
 $con= $_SESSION['contact'];
 $seat=$_SESSION['seat'];
 $start=$_SESSION['start'];
 $des=$_SESSION['des'];
 $t_date=$_SESSION['t_date'];
 $name=$_SESSION['name'];
  require 'connection.php';
  ?>











<?php





   
    
   
    
    
    $p=$price*$seat;
   
    
    
    $sql = "INSERT into transport_booked (bus_name,start,des,no_of_seat,paid,name,contact)
               values ('$name','$start','$des','$seat','paid','$u_name','$con')";


$result = mysqli_query($conn, $sql);
 if(!$result){
        die(mysqli_error($conn));
    }
	else{
        
        $store_id			= "test1631aceb38914d";
$store_passwd		= "test1631aceb38914d@ssl";












$post_data = array();
$post_data['store_id']			= $store_id;
$post_data['store_passwd']		= $store_passwd;

$post_data['tran_id'] 			= "your unique order id".uniqid();
$post_data['currency'] 			= "BDT";
$post_data['total_amount'] 		= $p;

$post_data['success_url'] 		= "http://localhost/project_3200/html/success.php";
$post_data['fail_url']			= "http://localhost/SSLCommerz_customized/fail";
$post_data['cancel_url']		= "http://localhost/SSLCommerz_customized/cancel";

# CUSTOMER INFORMATION
$post_data['cus_name'] 			= $u_name;
$post_data['cus_email']			= $u_email;
$post_data['cus_add1'] 			= "Dhaka";
$post_data['cus_add2'] 			= "";
$post_data['cus_city'] 			= "Dhaka";
$post_data['cus_state'] 		= "Dhaka";
$post_data['cus_postcode'] 		= "1000";
$post_data['cus_country'] 		= "Bangladesh";
$post_data['cus_phone'] 		= '01710101010';
$post_data['cus_fax'] 			= "";

# Additional Information
$post_data["shipping_method"] 	= "No";
$post_data["product_name"] 		= "Computer";
$post_data["product_category"] 	= "Electronic";
$post_data["product_profile"] 	= "general";


# REQUEST SEND TO SSLCOMMERZ
$direct_api_url 				= "https://sandbox.sslcommerz.com/gwprocess/v4/api.php";

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $direct_api_url );
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_POST, 1 );
curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC

$content = curl_exec($handle );
$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle))) {
    curl_close( $handle);
    $sslcommerzResponse = $content;
} else {
    curl_close( $handle);
    echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
    exit;
}

# PARSE THE JSON RESPONSE
$sslcz = json_decode($sslcommerzResponse, true );
?>





<script>window.location = '<?php echo $sslcz['GatewayPageURL']; ?>';</script>

<?php

$tran_id=urlencode("your unique order id");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/merchantTransIDvalidationAPI.php?tran_id=".$tran_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);


$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
if($code == 200 && !( curl_errno($handle)))
{
	# TO CONVERT AS ARRAY
	$result = json_decode($result, true);
	# $status = $result['status'];
	
	echo "<pre>";
	print_r($result);

} else {
	
	echo "Failed to connect with SSLCOMMERZ";
}


 
    }


    
      










       ?>





