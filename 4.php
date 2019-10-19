
<?php
class Parkir{
	public $lama;

	public function hitungParkir($lama){

		if ($lama <= 3) {
			$total = $lama * 2000; 
		}elseif($lama <= 7){
			$pertama = 3;
			$sisa = $lama - $pertama;
			$total = ($pertama * 2000) + ($sisa * 1000);
		}else{
			$total = 10000;
		}

		echo "biaya : ".$total."<br>";

	}

}
$cetak = new parkir();
$cetak->hitungParkir(1);
$cetak->hitungParkir(2);
$cetak->hitungParkir(3);
$cetak->hitungParkir(4);
$cetak->hitungParkir(5);
$cetak->hitungParkir(6);
$cetak->hitungParkir(7);
$cetak->hitungParkir(8);
$cetak->hitungParkir(9);

?>