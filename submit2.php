<?php
$nameErr = $addrErr =  $emailErr = $ZipErr = 0;  
$name = $email = $address = $zip = "";

//name validation
if (empty ($_POST["Name"])) {  
    $ErrMsg = "Error! You didn't enter the Name."; 
    echo "<font color=black size='6pt'> $ErrMsg<br></font>"; 
    $nameErr = 1;  
} else {  
    $name = $_POST ["Name"];  
    if (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
        $ErrMsg = "Invalid name.";  
        echo "<font color=black size='6pt'> $ErrMsg <br></font>";
        $nameErr = 1;  
    } else {  
        $name = $_POST ["Name"];
    }  
}

//address validation
if (empty ($_POST["Address"])) {  
    $errMsg = "Error! You didn't enter the address."; 
    echo "<font color=black size='6pt'> $ErrMsg<br></font>"; 
    $addrErr = 1;  
} else {  
    $address = $_POST["Address"];  
}

//email validation
if (empty ($_POST["EMail"])) {  
    $errMsg = "Error! You didn't enter your email.";  
    echo "<font color=black size='6pt'> $ErrMsg<br></font>";
    $emailErr = 1;  
} else {  
    $email = $_POST ["EMail"];  
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
    if (!preg_match ($pattern, $email) ){  
        $ErrMsg = "Email is not valid.";  
        echo "<font color=black size='6pt'> $ErrMsg<br></font>";
        $emailErr =1; 
    } else {  
        $email = $_POST ["EMail"];  
    }   
}

//zip validation
if (empty ($_POST["Zip"])) {  
    $errMsg = "Error! You didn't enter your zip."; 
    echo "<font color=black size='6pt'> $ErrMsg<br></font>"; 
    $ZipErr = 1;  
} else {  
    $zip = $_POST ["Zip"];  
    $length = strlen ($zip);  
    
    if ( $length < 5 || $length > 5) {  
        $ErrMsg = "Zip code must have 5 digits."; 
        echo "<font color=black size='6pt'> $ErrMsg<br></font>"; 
        $ZipErr = 1;  
    } else {  
        $zip = $_POST["Zip"];  
    }    
}

 




if($nameErr == 0 && $addrErr == 0  && $emailErr == 0 && $ZipErr == 0 ){
    //connection
    $conn = new mysqli('localhost','localhost','','shop');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("insert into members(name,address,zip,email)values(?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $address, $zip, $email);
        $stmt->execute();
        echo "<table font align=center >
        <tr>
        <td style='border: 1px solid red;'> <font color=green size='16pt'> YOUR DETAILS </font> </td>
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
        </font>
        </table>";
        echo "<table <font align=center >
        <td style='border: 1px solid red;'><font color=green size='8pt' align=center>Welcome to the club !! <br>Thankyou</font>  </td>
        </tr>
        <tr>
        <td> <font color=green size='5pt'>&copyBonsai Breeders Club registered under &copyBonsai Paradise </font></td>
        </tr>
        </font>
        </table>";
        $stmt->close();
        $conn->close();
    }
} 
else {  
    echo "<h3><font color=red size='16pt'> <b>You didn't filled up the form correctly!!!</font></b> </h3>";  
}
	


?>

<html>
	<style type="text/css">
	body{
		background-image: url(images/h2.jpg);
	}
</style>

</html>