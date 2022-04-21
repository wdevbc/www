
<?php
session_start();
include "db_info.php";
$id=$_POST['id'];
$pwd=md5($_POST['pwd']);
$query="SELECT * FROM member where id='$id'";
$querys="SELECT * FROM member where pwd='$pwd'";
$result=$connect->query($query);
$results=$connect->query($querys);
if(mysqli_num_rows($result)==1){
$row=mysqli_fetch_assoc($result);
if($row['pwd']==$pwd){
$_SESSION['id']=$id;

if(isset($_SESSION['id'])){
?> <script>
alert("로그인 되었습니다.");
location.replace("./board.php");
</script>
<?php
}
else{
echo "session fail";
}}}
if(mysqli_num_rows($result)!=1 || mysqli_num_rows($results)!=1){
?>
<script>
alert("아이디 혹은 비밀번호가 틀렸습니다.");
history.back();
</script>
<?php
}
?>