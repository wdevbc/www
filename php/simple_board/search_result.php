<?php include 'include/header.php'?>
<body>
    <h1>게시판</h1>
    <h2>검색 결과</h2>
    <ul>
        <?php
        //simple_board 테이블에서 글 조회
        $user_skey = $_POST['skey'];
        $sql = "SELECT * FROM simple_board WHERE message LIKE '%$user_skey%'";
        $result = mysqli_query($connect, $sql);
        $list = '';
        //print_r($result);
        while ($row = mysqli_fetch_array($result)) {
            $list = $list . "<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
        }
        echo $list;
        mysqli_close($connect);
        ?>
    </ul>
    <p><a href="index.php">메인화면으로 돌아가기</a></p>
</body>
</html>