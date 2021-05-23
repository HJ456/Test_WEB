<?php
	include "./dbConnect.php";

	$user_id = $_POST['user_id'];
	$pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
	$name = $_POST['name'];
	$email = $_POST['email'].'@'.$_POST['emadress'];

    $sql = "INSERT INTO members(user_id, pw, name, email) VALUES('$user_id', '$pw','$name', '$email');";
	
	mysqli_query($connect,$sql);
    mysqli_close;

?>

 <meta charset="utf-8" />
 <script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
 <meta http-equiv="refresh" content="0 url=index.php">