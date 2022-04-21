<?php include 'include/header.php'?>
<?php
//simple_board 테이블에서 글 조회
$view_num = $_GET['number'];
$sql = "SELECT * FROM simple_board WHERE number = $view_num";
$result = mysqli_query($connect, $sql);
?>

<body>
    <h1>게시판</h1>
    <h2>글 내용</h2>
    <?php
    if ($row = mysqli_fetch_array($result)) {
    ?>
        <h3>글번호: <?= $row['number'] ?> / 글쓴이: <?= $row['name'] ?></h3>
        <div>
            <?= $row['message'] ?>
        </div>
    <?php }
    mysqli_close($connect);
    ?>
    <p><a href="index.php">메인화면으로 돌아가기</a></p>
    <p><a href="update.php?number=<?= $row['number'] ?>">수정하기</a></p>
</body>
</html>