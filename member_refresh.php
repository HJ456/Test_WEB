<?php 
        include "./dbConnect.php";
		$query ="select * from members";
        $result = mysqli_query($connect,$sql);
		
        session_start();
        $result = session_destroy();
 
        if($result) {
 ?>
<meta http-equiv="refresh" content="0 url=index.php">
<?php
        }
?>