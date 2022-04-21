<?php
include "db_info.php";
$number = $_GET["number"];
$query = "SELECT id from board where number=$number";
$result= mysqli_query($connect,$query);
$rows = mysqli_fetch_assoc($result);
$id=$rows['id'];
session_start();
$URL="./board.php";
if($_SESSION['id'] != $id){
?>
<script>
alert("권한이 없습니다.");
history.back();
</script>
<?php }
else if ($_SESSION['id']==$id){
$query = "DELETE FROM board where number=$number";
$connect->query($query);
?>
<script>
alert("삭제되었습니다.");
location.replace("<?php echo $URL?>");
</script>
<?php
}
?>