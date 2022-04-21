<?php include 'include/header.php'?>
<body>
    <?php
    //입력값 받아오기
    $number = $_POST['number'];
    $user_name = $_POST['name'];
    $user_msg = $_POST['message'];
    //테이블에 데이터 입력
    $sql = "UPDATE simple_board SET name = '$user_name', message = '$user_msg' WHERE number = '$number'";
    //조회
    $result = mysqli_query($connect, $sql);
    if ($result === false) {
        echo '수정하지 못했습니다';
        error_log(mysqli_error($connect)); //에러 로그 기록
    } else {
        echo '수정 성공';
    }
    mysqli_close($connect);
    print "<hr/><a href='index.php'>메인화면으로 이동하기</a>";
    ?>
</body>
</html>