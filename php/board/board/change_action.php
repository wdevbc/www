<meta charset='utf-8'>
<?php
include "db_info.php";
$id=$_POST['id'];
$pwd=md5($_POST['pwd']);
$email=$_POST['email'];
$URL='board.php';
session_start();
$query="UPDATE member set id='$id', pwd='$pwd', email='$email' where id='".$_SESSION['id']."' ";
$result = $connect -> query($query);
if($result){
?>

<script>
alert("수정되었습니다.");
location.replace("<?php echo $URL?>");
</script>

<?php }
else {
echo "fail";
}
$result=session_destroy();
$URL='login.php';
mysqli_close($connect);
?>