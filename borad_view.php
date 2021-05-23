<?php 
   
  $no = $_GET['no'];
  $page = $_GET['page'];
  
  include "./dbConnect.php";
  $sql = "select * from borad where no = $no";
  $result = mysqli_query($connect,$sql);
  
  $row = mysqli_fetch_array($result);
  $no = $row['no'];
  $user_id = $row['user_id'];
  $user_name = $row['user_name'];
  $title = $row['title'];
  $memo = $row['memo'];
  $cdate = $row['cdate'];
  $hits = $row['hits'];
  $file_name = $row['file_name'];
  $file_type = $row['file_type'];
  $file_copied = $row['file_copied'];
  
  $memo = str_replace(" ", "$nbsp;", $memo);
  $memo = str_replace("\n", "<br>", $memo);
  
  $new_hits = $hits + 1;
  $sql = "update borad set hits = $new_hits where no =$no";
  mysqli_query($connect,$sql);
  
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<body> 
<header>
    <?php include "header.php";?>
</header>
    <h2> <?=$title?>&nbsp&nbsp<button type = "button" onclick ="location.href='borad_list.php'">목록</button>
<?php 
    if($user_id && $_SESSION['user_id'] == $row['user_id']) {
?>
			<button type = "button" onclick="location.href='borad_update_form.php?no=<?=$no?>&page=<?=$page?>'">수정</button>
			<button type = "button" onclick ="location.href='borad_delete.php?no=<?=$no?>'">삭제</button>
<?php
 			
    }  else {
?>
		    <a href="javascript:alert('로그인 후 이용해 주세요!')"></a>
<?php
	}	
?>  
	</h2>
	<table>
                        <tr>
							<td>작성자</td>
							<td><?=$user_name?></td> 
						</tr>
                        <tr>
							<td>작성일자</td>
							<td><?=$cdate?></td> 
						</tr>						
						<tr>
							<td>내용</td>
							<td><?=$memo?></td>
						</tr>
						<tr>
							<td>첨부파일</td>
							<td>
							<?php
							  if($file_name) {
								  $real_name = $file_copied;
								  $file_path = "./data/".$real_name;
								  $file_size = filesize($file_path);
								  
								  echo "$show_name ($file_size Byte)
								       &nbsp;&nbsp;&nbsp;
								  <a href = 'borad_download.php?no=$no&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";								  
							  }?> </td>
						</tr>
					
	</table><br>
</body>
</html>