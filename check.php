<?php
	include "./dbConnect.php";
	$user_id = $_GET["user_id"];
	$sql = "select * from members where user_id='$user_id'";
	$result = mysqli_query($connect,$sql);
	$members = mysqli_fetch_array($result);
	if($members==0)
	{
?>
	<div><?php echo $user_id;?>는 사용가능한 아이디입니다.</div>
<?php 
	}else{
?>
	<div style='color:red;'><?php echo $user_id; ?>는 중복된아이디입니다. 다른 아이디를 사용해주세요!</div>
<?php
	}
	
	mysqli_close($connect);
?> 

    <br><input type="button" value="창닫기" onClick="window.close()">