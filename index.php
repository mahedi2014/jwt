<?php

	require_once 'vendor/autoload.php';
	use \Firebase\JWT\JWT;
	
if($_POST){ 
	$key = $_POST['key'];
	
	$token = array(
		"userid"=> $_POST['userid'],
		"email"=> $_POST['email']
	);
	 
	$encodeToken = $jwt = JWT::encode($token, $key); //encode data with key
	
	$decoded = JWT::decode($jwt, $key, array('HS256')); //decode token data with key
	
	//print_r($decoded);
	 
	$decoded_array = (array) $decoded;

	 
	JWT::$leeway = 60*60*24*30*12; // $leeway in seconds
	$decoded = JWT::decode($jwt, $key, array('HS256'));
 }
?>
<!--
HEADER:ALGORITHM & TOKEN TYPE

{
  "alg": "HS256",
  "typ": "JWT"
}

PAYLOAD:DATA

{
  "userid": "1",
  "email": "mahedi2014@gmail.com"
} 
-->

<center>


<form action="" method="post" style="padding-top:30px">
<h4 style="color:green">JWT Encode and Decode Tools</h4>
<table>
<tr><td>Key</td><td><input type="text" name="key" placeholder="key"></td></tr>
<tr><td>User ID</td><td><input type="text" name="userid" placeholder="userid"></td></tr>
<tr><td>Email</td><td><input type="email" name="email" placeholder="email"></td></tr> 
<tr><td></td><td><input type="submit" value="Submit"></td></tr>
</table>
</form>

<?php
if($_POST){ 
?>
<h5 style="padding-top:20px; color:red">Algorithm: HS256  Type: JWT</h5>
<table>
<tr>
<td>
<p>Input</p>
<textarea rows="34" cols="50">
<?php var_dump($_POST); ?>
</textarea>
</td>

<td>
<p>Output Token</p>
<textarea rows="15" cols="50">
<?php echo $encodeToken;  ?>
</textarea>

<p>Output Decode</p>
<textarea rows="15" cols="50">
<?php var_dump($decoded_array);  ?>
</textarea>
</tr>

</table>
<?php } ?>
</center>

