<?php
/**
 * https://github.com/popcorner/14smantra
 * © 2018 popcorner
 */
function hex2mantra($str) {
    return mb_convert_encoding(hex2bin(dechex((hexdec($str)>>6)+184).dechex((hexdec($str)&63)+161)),"UTF-8","GBK");
}
function mantra2hex($str) {
    $deco = bin2hex(mb_convert_encoding($str,"GBK","UTF-8"));
    $toppart = hexdec(substr($deco,0,2))-184;
    $rearpart = hexdec(substr($deco,2))-161;
    if($toppart<64 && $toppart>=0 && $rearpart<64 && $rearpart>=0) {
        return str_pad(dechex(($toppart<<6)+$rearpart),3,'0',STR_PAD_LEFT);
    }
}
function splitinfohash($str,$isbin=0) {
    if($isbin){
        $str = bin2hex($str);
    }
    if(strlen($str)<40) {
        $str = str_pad($str,40,'0',STR_PAD_LEFT);
    }
    $str = str_pad($str,42,'0');
    return str_split($str,3);
}
function magnet2infohash($mag) {
    $maga = explode('&',explode('?',$mag)[1]);
    $return = '';
    foreach($maga as $mitem) {
        if(substr($mitem,0,2) == 'xt') {
            $return = substr($mitem,12);
            if(strlen($return)==32) {
                include './base32.php';
                $return = bin2hex(Base32::decode($return));
            }
            break;
        }
    }
    if(strlen($return)==40) {
        return $return;
    } else {
        return '';
    }
}
function infohash2magnet($btih) {
    return 'magnet:?xt=urn:btih:'.$btih;
}
function encode($param) {
    $iia = magnet2infohash($param);
    $ifa = splitinfohash($iia);
    $output = '';
    foreach($ifa as $ia) {
        $output .= hex2mantra($ia);
    }
    return substr_replace($output,'，',21,0);
}
function decode($param) {
    $ifa = str_split($param,3);
    $output = '';
    foreach($ifa as $ia) {
        $output .= mantra2hex($ia);
    }
    return infohash2magnet(substr($output,0,40));
}
function main_handler($event, $context) {
    $param = json_decode($event->body,true);
    if($param['method']=='encode') {
        $result = encode($param['value']);
    } elseif($param['method']=='decode') {
        $result = decode($param['value']);
    } else {
        $result = '';
    }
    return json_encode(['result'=>$result]);
}