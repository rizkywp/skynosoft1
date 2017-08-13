<?php
class Query extends Ci_Model{
	
	function dataproduk($id){
		$this->db->select('produk.*,gudang.*');
		$this->db->from('produk');
		$this->db->join('gudang', 'produk.gudang_fk = gudang.gudang_id');
		if($id<>''){$this->db->where('produk.id_produk',$id);}
		$this->db->order_by('produk.id_produk','desc');
		  $Q = $this->db->get();
			   foreach ($Q->result_array() as $row){
				 $data[] = $row;
			   }
		$Q->free_result();    
		return $data;      		  
	}
	function tambahproduk($id){
		$data = array( 
			'kode_barang' => $this->input->post('kode_barang'),
			'nama_produk' => $this->input->post('nama_produk'),
			'gudang_fk' => $this->input->post('gudang_fk'),
			'stok' => str_replace(',','',$this->input->post('stok')),
			'harga_pokok' => str_replace(',','',$this->input->post('harga_pokok')),
			);
		$this->db->insert('produk', $data);	
	}
	function editproduk($id){
		$data = array( 
			'kode_barang' => $this->input->post('kode_barang'),
			'nama_produk' => $this->input->post('nama_produk'),
			'gudang_fk' => $this->input->post('gudang_fk'),
			'stok' => str_replace(',','',$this->input->post('stok')),
			'harga_pokok' => str_replace(',','',$this->input->post('harga_pokok')),
			);
		$this->db->where('id_produk', $id);
		$this->db->update('produk', $data);
	}
	function hapusproduk($id){
		$this->db->where('id_produk',$id);	
		$this->db->delete('produk');	
	}
	function datagudang(){
		  $Q = $this->db->get('gudang');
			   foreach ($Q->result_array() as $row){
				 $data[] = $row;
			   }
		$Q->free_result();    
		return $data;      		  
	}
	function tambahgudang(){
		$data = array( 
			'nama_gudang' => $this->input->post('nama_gudang'),
			'alamat_gudang' => $this->input->post('alamat_gudang')
			);
		$this->db->insert('gudang', $data);	
	}
	
	
}
	?>