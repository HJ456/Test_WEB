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
	   if(user_id)
	   {
		url = "login_check.php?user_id="+user_id;
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
	<form method="POST" action="member_insert.php" onsubmit="return checkpw();">
		<h1>회원가입</h1>
					<table>
                        <tr>
							<td>아이디</td>
							<td><input type="text" size="35" name="user_id" id="uid" placeholder="아이디" required>
								<input type="button" value="중복검사" onclick="checkid();">
							</td>
						</tr>
						<tr>
							<td>비밀번호</td>
							<td><input type="password" size="35" name="pw" id="upw" placeholder="비밀번호"></td>
						</tr>
						<tr>
							<td>이름</td>
							<td><input type="text" size="35" name="name" placeholder="이름"></td>
						</tr>
						<tr>
							<td>이메일</td>
							<td><input type="text" name="email">@<select name="emadress"><option value="naver.com">naver.com</option><option value="nate.com">nate.com</option>
							<option value="hanmail.com">hanmail.com</option><option value="gmail.com">gmail.com</option></select></td>
						</tr>
					</table><br>

				<input type="submit" value="회원가입" />&nbsp<input type="reset" value="초기화" />&nbsp<button type = "button" onclick ="location.href='index.php'">메인화면</button>
				
	</form>
</body>
</html>