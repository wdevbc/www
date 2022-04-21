<?php
include "db_info.php";
session_start();
$id=$_SESSION['id'];
$query = "SELECT pwd,email from member where id='".$_SESSION['id']."' ";
$result= mysqli_query($connect,$query);
$rows = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <title>내 정보 수정</title>
    <?php include "inc/head.html";?>
</head>
<body>
<div class="loading">
    <div class="loading__image">

    </div>
</div>
    <div class="row">
        <div class="content">
            <div class="form-box" data-aos="fade-up">
                <h2 class="form-title">회원정보 수정</h2>
                <form method="post" action="change_action.php">
                    <fieldset>
                        <legend>회원정보 수정</legend>
                        <div class="form-group">
                            <label for="id">아이디</label>
                            <input type=text name=id class="form-input" value="<?=$_SESSION['id']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">비밀번호</label>
                            <input type=password name=pwd class="form-input" value="<?=$rows['pwd']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">이메일</label>
                            <input type=email name=email class="form-input" value="<?=$rows['email']?>" required>
                        </div>
                    </fieldset>
                    <div class="btn-wrap">
                        <input type="submit" value="수정하기" class="btn btn--submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
    AOS.init();
</script>
</body>
</html>