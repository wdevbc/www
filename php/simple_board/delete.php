<?php include 'include/header.php'?>
<body>
    <h1>게시판</h1>
    <h2>삭제 결과</h2>
    <ul>
        <?php
        //simple_board 테이블에서 글 조회
        $user_delnum = $_POST['delnum'];
        $sqlDEL = "DELETE FROM simple_board WHERE number = $user_delnum";
        mysqli_query($connect, $sqlDEL);
        $sql = "SELECT * FROM simple_board";
        $result = mysqli_query($connect, $sql);
        $list = '';
        while ($row = mysqli_fetch_array($result)) {
            $list = $list . "<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
        }
        echo $list;
        mysqli_close($connect);
        ?>
    </ul>
    <p>
        <?php
        echo $user_delnum . '번째 데이터가 삭제되었습니다.';
        ?>
    </p>
    <p><a href="index.php">메인화면으로 돌아가기</a></p>
</body>
</html>