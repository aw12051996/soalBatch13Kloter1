<?php
include "koneksi.php";
$id = $_GET["id"];
$sql = "SELECT * FROM salary WHERE id = $id";
$data = mysqli_query($conn,$sql);
  $data_salary = array();
  while($row = mysqli_fetch_array($data,MYSQLI_ASSOC)) {
    $data_salary[] = array('id' => $row["id"], 'nama' => "Rp " . number_format($row["salary"],2,',','.')); 
  }
    echo json_encode($data_salary);
?>