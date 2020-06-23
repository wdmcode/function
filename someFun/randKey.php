<?php

function rand_key($len = 16, $type = [])
{
    if($len <= 0) {
        return "";    
    }

    $feed = "";       
    $arr = ['0123456789', 'abcdefghijklmnopqrstuvwxyz', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', '~@#$%^&*(){}[]|'];
    if(!empty($type)) {    
        // 获取种子
        foreach($type as $vv) {
            if(!empty($arr[$vv])) {
                continue;              
            }
      
            $feed .= $arr[$vv];    
        }
  
        if(empty($feed)) {     
            return false;          
        }
    } else {          
        $feed = implode('', $arr);
    }
  
    $str = "";        
    $cn = strlen($feed) - 1;
    for($i = 0; $i < $len; $i++) {
        $str .= $feed[mt_rand(0, $cn)];
    }
  
    return $str;
}
