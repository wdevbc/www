<?php

header("Content-type: text/html; charset=utf-8");
//파일 명이 잘 넘어오나 확인
if(!$_GET['file_name'])

{
echo "<script>alert('이상하게 접근하셨습니다;');";
echo "history.back();</script>";
}

$file_name=$_GET['file_name'];

//DB연결 확인
include "db_info.php";
if(mysqli_connect_errno())
{
echo "DB connect error";
exit;
}

//파일명을 통해 file_name, hash 값을 board DB에서 가져오기
$query="SELECT file_name, hash from board where file_name='$file_name'";
$result = $connect->query($query);
if(!$result)

{
echo "query error";
exit;
}



//열 추출하여 열의 값을 각각의 변수에 저장
$result = $result->fetch_assoc();
$file_name = $result['file_name'];
$hash = $result['hash'];


//xshell에 생성한 경로(파일이 업로드 되어있음)
$dir = "./fileupload/";


//파일이 존재해는 전체 경로
$down = $dir.$hash;
$length = filesize($down);

//파일이 존재하면

if(file_exists($down)){
header("Content-Type:application/octet-stream");
header("Content-Disposition:attachment;filename=$file_name");
header("Content-Transfer-Encoding:binary");
header("Content-Length:".$length);
header("Cache-Control:cache,must-revalidate");
header("Pragma:no-cache");
header("Expires:0");


//파일 존재하면 다운로드 진행 후 읽기

if(is_file($down)){
$fp = fopen($down,"r");
while(!feof($fp)){
$buf = fread($fp,8096);
$read = strlen($buf);

print($buf);
flush();

}

fclose($fp);
}
} else{

?><script>
alert("존재하지 않는 파일입니다.")
</script>

<?php }?>