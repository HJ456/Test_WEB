<?php 					
      $user_id = $_GET['user_id'];
	  
	  $name = $_POST['name'];
	  $user_id = $_POST['user_id'];
	  $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
	  $email = $_POST['email'];
	  
	  include "./dbConnect.php";
	  $sql = "update members set user_id = '$user_id', name = '$name', pw= '$pw', email = '$email' where user_id = '$user_id' ";
	  mysqli_query($connect,$sql);
	  mysqli_close($connect);
	 
	 
?>	  

 <meta charset="utf-8" />
 <script type="text/javascript">alert('회원정보가 수정되었습니다. 재로그인 해주세요.');</script>
 <meta http-equiv="refresh" content="0 url=member_refresh.php">