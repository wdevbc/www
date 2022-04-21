<?php include 'include/header.php'?>
<?php
//simple_board 테이블에서 글 조회
$view_num = $_GET['number'];
$sql = "SELECT * FROM simple_board WHERE number = $view_num";
$result = mysqli_query($connect, $sql);
?>
<body>
    <h1>수정하기</h1>
    <?php
    if ($row = mysqli_fetch_array($result)) {
    ?>
        <form action="insert_update.php" method="post">
            <input type="hidden" name="number" value="<?= $view_num ?>">
            <p>
                <label for="name">이름:</label>
                <input type="text" id="name" name="name" value="<?= $row['name'] ?>">
            </p>
            <p>
                <label for="message">메시지:</label>
                <textarea name="message" id="message" cols="30" rows="10"><?= $row['message'] ?></textarea>
            </p>
            <input type="submit" value="글쓰기">
        </form>
    <?php }
    mysqli_close($connect);
    ?>
</body>
</html>