<?php
include "db_info.php";
$id=$_POST['id'];
$content=$_POST['content'];
$board_number=$_POST['board_number'];
$number=$_POST['number'];
$query= "INSERT into comment(number,board_number,id,content) values(null,'$board_number','$id', '$content')";
$result=$connect->query($query);
if($result){
?> 

<script>
alert("<?php echo '댓글이 작성되었습니다.' ?>");
history.back();
</script>

<?php
}else{
echo "FAIL";
}
mysqli_close($connect);
?>