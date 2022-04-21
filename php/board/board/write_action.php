<html>
<meta charset="utf-8">

<?php
include "db_info.php";
$id=htmlspecialchars($_POST['id']);
$title=htmlspecialchars($_POST['title']);
$file=$_FILES['file'];
$file_name=$_FILES['file']['name'];
$ext=substr($file['name'], strrpos($file['name'],'.') + 1);
$path=md5($file_name).'.'. $ext;
$hash=$path;
$content=$_POST['content'];
$links=htmlspecialchars($_POST['links']);
$dir="./fileupload/";
$upfile=$dir.$hash;
if(is_uploaded_file($_FILES['file']['tmp_name']))
{
    if(!move_uploaded_file($_FILES['file']['tmp_name'], $upfile))
    {
        echo "upload error";
        exit;
    }
}

$query="INSERT INTO board (number, title, content, id, file_name, hash, links) VALUES(null,'$title','$content','$id','$file_name', '$path', '$links')";
$result=mysqli_query($connect, $query);
if(!$result){
    echo "DB upload error";
    exit;
}
mysqli_close($connect);?>
<script>
alert("작성이 완료되었습니다.");
</script>
<?php
echo("<script>location.href='board.php';</script>");
?>

</html>