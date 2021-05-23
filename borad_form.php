<!doctype html>
<head>
<meta charset="UTF-8">
<title>글쓰기</title>
<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
 	<form method='POST' action='borad_insert.php' enctype='multipart/form-data'>
     <h2>게시판 > 글쓰기 <button type = "button" onclick ="location.href='borad_list.php'">목록보기</button></h2>
	<table>
                        <tr>
							<td>제목</td>
							<td><input type="text" size="35" name="title" placeholder="제목" required></td>
						</tr>
                        <tr>
							<td>작성자</td>
							<td><?=$name?></td>
						</tr>			
						<tr>
							<td>내용</td>
							<td><textarea name="memo" rows="1" cols="55" placeholder="내용을 입력하세요." required></textarea></td>
						</tr>
						<tr>
							<td>파일 업로드</td>
							<td> <input type="file" name="upfile" /></td>
						</tr>
					
	</table><br>
	  <input type="submit" value="저장" />&nbsp<input type="reset" value="취소"/>
	</form>
</body>
</html>