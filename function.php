<?php
/**
 * 校验日期格式是否正确
 * @param  [date] $date   [日期]
 * @param  array  $format [格式]
 * @return [bool]         [description]
 */
function checkDateIsValid($date,$format = array("Y-m-d","Y/m/d"))
{
    if(empty($date)) return false;
    
    $unixTime = strtotime($date);
    //如果strtotime转换不对，日期格式显然不对
    if(!$unixTime)
    {
        return false;
    }
    //校验日期的有效性，只要满足其中一个格式即可
    foreach ($format as $key => $value) {
        if(date($value,$unixTime) == $date)
        {
            return true;
        }
    }
    return false;
}

//checkDateIsValid("2017-05-03");

/**
 * 随机取数组中的元素
 *
 * @param [array] $arrRand
 * @return void
 */
function randArr($randData){
    if(!is_array($randData)) return false;
    $randKey = array_rand($randData);

    return $randData[$randKey];
}
//$randData = ['小明','小红','小小','小旧','小吧','小流'];
//print_r(randArr($randData));

/**
 * 对字符串进行反转
 *
 * @param [string] $str
 * @param [string] $encoding
 * @return void
 */
function getRev($str,$encoding='utf-8'){

    if(empty($str)) return false;
    $result = '';
    $len = mb_strlen($str);

    for($i=$len-1; $i>=0; $i--){

        $result .= mb_substr($str,$i,1,$encoding);
    }
    return $result;
}
//$str = 'OK你是正确的Ole';
//$str = "Hello world";
//var_dump(getRev($str));

/**
 * 求三个值最大数
 *
 * @param [int] $a
 * @param [int] $b
 * @param [int] $c
 * @return void
 */
function bigNum($a,$b,$c){
    if(empty($a) || empty($b) || $c) return false;
	return $a>$b ? ($a>$c ? $a : $c):($c<$b ? $b:$c);
}

//echo bigNum(1,2,3);

/**
 * 检查二维数组是否存在相同元素
 *
 * @param [array] $initData 二维数组，初始化数据
 * @return boolean
 */
function checkIsSame(array $initData){

    if(!is_array($initData)) return false;

	foreach($initData as $key => $value){
		$_initData = $initData;
        unset($_initData[$key]);
        $same = array_search($value,$_initData);
		if($same !== FALSE){
			//echo '当前元素:'.$key.'=>'.var_export($value,TRUE).' ';
			//echo '有相同元素:'.$same.'=>'.var_export($_arr[$same],TRUE)."<br><br>";
			return true;
		}
	}
	return false;
}
// $initData = [
// 	[2,3,4],[1,2,3],[1,2,3]
// ];
// print(checkIsSame($initData)); 