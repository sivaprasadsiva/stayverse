<?php include('Crypto.php')?>
<?php

	error_reporting(0);
	
	$workingKey='10451C158807677248912777AA4C889B';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
		if($i==0)   $order_id = $information[1];
		if($i == 26) $page = $information[1];
	}

	if($order_status==="Success")
	{
		echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
		$con = mysqli_connect('localhost','stayvers_user','Rc0a$EB*r9)=','stayvers_db');

	if ($con) {
	    if($page == 1){
	        $sql    = "UPDATE booking SET status = 2  WHERE id =".$order_id;
		mysqli_query($con,$sql);
		header('Location:https://stayverse.in/userpanel/booking');
	    }else if($page == 2){
	        $sql    = "UPDATE plan_booking SET status = 2  WHERE id =".$order_id;
		mysqli_query($con,$sql);
		header('Location:https://stayverse.in/userpanel/plan_booking');
	    }
		
	}else{
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    
    
		
	}
	else if($order_status==="Aborted")
	{
		echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
		if($page == 1){
		header('Location:https://stayverse.in/userpanel/booking');
		}else if($page == 2){
		    header('Location:https://stayverse.in/userpanel/plan_booking');
		}
	
	}
	else if($order_status==="Failure")
	{
		echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
		if($page == 1){
		header('Location:https://stayverse.in/userpanel/booking');
		}else if($page == 2){
		    header('Location:https://stayverse.in/userpanel/plan_booking');
		}
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
		if($page == 1){
		header('Location:https://stayverse.in/userpanel/booking');
		}else if($page == 2){
		    header('Location:https://stayverse.in/userpanel/plan_booking');
		}
	
	}

	echo "<br><br>";

// 	echo "<table cellspacing=4 cellpadding=4>";
// 	for($i = 0; $i < $dataSize; $i++) 
// 	{
// 		$information=explode('=',$decryptValues[$i]);
// 	    	echo '<tr><td>'.$information[0].'</td><td>'.urldecode($information[1]).'</td></tr>';
// 	}

// 	echo "</table><br>";
// 	echo "</center>";
?>
