<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
$conn = mysqli_connect("localhost", "root", "qkrtpgns1234");

/*
if($conn){
  echo "connected"."<br />";
}
else{
  echo "false"."<br />";
}
*/

$db = mysqli_select_db($conn, "bangmyeong");
//mysql_query("set names euckr");

/*
if($db){
  echo "db connected"."<br />";
}
else{
  echo "db false"."<br />";
}
*/

$sql = "INSERT INTO guestbook (name, pass, content) VALUES('$_POST[name]', '$_POST[pass]', '$_POST[content]')";
//mysqli_query($sql, $conn);
$conn->query($sql) or die ($this->_connect->error);
//$result=mysqli_query($conn, "INSERT INTO guestbook (name, pass, content) VALUES('test', '1234567', 'asdfasdf')");

 ?>
<script>
alert("글이 등록되었습니다.");
location.href="list.php";

</script>
</body>
</html>
