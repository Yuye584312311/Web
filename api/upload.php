<?php
    if(isset($_FILES['file'])==true){
        echo '值不为空';
    }else{
        echo '请选择上传文件';
        exit();
    }
?>