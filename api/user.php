<html>
    <head><title>用户中心</title></head>
</html>

<?php

define('VERSION','1.0.01');

//全局变量
$a=100;$b=100;

class Text{
    /**
     * 解析URL参数
     */
    public function getHostParams(){
        //_REQUEST超级全局变量，包含POST、GET、COOKIE、FILE
        $name = $_REQUEST['name'];
        $age = $_POST['age'];
        //非空判断
        if(empty($name)==true||empty($age)==true){
            echo '<p1>请输入姓名和年龄</p1>';
            return;
        }
        //局部函数中访问全局变量
        global $a,$b;
        $c=$a+$b;
        //PHP将所有全局变量直接存放在了GLOBALS数组中，可在任意位置直接更新值，前提是全局变量已经被初始化了
        $GLOBALS['a']=200;
        //编码汉字
        $xx=<<<TEST
        'AAA'
        'FFF'
TEST;
        //对可能包含特殊字符的字符串编码
        echo htmlspecialchars('姓名：'.$name)."<br>";
        //换行
        echo PHP_EOL."<br>";
        echo '年龄：'.$age."<br>";
        echo PHP_EOL."<br>";
        echo $c."<br>";
        echo PHP_EOL."<br>";
        echo $xx."<br>";
        echo PHP_EOL."<br>";
        //字符串长度获取
        echo '总长度：'.strlen($xx);
        $m='Hello World,China';
        $result = strpos($m,"China");
        if($result!=FALSE){
            echo '总长度：'.strlen($m).'，China起始位置：'.$result."<br>";
        }else{
            echo '未找到匹配的字符串."<br>"';
        }
        //整除运算,抛弃小数点
        echo '100*3的整除运算：'.intdiv(100,3)."<br>";
        if(1<>2){
            echo "不等于运算符.\"<br>\"";
        }
        //逻辑运算符 and or xor && || | !
        //数组
        $items=array('234','23435','54657','astghr')."<br>";
        $length=count($items);
        echo '数组长度：'.$length;
        //数组普通遍历
        for ($i=0;$i<$length;$i++){
            echo $items[$i];
        }
        //键值对，类似Map数组，初始化一个键值对数组
        $maps=array("index1"=>"111","index2"=>"222","index3"=>"333");
        //或者这样创建：
        $maps['index4']="444";
        $maps['index5']="555";
        //键值对数组遍历,原理：将数组用占位变量以别名形式指定键和值，取出单元后赋值，指针往前移，循环之
        foreach ($maps as $key=>$value){
            echo 'K:'.$key.'V:'.$value;
        }
        echo "index3".$maps['index3'];
        echo "index5".$maps['index5'];
        //魔术常量
        echo "当前代码运行至第".__LINE__."行，文件路径：".__FILE__;
        //打开文件、关闭文件
        $file=fopen("1.txt","r");
        fclose($file);
    }
}
//初始化对象
$text = new Text();
$text->getHostParams();
?>