<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

if(isset($_POST['sendotp']))
{
require('textlocal.class.php');
include('credential.php');
$m=$_POST['mobile'];
$textlocal = new Textlocal('memonsalman865@gmail.com','Memon@123456');

$numbers = array($m);
$sender = 'TXTLCL';
$otp=mt_rand(10000,99999);
$message = "HEllO". $_POST['name']." your OTP is " .$otp;

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    setcookie('otp',$otp);
    echo "otp succesful";
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
}   
   if(isset($_POST['verifiy']))
    {
	   $otp=$_POST['otp'];
	if($_COOKIE['otp'] == $otp)
	{
		echo "Thank you ";
	} 
	else
	{
		echo "Please enter correct OTP";
	}

}
?>

<form method="post">
	Name<input type="text" name="name">
	number<input type="text" name="mobile">
	<button type="submit" name="sendotp">Send OTP</button>
	OTP<input type="text" name="otp">
	<button type="submit" name="verifiy">Varify</button>

</form>
</body>
</html>