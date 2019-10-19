
<?php
class Test{
	public $nama;
	public $nim;
	public $jml_hadir;
	public $tugas;
	public $uts;
	public $uas;
	public $nilai_total;

	public function Penilaian($nama,$nim,$jml_hadir,$tugas,$uts,$uas){
		$kehadiran 		= ( $jml_hadir / 14 * 100 ) * 0.1 ; // 10%
		$nilai_tugas	= $tugas * 0.2 ; // 20%
		$nilai_uts 		= $uts * 0.3 ; // 30%
		$nilai_uas 		= $uas * 0.4 ; // 40%
		
		// cek apakah ada nilai 0 pada setiap unsur 
		if ($kehadiran == 0 ||  $nilai_tugas == 0 || $nilai_uts == 0 || $nilai_uas == 0) {
			$nilai_total = 0;
		}else{
			$nilai_total  	= $kehadiran + $nilai_tugas + $nilai_uts + $nilai_uas;
		}

		if ($nilai_total >= 80) {
			$grade = "A";
		}elseif ($nilai_total > 70) {
			$grade = "B";
		}elseif ($nilai_total > 60) {
			$grade = "C";
		}elseif ($nilai_total >= 50) {
			$grade = "D";
		}else{
			$grade = "E";
		}

		echo "Nama : ".$nama;
		echo "<br>";
		echo "NIM  : ".$nim;
		echo "<br>";
		echo "Nilai : ".$grade;

	}

}
$cetak = new Test();
$cetak->penilaian("Lucinta","696969",14,0,80,96);

?>