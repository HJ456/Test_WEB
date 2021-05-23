<meta charset="utf-8" />
<?php	
	include "./dbConnect.php";
	
	$user_id = $_POST['user_id'];
	$pw = $_POST['pw'];
	
	$sql = "select * from members where user_id = '$user_id' ";
	$result = mysqli_query($connect, $sql);
	
	$num_match = mysqli_num_rows($result);
	
	if(!$num_match) {
		echo( "
		<script>
		 window.alert('등록되지 않은 아이디입니다.')
		 history.go(-1)
		</script>
        ");		
	} else {
		$row = mysqli_fetch_array($result);
		$hash_pw = $row['pw'];
		
		mysqli_close($connect);
		
		if(password_verify($pw,$hash_pw)) {
		 session_start();
		 $_SESSION['user_id'] = $row['user_id'];
		 $_SESSION['name'] = $row['name'];
		
		 echo("
		  <script>
		   location.href = 'index.php' ; 
		  </script>
		 "); 			
		} else {
			echo("
			 <script> 
			  window.alert('비밀번호가 틀립니다.')
			  history.go(-1)
			 </script>
            ");
           exit;				

	    }
	}
	 
?>