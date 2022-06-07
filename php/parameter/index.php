<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>파라미터 - <?php echo $_GET['id']; ?></title>
</head>
<body>
    <h1>Web</h1>
    <ol>
        <li><a href="index.php?id=HTML">HTML</a></li>
        <li><a href="index.php?id=CSS">CSS</a></li>
        <li><a href="index.php?id=JavaScript">JavaScript</a></li>
    </ol>
    <h2>
        <?php
            echo $_GET['id'];
        ?>
    </h2>
    <?php
        echo file_get_contents("data/".$_GET['id']);
    ?>
    <h2>서버 정보</h2>
    <div>
        <?php
            $http_host = $_SERVER['HTTP_HOST'];
            $request_uri = $_SERVER['REQUEST_URI'];
            $url = 'http://' . $http_host . $request_uri;
        ?>
        <div>HTTP_HOST: <?= $http_host ?></div>
        <div>REQUEST_URI: <?= $request_uri ?></div>
        <div>URL: <?= $url ?></div>
    </div>
</body>
</html>