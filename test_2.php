<?php
$bukan_self_number=array();
$semua_angka=array();
for ($i=1; $i <10000 ; $i++) { 
	$a="$i";
	array_push($semua_angka, $i);
	$jenis=strlen($i);
	if ($jenis==1) {
		$plus_angka=$i+$a[0];
		array_push($bukan_self_number, $plus_angka);
	}elseif ($jenis==2) {
		$plus_angka=$i+$a[0]+$a[1];
		array_push($bukan_self_number, $plus_angka);
	}elseif ($jenis==3) {
		$plus_angka=$i+$a[0]+$a[1]+$a[2];
		array_push($bukan_self_number, $plus_angka);
	}elseif ($jenis==4) {
		$plus_angka=$i+$a[0]+$a[1]+$a[2]+$a[3];
		array_push($bukan_self_number, $plus_angka);
	}elseif ($jenis==5) {
		$plus_angka=$i+$a[0]+$a[1]+$a[2]+$a[3]+$a[4];
		array_push($bukan_self_number, $plus_angka);
	}
}
$self_number=array_diff($semua_angka, $bukan_self_number);

$nomor=1;
$jumlah_self_number=0;
foreach ($self_number as $key) {
	echo "<p>".$nomor.". ".$key."</p>";
	$jumlah_self_number+=$key;
	$nomor++;
}
echo "Jumlah Semua Self Number = ".$jumlah_self_number;
?>