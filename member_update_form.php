<?php  
	include "./dbConnect.php";	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>회원가입</title>
	
	<script>
      function checkid(){
	   var user_id = document.getElementById("uid").value;
	   if(user_id) {
		url = "check.php?user_id="+user_id;
			window.open(url,"chkid","width=300,height=100");
		}else{
			alert("아이디를 입력하세요");
		 }
	    }
		
	  function checkpw(){
		  var password = document.getElementById("upw").value;
		  if(!password){
			  alert("비밀번호를 입력하세요");
			  return false;
		  } else {
              
		  }
	  }		  
    </script>

</head>
<body>
<?php	  
      $user_id = $_GET['user_id'];
   
	  include "./dbConnect.php";
	  $sql = "select * from members where user_id='$user_id'";
	  $result = mysqli_query($connect,$sql);
	  
	  if($row = mysqli_fetch_array($result)){	  
	   $no = $row['no'];
	   $user_id = $row['user_id'];
	   $name = $row['name'];
	   $pw = $row['pw'];
	   $email = $row['email'];		
	  }	   
	  
	  mysqli_close($connect);
?>
	<form method="POST" action="member_update.php?user_id=<?=$user_id?>" onsubmit="return checkpw();"> 
		<h1>회원정보수정</h1>
					<table>
                        <tr>
							<td>아이디</td>
							<td><input type="text" size="35" name="user_id" id="uid" value="<?=$user_id?>" required>
								<input type="button" value="중복검사" onclick="checkid();">
							</td>
						</tr>
						<tr>
							<td>비밀번호</td>
							<td><input type="password" id="upw" size="35" name="pw" ></td>
						</tr>
						<tr>
							<td>이름</td>
							<td><input type="text" size="35" name="name" value="<?=$name?>"></td>
						</tr>
						<tr>
							<td>이메일</td>
							<td><input type="text" size="35" name="email" value="<?=$email?>"></td>
						</tr>
					</table><br>

				<input type="submit" value="수정" />&nbsp<button type = "button" onclick ="location.href='member_delete.php?user_id=<?=$user_id?>'">회원탈퇴</button>&nbsp<button type = "button" onclick ="location.href='index.php'">메인화면</button>
				
	</form>
</body>
</html>