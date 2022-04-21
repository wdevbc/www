<!DOCTYPE html>
<html>
<head>
    <title>Join</title>
    <?php include "inc/head.html";?>
</head>
<?php
include "db_info.php";
session_start();
$query = "SELECT * FROM board order by number desc";
$result = mysqli_query($connect,$query);
$rows = mysqli_fetch_assoc($result);
if(!isset($_SESSION['id'])){?>
    <script>
    alert('가입 서비스는 관리자에게 문의 후 이용하세요.');
    location.replace("login.php");
    </script>
<?php exit; } ?>
<body>
<div class="loading">
    <div class="loading__image">

    </div>
</div>
    <div class="row">
        <div class="content">
            <div class="form-box form-box--join" data-aos="fade-up">
                <h2 class="form-title">회원가입</h2>
                <form method="post" action="join_action.php">
                    <fieldset>
                        <legend>Join form</legend>
                        <div class="form-group">
                            <label for="id">아이디</label>
                            <input type="text" name="id" class="form-input" placeholder="4자이상 입력하세요" autofocus required autocomplete="none">
                        </div>
                        <div class="form-group">
                            <label for="pwd">비밀번호</label>
                            <input type="password" name="pwd" class="form-input" placeholder="숫자와 영어 8자리 이상 입력하세요" required>
                        </div>
                        <div class="form-group">
                            <label for="email">이메일</label>
                            <input type="email" name="email" class="form-input" placeholder="@를 포함한 이메일주소를 입력하세요" required autocomplete="none">
                        </div>
                        <div class="btn-wrap">
                            <input type="submit" value="회원가입" class="btn btn--submit">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<script>
    AOS.init();
</script>
</body>
</html>