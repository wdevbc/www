<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <?php include "inc/head.html";?>
</head>
<body>
<div class="loading">
    <div class="loading__image">

    </div>
</div>
    <div class="row">
        <div class="content">
            <div class="form-box form-box--login" data-aos="fade-up">
                <h2 class="form-title">로그인</h2>
                <form method="post" action="login_action.php">
                        <legend>login form</legend>
                        <div class="form-group">
                            <label for="id">아이디</label>
                            <input type="text" name="id" class="form-input" placeholder="아이디를 입력해주세요">
                        </div>
                        <div class="form-group">
                            <label for="pwd">비밀번호</label>
                            <input type="password" name="pwd" class="form-input" placeholder="비밀번호를 입력해주세요">
                        </div>
                    <div class="btn-wrap">
                        <input type="submit" value="로그인" class="btn btn--submit">
                    </div>
                </form>
                <button id="join" onclick="location.href='./join.php'" class="link link--join">회원가입 하러가기</button>
            </div>

        </div>
    </div>
<script>
    AOS.init();
</script>
</body>
</html>