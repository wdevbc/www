<!DOCTYPE html>
<html lang="ko">
<head>
    <title>Portfolio Board</title>
    <?php include "inc/head.html";?>
    <script>
        $(document).ready(function(){
	        $('body').addClass('scrollLock') //스크롤 락 추가
        })
    </script>
</head>

<body>

<div class="loading">
    <div class="loading__image">
        <img src="images/loadding2.gif" alt="">
    </div>
</div>
    <div class="row">
        <div class="">
            <ul class="gallery-list">
                <?php
                include "db_info.php";
                $query = "SELECT * FROM board order by number desc";
                $result = mysqli_query($connect,$query);
                $total = mysqli_num_rows($result);
                session_start();
                    while($rows = mysqli_fetch_assoc($result)){ 
                ?>
                <li>
                    <a href="http://<?php echo $rows['links']?>" target="_blank">
                        <div class="image-wrap">
                            <img src="./download.php?file_name=<?php echo $rows['file_name']?>" style="width:100%">
                        </div>
                        <div class="item-hover">
                            <div class="item-hover__inner">
                                <h2 class="item-title"><?php echo $rows['title']?></h2>
                                <p class="item-desc"><?php echo $rows['content']?></p>
                            </div>
                        </div>
                    </a>
                    <div class="number_link">
                        <?php
                            if(isset($_SESSION['id'])){
                        ?>
                            <a href="view.php?number=<?php echo $rows['number']?>" id="number_link">게시물보기</a>
                        <?php } ?>
                    </div>
                </li>
                <?php
                    $total--;}
                ?>
            </ul>
            <?php
                if(isset($_SESSION['id'])){
            ?>
            <a href="write.php" class="btn btn--write">글쓰기</a>
            <?php } ?>
        </div>
    </div>    

</body>
</html>


