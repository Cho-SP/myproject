<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>글 쓰기 페이지</title>
  </head>
  <body>
    <?php
    $conn = mysqli_connect("localhost","root","qkrtpgns1234");
    /*
    if($conn){
      echo "connected"."<br />";
    }
    else{
      echo "false"."<br />";
    }
    */
    $db = mysqli_select_db($conn, "bangmyeong");
    /*
    if($db){
      echo "db connected"."<br />";
    }
    else{
      echo "db false"."<br />";
    }
    */
    $pageNum=5;
    $start= $_GET['start'];
    if(!$start){
      $start=0;
    }

    $sql = "SELECT * FROM guestbook ORDER BY id DESC";
    //$result = mysqli_query($sql, $conn);
    $result = $conn->query($sql) or die ($this->_connect->error);
    /*
    if($result){
      echo "result connected"."<br />";
    }
    else{
      echo "result false"."<br />";
    }
    */
    $pageviews = mysqli_num_rows($result);

    $sql = "SELECT * FROM guestbook ORDER BY id DESC LIMIT $start, $pageNum";
    $result = $conn->query($sql);
    $pagew=5;
    ?>
    <br />
    <center>
    <form action="insert.php" method="post">
      <table border=1 width=600>
        <tr>
          <td>이름</td><td><input type="text" name="name"></td>
          <td>비밀번호</td><td><input type="password" name="pass"></td>
        </tr>
        <tr>
          <td  colspan=4>
            <textarea placeholder="내용을 입력하세요" name="content" rows="8" cols="80"></textarea>
          </td>
        </tr>
        <tr>
          <td colspan=4 align=right><input type="submit" value="확인"></td>
        </tr>
      </table>
    </form>
    <br />
    <?php
    //$row=mysql_fetch_array($result);
    while($row=$result->fetch_array()){
      echo "<table width=600 border=1><tr>";
      echo "<td>No. $row[id]</td>";
      echo "<td>$row[name]</td>";
      echo "<td>$row[wdate]</td>";
      //echo "<td><input type='button' value='수정' onclick='location.href=modifycheck.php?id=$row[sid]'/></td>";
    //  echo "<td><input type='button' value='삭제' onclick='location.href=delete.php?id=$row[id]'/></td></tr>";
      echo "<td><a href='modifycheck.php?id=$row[id]'>수정</a></td>";
      echo "<td><a href='delete.php?id=$row[id]'>삭제</a></td></tr>";
      echo "<tr><td colspan=5>$row[content]</td>";
      echo "</tr></table>";
      echo "<br />";
    }

    $pages = $pageviews / $pageNum;
    for($i=0; $i<$pages; $i++){
      $nextPage = $pageNum * $i;
      $n = $i+1;
      echo "<a href=$_SERVER[PHP_SELF]?start=$nextPage>[$n]</a>";
    }
    ?>
  </center>
  </body>
</html>
