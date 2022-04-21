<?php 
	// GET으로 넘겨 받은 year값이 있다면 넘겨 받은걸 year변수에 적용하고 없다면 현재 년도
	$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
	// GET으로 넘겨 받은 month값이 있다면 넘겨 받은걸 month변수에 적용하고 없다면 현재 월
	$month = isset($_GET['month']) ? $_GET['month'] : date('m');

	$date = "$year-$month-01"; // 현재 날짜
	$time = strtotime($date); // 현재 날짜의 타임스탬프
	$start_week = date('w', $time); // 1. 시작 요일
	$total_day = date('t', $time); // 2. 현재 달의 총 날짜
	$total_week = ceil(($total_day + $start_week) / 7);  // 3. 현재 달의 총 주차
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>calendar</title>
	<style type="text/css">
        * {margin:0;padding:0} /* 스타일 여백 초기화 */
        .wrap {max-width:800px;margin:5% auto;padding:0 5%} /*컨텐츠 최대 넓이 및 중앙정렬*/
        
        .header .y-m {font-size:24px;text-align:center} /*상단 년월 글씨크기 및 중앙정렬*/
        .header .btn-wrap {text-align:right;font-size:12px} /*이전 달 다음 글씨크기 및 오른쪽 정렬*/
        .btn {color:#333;text-decoration:none;font-weight:bold} /*이전 달 다음 달 a태그의 색상 및 효과 제거 굵은글씨*/
		
        table {width:100%;border-spacing:0} /*table 넓이 100% 및 테두리 간격 초기화*/
        table th {height:60px;color:#fff;background-color:rgba(0,0,0,0.7)} /*요일 높이 및 글씨, 배경색*/
		table td {height:60px;text-align:center} /*날짜 높이 및 중앙정렬*/
        
        .footer {line-height:30px;font-size:12px;color:#999;text-align:center} /*하단부 내용*/
	</style>
</head>
<body>
    <div class="wrap">
        <header class="header">
            <div class="y-m">
            <?php echo "$year 년 $month 월" ?>
            <!-- 현재가 1월이라 이전 달이 작년 12월인경우 -->
            </div>
            <div class="btn-wrap">
                <?php if ($month == 1): ?>
                    <!-- 작년 12월 -->
                    <a href="./calendar.php?year=<?php echo $year-1 ?>&month=12" class="btn">이전 달</a>
                <?php else: ?>
                    <!-- 이번 년 이전 월 -->
                    <a href="./calendar.php?year=<?php echo $year ?>&month=<?php echo $month-1 ?>" class="btn">이전 달</a>
                <?php endif ?>

                <!-- 현재가 12월이라 다음 달이 내년 1월인경우 -->
                <?php if ($month == 12): ?>
                    <!-- 내년 1월 -->
                    <a href="./calendar.php?year=<?php echo $year+1 ?>&month=1" class="btn">다음 달</a>
                <?php else: ?>
                    <!-- 이번 년 다음 월 -->
                    <a href="./calendar.php?year=<?php echo $year ?>&month=<?php echo $month+1 ?>" class="btn">다음 달</a>
                <?php endif ?>
            </div>
        </header>
        <section class="contents">
            <table border="1">
                <tr> 
                    <th>일</th> 
                    <th>월</th> 
                    <th>화</th> 
                    <th>수</th> 
                    <th>목</th> 
                    <th>금</th> 
                    <th>토</th> 
                </tr> 
                <!-- 총 주차를 반복합니다. -->
                <?php for ($n = 1, $i = 0; $i < $total_week; $i++): ?> 
                    <tr> 
                        <!-- 1일부터 7일 (한 주) -->
                        <?php for ($k = 0; $k < 7; $k++): ?> 
                            <td> 
                                <!-- 시작 요일부터 마지막 날짜까지만 날짜를 보여주도록 -->
                                <?php if ( ($n > 1 || $k >= $start_week) && ($total_day >= $n) ): ?>
                                    <!-- 현재 날짜를 보여주고 1씩 더해줌 -->
                                    <?php echo $n++ ?>
                                <?php endif ?>
                            </td> 
                        <?php endfor; ?> 
                    </tr> 
                <?php endfor; ?> 
            </table>
        </section>
        <footer class="footer">
            © Wdev.kr All Rights Reserved.
        </footer>
    </div>
</body>
</html>