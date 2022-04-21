<meta charset='utf-8'>
<?php
session_start();
$URL="./board.php";
$result = session_destroy();
if($result){
?>
<script>
alert("로그아웃 되었습니다.");
location.replace("<?php echo $URL?>");
</script>
<?php } ?>