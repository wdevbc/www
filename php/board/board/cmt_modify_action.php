<?php
include "db_info.php";
$board_number=$_POST['board_number'];
$number=htmlspecialchars($_POST['number']);
$content=htmlspecialchars($_POST['content']);
$query="UPDATE comment set content='$content' where board_number='".$board_number."' AND number=$number";
$result = mysqli_query($connect, $query);
echo $id;
if($result){
?>

<script>
alert("댓글이 수정되었습니다.");
location.replace("board.php");
</script>

<?php }
else {
echo "fail";
}
?>