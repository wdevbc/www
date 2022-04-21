<!DOCTYPE html>
<html lang="ko">
<head>
    <title>Portfolio Board</title>
    <?php include "inc/head.html";?>
</head>

<?php
include "db_info.php";
$board_number = $_GET["number"];
session_start();
$query="SELECT title, content, id, links, file_name from board where number =$board_number";
$result = mysqli_query($connect,$query);
$rows = mysqli_fetch_assoc($result);
if(!isset($_SESSION['id'])){?>
    <script>
    alert('회원만 이용가능합니다.');
    location.replace("board.php");
    </script>
<?php exit; } ?>
<body>
<div class="loading">
    <div class="loading__image">

    </div>
</div>
<div class="row">
    <div class="content content--view">
        <div class="view__wrap--header">
            <h2 class="view__title"><?php echo $rows['title']?></h2>
            <span class="view__number">글번호</span><span class="view__db-content"><?php echo $rows['number']?></span><span class="view__username">작성자</span><span class="view__db-content"><?php echo $rows['id']?></span>
        </div>
        <div class="view__wrap--body">
            <div class="view__content">
                <p>내용</p>
                <span><?php echo $rows['content']?></span>
            </div>
            <div class="view__link">
                <p>링크</p>
                <a href="http://<?php echo $rows['links']?>" target="_blank">http://<?php echo $rows['links']?></a>
            </div>
            <div class="view__thumbnail">
                <p class="view__title top-bottom-margin">썸네일</p>
                <img src="./download.php?file_name=<?php echo $rows['file_name']?>">
            </div>
        </div>
        <div class="view__wrap--footer">
            <button onclick="location.href='./board.php'" class="btn btn--write">목록으로</button>
            <button onclick="location.href='./modify.php?number=<?=$board_number?>&id=<?=$_SESSION['id']?>'" class="btn btn--write">수정</button>
            <button onclick="location.href='./delete.php?number=<?=$board_number?>&id=<?=$_SESSION['id']?>'" class="btn btn--write">삭제</button>
        </div>
    ​</div>
</body>
</html>