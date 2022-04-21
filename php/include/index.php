
<?php include 'config.php' ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo $site_favicon ?>" type="image/x-icon">
    <title><?php echo $site_title ?></title>
    <style>
        * {margin:0;padding:0}
        a {color:#333;text-decoration:none}
        body{font-size:100%;transition:all 0.5s}
        .wrap {scroll-snap-type:y mandatory;overflow-y:scroll;height:100vh;scrollbar-width:none;-ms-text-overflow-style:none;font-size:18px}
        .wrap::-webkit-scrollbar {width:0;background-color:transparent}
        .header {position:absolute;width:100%;height:100px;box-shadow:2px 1px 4px #000;background:<?php echo $head_color ?>;z-index:10}
        .header > a {position:absolute;left:40px;top:20px}
        .header > a .logo {width:200px;height:60px;background:url('./<?echo $site_logo ?>') center no-repeat;background-size:contain}
        .gnb {position:absolute;right:40px;height:100px;line-height:100px}
        .gnb > li {display:inline-block;padding:0 5px;font-size:1.3rem;font-weight:bold}
        .section {position:relative;display:flex;justify-content:center;align-items:center;height:100%;scroll-snap-align:center;overflow:hidden}
        .section img {width:100%;height:100vh;object-fit:cover;vertical-align:middle}
        .section__img {width:100%;overflow:hidden}
        .section__title {position:absolute;left:50%;top:50%;transform:translate(-50%, -50%);font-size:2em;color:#fff;mix-blend-mode:difference}
    </style>
</head>
<body>
    <div class="wrap">
        <header class="header">
            <a href="./index.php">
                <h1 class="logo"></h1>
            </a>
            <ul class="gnb">
                <li><a href="#main">Main</a></li>
                <li><a href="#section02">Section02</a></li>
                <li><a href="#section03">Section03</a></li>
            </ul>
        </header>
        <section id="main" class="section section01">
            <h2 class="section__title">Main section!</h2>
            <div class="kv section__img">
                <img src="./<?php echo $main_kv ?>" alt="main-kv">
            </div>
        </section>
        <section id="section02" class="section section02">
            <h2 class="section__title">Sub section 1</h2>
            <div class="section__img">
                <img src="./<?php echo $main_section02 ?>" alt="section02-img">
            </div>
        </section>
        <section id="section03" class="section section03">
            <h2 class="section__title">Sub section 2</h2>
            <div class="section__img">
                <img src="./<?php echo $main_section03 ?>" alt="section03-img">
            </div>
        </section>
    </div>
</body>
</html>