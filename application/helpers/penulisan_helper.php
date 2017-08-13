<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	function formatuang($nilaiUang)
	{
		
		$nilaiRupiah = "";
		$pecah=explode(".", $nilaiUang);
		$nilaiUang=$pecah[0];$desimal=$pecah[1];
		if($desimal==null){$desimal='00';}
		$jumlahAngka = strlen($nilaiUang);
		
		while($jumlahAngka > 3)
		{
		$nilaiRupiah = "." . substr($nilaiUang,-3) . $nilaiRupiah;
		$sisaNilai = strlen($nilaiUang) - 3;
		$nilaiUang = substr($nilaiUang,0,$sisaNilai);
		$jumlahAngka = strlen($nilaiUang);
		}
		if($jumlahAngka<>0){
		$nilaiRupiah =  $nilaiUang . $nilaiRupiah . ',' . $desimal;

		return $nilaiRupiah;
		}
	}

			
?>