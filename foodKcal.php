<?php
require ('conn.php');

$food_1 = $_POST[food_1];
$food_2 = $_POST[food_2];
$food_3 = $_POST[food_3];
$typeId = $_POST[typeId];
$type;
switch ($typeId) {
	case 'jianfei' :
		$type=1;
		break;
	case 'zengji' :
		$type=2;
		break;
	case 'suxing' :
		$type=3;
		break;
	default :
		break;
}

$sqlstr = "UPDATE food SET food_1='" . $food_1 . "',food_2='" . $food_2 . "',food_3='" . $food_3 . "'where type =" . $type ."" ;

if (!mysql_query($sqlstr)) {
//	echo "修改失败--" . mysql_error() . "</br>" . $food_1 . "</br>" . $food_2 . "</br>" . $food_3;
		echo "0";
} else {
	//	echo "修改成功";

	echo "1";
}
?>