<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
include_once 'connect.php';

$sql ="
CREATE TABLE simple_memo (
no int not null auto_increment,
memo varchar(50) NOT NULL,
date text NOT NULL,
ip varchar(15) NOT NULL,
PRIMARY KEY(no)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
";


$result=mysqli_query($connect,$sql);
if($result) {
    echo nl2br("\n");
	echo "simple_memo 테이블 생성 완료\n";
} else {
    echo nl2br("\n");
	echo "simple_memo 테이블 생성 에러발생 - Error creating table : " . mysqli_error($connect);
}

mysqli_close($connect);
?>