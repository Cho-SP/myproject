<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $conn=mysqli_connect("localhost", "root", "qkrtpgns1234");
    $db=mysqli_select_db($conn, "bangmyeong");
    echo "$_POST[modicont]";
    echo "$_GET[id]";
    $sql="UPDATE guestbook SET content='$_POST[modicont]', wdate=now() WHERE id='$_GET[id]'";
    $result=$conn->query($sql);
     ?>
     <script>
     alert('수정이 완료되었습니다');
     location.href="list.php"
     </script>
  </body>
</html>
