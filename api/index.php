<html>
<head>
    <title>Hello World!</title>
</head>
<body>
<!--简单的逻辑片段代码-->
    <?php
        define('CONSTANCT','hello world-PHP!');
        echo CONSTANCT;
        if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')!=FALSE) {
            echo "您正在使用 Internet Explorer浏览器<br />";
            ?>
            <h3>使用的IE浏览器</h3>
            <?php
        }else {
            ?>
            <h3>使用的非IE浏览器</h3>
            <?php
        }
    ?>
<!--简单的输入框-->
    <form action="user.php" method="POST">
        <p>姓名：<input type="text" name="name"/></p>
        <p>年龄：<input type="text" name="age"/></p>
        <p><input type="submit"/></p>
    </form>
</body>
</html>