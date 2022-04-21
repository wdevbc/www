<?php
include "db_info.php";
$id=$_POST['id'];
$pwd=md5($_POST['pwd']);
$email=$_POST['email'];
$sql = "SELECT * FROM member WHERE id = '{$id}'";
$res = $connect->query($sql);
if($res->num_rows >= 1){
?>
<script>
    alert('이미 존재하는 아이디가 있습니다.');
    location.replace("join.php");
</script>
<?php
exit;
}else{ 
$query="INSERT into member (id,pwd,email) values('$id','$pwd','$email') ";
$result=$connect -> query($query);
}

if($result){
?>
<script>
    alert("가입되었습니다.");
    location.replace("login.php");
</script>
<?php }
else{
?>
<script>
alert("fail");
</script>
<?php }
mysqli_close($connect);
?>