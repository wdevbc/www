<meta http-equiv="refresh" content="2;url=dbadmin.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
include_once 'dbconnect.php'; // DB 연결

$sql ="
CREATE TABLE board (
number int not null auto_increment,
title varchar(150) NOT NULL,
content text NOT NULL,
id varchar(20) NOT NULL,
file_name varchar(20),
hash varchar(255),
links varchar(255) NOT NULL,
PRIMARY KEY(number)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
";

$result=mysqli_query($dbconn,$sql);
if($result) {
    echo nl2br("\n");
	echo "board 테이블 생성 완료\n";
} else {
    echo nl2br("\n");
	echo "board 테이블 생성 에러발생 - Error creating table : " . mysqli_error($dbconn);
}

$sql ="
CREATE TABLE comment (
number int UNSIGNED not null auto_increment,
board_number int UNSIGNED NOT NULL,
id varchar(20) NOT NULL,
content text NOT NULL,
PRIMARY KEY(number)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
";

$result=mysqli_query($dbconn,$sql);
if($result) {
    echo nl2br("\n");
	echo "comment 테이블 생성 완료\n";
} else {
    echo nl2br("\n");
	echo "comment 테이블 생성 에러발생 - Error creating table : " . mysqli_error($dbconn);
}

$sql ="
CREATE TABLE member (
number int UNSIGNED not null auto_increment,
id varchar(20) NOT NULL,
pwd varchar(20) NOT NULL,
email varchar(100) NOT NULL,
PRIMARY KEY(number)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
";

$result=mysqli_query($dbconn,$sql);
if($result) {
    echo nl2br("\n");
	echo "member 테이블 생성 완료\n";
} else {
    echo nl2br("\n");
	echo "member 테이블 생성 에러발생 - Error creating table : " . mysqli_error($dbconn);
}

mysqli_close($dbconn);
?>
<h3>완료중..</h3>