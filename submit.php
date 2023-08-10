<?php

$name1=$_POST['Name'];
$address=$_POST['Address'];
$zip=$_POST['Zip'];
$email1=$_POST['EMail'];
$plant=$_POST['plant'];
$qty=$_POST['qty'];
$paymethod=$_POST['paymethod'];

$name=filter_var($name1, FILTER_SANITIZE_STRING);
$email=filter_var($email1, FILTER_SANITIZE_EMAIL);

//connection
$conn = new mysqli('localhost','localhost','','shop');
if($conn->connect_error){
	die('connection failed : '.$conn->connect_error);
}
else
{
	$stmt = $conn->prepare("insert into orders(name,address,zip,email, plant, quantity, paymethod)values(?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssissis", $name, $address, $zip, $email, $plant,$qty, $paymethod);
	$stmt->execute();
    echo "<table font align=center >
    <tr>
    <td style='border: 1px solid red;'> <font color=green size='16pt'> YOUR ORDER </font> </td>
    </tr>
    <tr>
    <td><font size='5pt'> Name : $name </font></td>
    </tr>
    <tr>
    <td><font size='5pt'> Delevery address : $address </font></td>
    </tr>
    <tr>
    <td><font size='5pt'> Zip code : $zip </font></td>
    </tr>
    <tr>
    <td><font size='5pt'> Your Email : $email </font></td>
    </tr>
    <tr>
    <td><font size='5pt'> your order  : $qty plants of $plant </font></td>
    </tr>
    <tr>
    <td><font size='5pt'> payment method : $paymethod </font></td>
    </tr>
    <tr><td> </td></tr>
    </font>
    </table>";
    $status;
    if($paymethod == "Pay now"){
        $status = "Please follow the email we sent to complete the payment";
    }
    else{
        $status = "Keep the amount ready during the delevery";
    }
    echo "<table <font align=center >
    <tr>
    <td><font size='5pt'>$status</font></td>
    </tr>
    <tr>
    <td style='border: 1px solid red;'><font color=green size='8pt' align=center>We are greatful for your purchase !! <br>Thankyou</font>  </td>
    </tr>
    <tr>
    <td> <font color=green size='5pt'>&copyBonsai Paradise </font></td>
    </tr>
    </font>
    </table>";

 
  
	$stmt->close();
	$conn->close();
}

?>

<html>
	<style type="text/css">
	body{
		background-image: url(images/h2.jpg);
	}
</style>

</html>