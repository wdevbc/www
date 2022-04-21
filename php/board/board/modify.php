<?php
include "db_info.php";
$number = $_GET["number"];
$query = "SELECT title, number, content, id, file_name, hash, links from board where number=$number";
$result= mysqli_query($connect,$query);
$rows = mysqli_fetch_assoc($result);
$id=$rows['id'];
$title=$rows['title'];
$hash=$rows['hash'];
$content=$rows['content'];
$links=$rows['links'];

if($number == null) {
    header("Location: board.php");
}

session_start();
$URL="./board.php"; 

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>포트폴리오 수정하기</title>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
if($_SESSION['id'] != $id){
?> 

<script>
alert("권한이 없습니다.");
history.back();
</script>

<?php }
else if($_SESSION['id']==$id){
?>
    <div class="row">
        <div class="content">
            <div class="form-box">
                <h2 class="form-title">포트폴리오 수정하기</h2>
                <form method="post" enctype="multipart/form-data" action="modify_action.php">
                    <fieldset>
                        <legend>Modify your Portfolio</legend>
                        <div class="form-group">
                            <label for="id">작성자</label>
                            <input type="text" name="id" value="<?=$rows['id']?>" class="form-input form-input--writer" disabled>
                        </div>
                        <div class="form-group">
                            <label for="title">제목</label>
                            <input type="text" name="title" class="form-input" value="<?=$title?>">
                        </div>
                        <div class="form-group">
                            <label for="content">내용</label>
                            <input type="text" name="content" class="form-input" value="<?=$content?>">
                        </div>
                        <div class="form-group">
                            <label for="links">링크</label>
                            <input type="text" name="links" class="form-input" value="<?=$links?>" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="old-hash" value="<?=$hash?>">
                            <input type="file" name="file" id="file" class="form-file"></input>
                        </div>
                        <input type="hidden" name="number" value="<?=$number?>">
                        <div class="btn-wrap">
                            <input type="submit" value="작성" class="btn btn--submit">
                        </div>
                    </fieldset>
                </form>

<?php } else{ ?>

<script>
    alert("권한이 없습니다.");
    location.replace("<?php echo $URL?>");
</script>

<?php }?>          
            </div>
        </div>
    </div>
</body>
</html>