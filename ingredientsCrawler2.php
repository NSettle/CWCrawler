<?php
// error_reporting(E_ERROR);
$array = json_decode(fread(fopen("json.js", "r"), filesize("json.js")));

$str = "";
foreach ($array as $value) {
	//echo $value->name;

	if ($value->image == "") {
		$str .= $value->name.";";
	}
}

echo $str;

// for ($i=($page*$perReload); $i<count($myArray); $i++) {

// 	array_push($array, array('name'=>$myArray[$i], 'image'=>busca($myArray[$i]),'id'=>$i));

// 	$c++;

// 	if ($c == $perReload) {
// 		break;
// 	}
// }

// $str = json_encode($array);


// $fp = fopen("json.js", "w");
// file_put_contents("json.js", $str);
// fclose($fp);


// if ($c == 0) {
// 	echo "<h1>Sucesso!</h1>";
// }
// else {
// 	echo "<script>
// 		setTimeout(function() {
// 			location.href='?p=".($page+1)."';
// 		}, 1000);
// 		</script>";

// }

?>
