<html>
    <head><title>马甲包请求明细</title></head>
    <body>
        <?php
            $logs= fopen("logic_version2019-08-3020190830.log","r");
            //所有站点+ID
            $userLists = array();
            //去重站点
            $onlyK = array();
            while (!feof($logs)){
                $linStr=fgets($logs);
                //echo "原字符串".$linStr."<br>";
                //分割获取指定位置字符串
                $subLineStr=substr($linStr,strripos($linStr,"["));
                //echo "截取后".$subLineStr."<br>";
                //将字符串中出现的等介质剔除
                $replace =array(
                    '[2 '=>'',
                    ']'=>'',
                );
                $finalStr=strtr($subLineStr,$replace);
                //echo $finalStr."<br>";
                //转换为数组
                $array=explode(" ",$finalStr);
                //计数
                if(empty($array[0])===false){
                    $str =$array[0]."-".$array[1]."-".$array[2];
                    //echo $str."<br>";
                    //所有站点
                    if(isset($userLists[$str])){
                        $userLists[$str]=$userLists[$str]+1;
                    }else{
                        $userLists[$str]=1;
                    }
                    //去重的站点
                    $key=$array[1];
                    if(isset($onlyK[$key])){
                        $onlyK[$key]=$onlyK[$key]+1;
                    }else{
                        $onlyK[$key]=1;
                    }
                }
                //正则
        //        preg_match('/\[2 soft_id:(.*)]/',$linStr,$arr);
        //        var_dump($arr[0]."<br>");
        //        var_dump($arr[1]."<br>");
                //正则获取指定位置字符串
                //preg_match_all("/(?:\[\]\[2 )(.*)(?:\])/i",$linStr, $tempStr);
                //preg_match('\[\]\[2 (\w+)\]',$linStr,$tempStr);
            }
            fclose($logs);
            //总访问人数
            $totalKNum=0;
            foreach ($onlyK as $k=>$v){
                echo "站点：".str_replace("site_id:","",$k)."，请求数：".$v."<br>";
                $totalKNum+=$v;
            }
            echo "<br>";
            echo "站点数量：".count($onlyK)."，总请求数：".$totalKNum."<br>";
            echo "<br>";
            echo "========================================明细=============================================<br>";
            echo "<br>";
            foreach ($userLists as $key => $value){
                $array=explode("-",$key);
                $id=str_replace("soft_id:","ID：",$array[0]);
                $name=str_replace("site_id:","站点：",$array[1]);
                $version=str_replace("version:","版本号：",$array[2]);
                $totalNum+=$value;
                echo $name."，".$id."，".$version."，请求数：".$value."<br>";
            }
            echo "总请求数：".$totalKNum."<br>";
        ?>
    </body>
</html>