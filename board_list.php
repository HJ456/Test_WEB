<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
  <h1>게시판 <?php 
    if($user_id) {
?>
					<button onclick="location.href='board_form.php'">글쓰기</button>
<?php
	} else {
?>
					<a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
<?php
	}
?>
                    <button type = "button" onclick ="location.href='index.php'">메인화면</button> </h1>
    <table class="board_list">
      <thead align = center>
          <tr>
               <th width="70">번호</th>
               <th width="500">제목</th>
			   <th width="100">작성자</th>
			   <th width="100">파일</th>
               <th width="200">작성일</th>
			   <th width="100">조회수</th>
            </tr>
        </thead>
        <tbody>
		<?php
		 if(isset($_GET['page']))
		  $page = $_GET['page'];
		 else 
          $page = 1;
		  
		  include "./dbConnect.php";
          $sql = "select * from board order by no desc"; 
		  $result = mysqli_query($connect, $sql);
		  $total = mysqli_num_rows($result);
		  
		  while ($row = mysqli_fetch_array($result)){
              echo '<tr><td width="70">' . $row[ 'no' ] . 
			  '</td><td width="500">'. "<a href='./board_view.php?no=".$row['no']."'>". $row['title']." </a>" . 
			  '</td><td width="100">' . $row[ 'user_name' ] . 
			  '</td><td width="100">' . $row[ 'file_image' ] . 
			  '</td><td width="100">'. $row[ 'cdate' ] .
			  '</td><td width="100">'. $row[ 'hits' ] . '</td></tr>';			   
		    }	
		  
		  $scale = 10;
		  
		  if($total % $scale == 0)
		   $total_page = floor($total/$scale);
		  else 
           $total_page = floor($total/$scale) + 1;

           $start = ($page -1) * $scale;
		   $number = $total - $start;

          for( $i = $start; $i<$start+$scale && $i<$total; $i++){
			mysqli_data_seek($result,$i);
			
			if($row['file_name'])
			 $file_name = "<img src = './file.png'>";
			else 
             $file_image = "";	
			
	  
        ?>
        </tbody>
	 </table>
        <?php 	 
           $number--;		
	    }
	       mysqli_close($connect);
		?>
<footer>	
<?php
	if ($total_page>=2 && $page >= 2)	
	{
		$new_page = $page-1;
		echo "<a href='board_list.php?page=$new_page'>◀ 이전</a>";
?>
<?php
	}		
	else 
		echo "&nbsp;";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
            echo "<b> 현재 페이지 : $i </b>";
		}
		else
		{
			echo "<a href='board_list.php?page=$i'> $i </a>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)		
   	{
		$new_page = $page+1;
        echo "<a href='board_list.php?page=$new_page'> 다음 ▶ </a>";		
?> 

<?php
	}
	else 
		echo "&nbsp;";
?>
</footer>
</body>
</html>