<?php
    $user_id = $_GET['user_id'];

    include "./dbConnect.php"; 
    $sql = "delete from members where user_id = '$user_id'";
    mysqli_query($connect, $sql);	
	mysqli_close($connect);

?>

<script type="text/javascript">alert("회원 탈퇴되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=member_refresh.php">
