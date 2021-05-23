<?php 
   session_start();
   if(isset($_SESSION['user_id'])) $user_id = $_SESSION['user_id'];
   else $user_id = "";
   if(isset($_SESSION['name'])) $name = $_SESSION['name'];
   else $name = "";
?>

<?php
 if(!$user_id) {
?>	 
	 <button type = "button" onclick = "location.href='login_form.php'">로그인</button>
<?php 
 } else {
	 $logged = $name."(" .$user_id.")님 안녕하세요! ";
?>
     <?=$logged?>
     <button type = "button" onclick = "location.href='logout.php?'">로그아웃</button>
	 <button type = "button" onclick = "location.href='member_update_form.php?user_id=<?=$user_id?>'">회원정보수정</button>
<?php
 }
?>