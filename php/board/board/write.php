<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>포트폴리오 작성하기</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    session_start();
    ?>
    <div class="row">
        <div class="content">
            <div class="form-box">
                <h2 class="form-title">포트폴리오 작성하기</h2>
                <form method="post" enctype="multipart/form-data" action="write_action.php" onsubmit="return formSubmit(this);">
                    <fieldset>
                        <legend>Write your Portfolio</legend>
                        <div class="form-group">
                            <label for="id">작성자</label>
                            <input type="text" name="id" value="<?php echo $_SESSION['id']?>" class="form-input form-input--writer">
                        </div>
                        <div class="form-group">
                            <label for="title">포트폴리오 제목</label>
                            <input type="text" name="title" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label for="content">간단한 내용 작성</label>
                            <input type="text" name="content" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label for="links">링크</label>
                            <input type="text" name="links" class="form-input" required>
                        </div>
                        <input type="file" name="file" id="file" class="form-file" required></input>
                    </fieldset>
                    <div class="btn-wrap">
                        <input type="submit" value="추가하기" name="save" class="btn btn--submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>