<?php
include "db_info.php";
$number=$_POST['number'];
$title=htmlspecialchars($_POST['title']);
$content=$_POST['content'];
$links=htmlspecialchars($_POST['links']);
$old_hash=$_POST['old-hash'];
$file=$_FILES['file'];
$file_name=$_FILES['file']['name'];
$ext=substr($file['name'], strrpos($file['name'],'.') + 1);
$path=md5($file_name).'.'. $ext;
$hash=$path;
$dir="./fileupload/";
$old_file=$dir.$old_hash;
$upfile=$dir.$hash;

// 이전 썸네일 지움
unlink($old_file);

if(is_uploaded_file($_FILES['file']['tmp_name']))
{
    if(!move_uploaded_file($_FILES['file']['tmp_name'], $upfile))
    {
        echo "upload error";
        exit;
    }
}
// 

$query="UPDATE board set title='$title', content='$content', file_name='$file_name', hash='$hash', links='$links' where number=$number";

$result = $connect -> query($query);
if($result){
?>

<script>
alert("수정되었습니다.");
location.replace("view.php?number=<?=$number?>");
</script>

<?php }
else {
echo "fail";
}
?>