<?php
include "db_info.php";
$board_number = $_GET["board_number"];
$number=$_GET["number"];
$query = "SELECT * from comment where board_number='".$board_number."' AND number=$number";
$result=mysqli_query($connect, $query);
$rows=mysqli_fetch_assoc($result);
$content=$rows['content'];
$id=$rows['id'];
session_start();
if($_SESSION['id'] != $id){
?> 

<script>
alert("권한이 없습니다.");
history.back();
</script>

<?php }
else if ($_SESSION['id']==$id){
?>

<form method="post" action="cmt_modify_action.php">
    <h2>댓글 수정</h2>
    <table>
        <tr>
            <td>작성자</td>
            <Td><?php echo $rows['id']?></td>
        </tr>
        <tr>
            <td>댓글</td>
            <Td><input type=text name=content size=60 value="<?=$content?>"></td>
        </tr>
    </table>
    <input type="hidden" name="board_number" value="<?=$board_number?>">
    <input type="hidden" name="number" value="<?=$number?>">
    <input type="submit" value="수정완료">
</form>

<?php } ?>

<button onclick="location.href='./delcmt.php?board_number=<?=$board_number?>&number=<?=$number?>'">삭제</button>