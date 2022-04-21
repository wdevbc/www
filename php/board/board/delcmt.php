<?php
include "db_info.php";
$number=$_GET["number"];
$board_number=$_GET["board_number"];
$query="DELETE FROM comment where number=$number";
$connect -> query($query);
?>

<script>
alert("삭제되었습니다.");
location.replace("board.php");
</script>

​