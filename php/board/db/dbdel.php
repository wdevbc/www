<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="refresh" content="2;url=dbadmin.php">
<?php
    include_once 'dbinfo.php';
    $conn = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['name']);
    if(!$conn)
    {
        die('연결할 수 없습니다 : ' . mysqli_error($conn));
    }
    mysqli_query($conn, 'set names utf8');
    // board 테이블
    $sql = "DROP TABLE board";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        die('DROP TABLE 실패 : ' . mysqli_error($conn));
    }
    if($result)
    {
        echo nl2br("\n");
        echo "board 테이블 제거 완료\n";
    }
    // member 테이블
    $sql = "DROP TABLE member";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        die('DROP TABLE 실패 : ' . mysqli_error($conn));
    }
    if($result)
    {
        echo nl2br("\n");
        echo "member 테이블 제거 완료\n";
    }
    // member 테이블
    $sql = "DROP TABLE comment";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        die('DROP TABLE 실패 : ' . mysqli_error($conn));
    }
    if($result)
    {
        echo nl2br("\n");
        echo "comment 테이블 제거 완료\n";
    }
    mysqli_close($conn);
?>

<h3>완료중..</h3>