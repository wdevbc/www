<?php
    // 아이디와 비밀번호 전달받기
$id = $_POST["id"];
$pass = $_POST["pass"];

$con = mysqli_connect("localhost", "아이디", "비밀번호", "테이블");
$sql = "select * from members where id='$id'";
$result = mysqli_query($con, $sql);

// 저장된 레코드(id)의 수 세기
$num_match = mysqli_num_rows($result);

// 저장된 레코드(id)가 없다면
if(!$num_match) 
{
    echo("
        <script>
            window.alert('등록되지 않은 아이디입니다!')
            history.go(-1)
        </script>
        ");
    }
    else
    {
        // DB에서 비밀번호 받아오기
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pass"];

        mysqli_close($con);

        // 비밀번호가 틀리다면
        if($pass != $db_pass)
        {

        echo("
            <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
            </script>
        ");
        exit; 
        }
        else
        {
            // 세션 변수를 생성한다.
            session_start();
            $_SESSION["userid"] = $row["id"];
            $_SESSION["username"] = $row["name"];
            $_SESSION["userlevel"] = $row["level"];
            $_SESSION["userpoint"] = $row["point"];

            echo("
            <script>
                window.alert('로그인 되었습니다!')
                location.href = 'login.html';
            </script>
            ");
        }
    }        
?>


