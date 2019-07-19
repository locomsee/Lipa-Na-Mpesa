<?php
	//include_once('db_connection.php');
    include_once('./MpesaLib.php');
		  $error=false;
    if (isset($_POST['phoneNumber']) && isset($_POST['amount']) )
    {       //sql injection protection
           
           $phoneNumber=$_POST['phoneNumber'];
           $phoneNumber=strip_tags($phoneNumber);
           $phoneNumber=htmlspecialchars($phoneNumber);
      	   $amount=$_POST['amount'];
           $amount=strip_tags($amount);
           $amount=htmlspecialchars($amount);
          // $order="INSERT INTO booking_details(phoneNumber,amount,amount) VALUES('$phoneNumber','$amount','$amount')";
           //       if($conn->query($order))
             //     {
            	//            $successMg='Order Successful"</br>"<a href="pay1.php">Click to Pay</a>';   
               //   }
               //  else
                 // {
            	     //      $conn->close();
                  //}
          $MpesaLib = new Mpesa();
          $AccountReference = "KENS TRANSPORT";
          $TransactionDesc = "PAY Fare from Nairobi to Mombasa";
          $phoneNumber =$_POST['phoneNumber'];
          $result = $MpesaLib::STKPushSimulation($amount, $phoneNumber, $AccountReference, $TransactionDesc);
          if ($result) {
            
          }
    }else{

      echo "error";
    }
?>