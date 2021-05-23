<?php    
   session_start();
   if(isset($_SESSION['user_id'])) $user_id = $_SESSION['user_id'];
   else $user_id = "";
   if(isset($_SESSION['name'])) $name = $_SESSION['name'];
   else $name = "";
  
    if ( !$user_id )
    {
        echo("
                    <script>
                    alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
                    history.go(-1)
                    </script>
        ");
                exit;
    }

    $title = $_POST["title"];
    $memo = $_POST["memo"];
	$user_name = $name;

	$cdate = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	$upload_dir = './data/';

	$upfile_name	 = $_FILES["upfile"]["name"];
	$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
	$upfile_type     = $_FILES["upfile"]["type"];
	$upfile_size     = $_FILES["upfile"]["size"];
	$upfile_error    = $_FILES["upfile"]["error"];

	if ($upfile_name && !$upfile_error)
	{
		$file = explode(".", $upfile_name);
		$file_name = $file[0];
		$file_ext  = $file[1];

		$new_file_name = date("Y_m_d_H_i_s");
		$new_file_name = $new_file_name;
		$copied_file_name = $new_file_name.".".$file_ext;      
		$uploaded_file = $upload_dir.$copied_file_name;

		if( $upfile_size  > 1000000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!');
				history.go(-1)
				</script>
				");
				exit;
		}

		if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )
		{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
		}
	}
	else 
	{
		$upfile_name      = "";
		$upfile_type      = "";
		$copied_file_name = "";
	}

    include "./dbConnect.php";
	$sql = "insert into board (user_name, user_id, title, memo, cdate, hits, file_name, file_type, file_copied) ";
	$sql .= "values('$user_name', '$user_id', '$title', '$memo', '$cdate', 0, ";
	$sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
	
	mysqli_query($connect,$sql);
    mysqli_close;

?>

 <meta charset="utf-8" />
 <script type="text/javascript">alert('글이 작성되었습니다.');</script>
 <meta http-equiv="refresh" content="0 url=board_list.php">