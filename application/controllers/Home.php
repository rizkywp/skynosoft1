<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
	}
	public function index()
	{
		$data['produk'] = $this->query->dataproduk(null);
		$this->load->view('main',$data);
	}
	public function tampil()
	{
		$data['produk'] = $this->query->dataproduk(null);
		$this->load->view('tampilproduk',$data);
	}
	public function tambahproduk()
	{
		if($this->input->post('nama_produk')==''){
		$data['gudang']=$this->query->datagudang();
		$this->load->view('tambahproduk',$data);
		} else {
		$this->query->tambahproduk();
		$this->tampil();
		} 
	}
	public function editproduk($id)
	{
		if($this->input->post('nama_produk')==''){
		$data['gudang']=$this->query->datagudang();
		$data['produk'] = $this->query->dataproduk($id);
		$this->load->view('editproduk',$data);
		} else {
		$this->query->editproduk($id);
		} 
	}
	public function hapusproduk($id)
	{
		$this->query->hapusproduk($id);
		$this->tampil();
	}
	public function tambahgudang()
	{
		if($this->input->post('nama_gudang')==''){
		$this->load->view('tambahgudang');
		} else {
		$this->query->tambahgudang();
		} 
	}
	public function getgudang()
	{
			$data =  $this->query->datagudang();
			echo json_encode($data);
	}
	
	
}
?>
