<?php

/*
 * ����: Discuz!����������
 * ����֧��: http://www.liangjianyun.com/
 * �ͷ�QQ: 190360183
 */

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class plugin_closepc{
    function common(){
        global $_G;
        $mypluginconfig = $_G['cache']['plugin']['closepc'];
        $mypluginconfig['keys'] = str_replace("\r\n", "\n", $mypluginconfig['keys']);
        $mypluginconfig['keys'] = explode("\n", $mypluginconfig['keys']);

        foreach ($mypluginconfig['keys'] as $key => $value) {
            if(strpos($_SERVER['REQUEST_URI'], $value) !== false){
                $checkkeys = 1;
                break;
            }
        }

        if(($_G['groupid'] == 1 && $mypluginconfig['is_admin']) || $checkkeys){
            $checkadmin = 1;
        }
        if(empty($_G['mobile']) && empty($checkadmin)){
            include template('closepc:qrcode');
            exit;
        }
    }
}
class mobileplugin_closepc{
	function common(){

    }
}
?>
