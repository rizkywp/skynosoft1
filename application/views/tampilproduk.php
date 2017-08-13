<div class="content">
<div style="float: right;">
	<input type="text" name="cari" id="cari" placeholder="Cari" style="width: 250px;" >
</div>
<table id="table">
	<thead>
	<tr>
		<th width="150px">Kode Barang</th>
		<th>Nama Barang</th>
		<th width="150px">Gudang</th>
		<th width="100px">Jumlah</th>
		<th width="120px">Harga Pokok</th>
		<th width="120px">Total Nilai</th>
	</tr>
	</thead>
	<tbody>
	<?php 
	$total = 0;
	foreach ($produk as $key => $list){
		$total += $list['stok']*$list['harga_pokok'];
	echo'
	<tr onclick="pilihproduk('.$list['id_produk'].')">
		<td>'.$list['kode_barang'].'</td>
		<td>'.$list['nama_produk'].'</td>
		<td>'.$list['nama_gudang'].'</td>
		<td>'.$list['stok'].'</td>
		<td align="right">'.formatuang($list['harga_pokok']).'</td>
		<td align="right">'.formatuang($list['stok']*$list['harga_pokok']).'</td>
	</tr>
	';
	 } ?>
	</tbody>
	<tfoot>
	<tr>
		
		<th colspan="5" style="text-align: right; font-weight: bold;">Total :</th>
		<th style="text-align: right; font-weight: bold;"><?php echo formatuang($total);?></th>
	</tr>
	</tfoot>
</table>
<button class="btn-primary" id="btn-baru"> Baru</button>
<button class="btn-primary" id="btn-edit"> Edit</button>
<button class="btn-primary" id="btn-hapus"> Hapus</button>
</div>
<script type="text/javascript">
	$("#cari").keyup(function(){
        var searchText = $(this).val().toLowerCase();
        // Show only matching TR, hide rest of them
        $.each($("#table tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf(searchText) === -1)
               $(this).hide();
            else
               $(this).show();                
        });
    }); 

    $(function() {
    
    /* Get all rows from your 'table' but not the first one 
     * that includes headers. */
    var rows = $('tr').not(':first').not(':last');
    
    /* Create 'click' event handler for rows */
    rows.on('click', function(e) {
        
        /* Get current row */
        var row = $(this);
        
        /* Check if 'Ctrl', 'cmd' or 'Shift' keyboard key was pressed
         * 'Ctrl' => is represented by 'e.ctrlKey' or 'e.metaKey'
         * 'Shift' => is represented by 'e.shiftKey' */
        if ((e.ctrlKey || e.metaKey) || e.shiftKey) {
            /* If pressed highlight the other row that was clicked */
            row.addClass('highlight');
        } else {
            /* Otherwise just highlight one row and clean others */
            rows.removeClass('highlight');
            row.addClass('highlight');
        }
        
    });
    
    /* This 'event' is used just to avoid that the table text 
     * gets selected (just for styling). 
     * For example, when pressing 'Shift' keyboard key and clicking 
     * (without this 'event') the text of the 'table' will be selected.
     * You can remove it if you want, I just tested this in 
     * Chrome v30.0.1599.69 */
    $(document).bind('selectstart dragstart', function(e) { 
        e.preventDefault(); return false; 
    });
    
});

    var produkpilih;
    produkpilih='';
	function pilihproduk(pilihan){
    produkpilih = pilihan;
	}	
	var popup;
	$("#btn-edit").click(function(){
		if(produkpilih!=''){
		popup = window.open("<?php echo base_url();?>index.php/home/editproduk/"+produkpilih, "Popup", "width=600,height=400");
		        popup.focus();
		 } else {
		 	alert('Silakan Pilih Produk Terlebih Dahulu');
		 }
	});

	$("#btn-hapus").click(function(){
		if(produkpilih!=''){
			tanya = confirm("Anda Yakin Akan Menghapus Data ?");
					 if (tanya == true){
					$("body").load('<?php echo base_url(); ?>index.php/home/hapusproduk/'+produkpilih);
					} else return false;
			 } else {
		 	alert('Silakan Pilih Produk Terlebih Dahulu');
		 }
	});
	$("#btn-baru").click(function(){
		$("body").load('<?php echo base_url(); ?>index.php/home/tambahproduk');
	});

	function tampil(){
		 setTimeout(function(){ 
		$("body").load('<?php echo base_url(); ?>index.php/home/tampil');
		popup.close();
		}, 500);
	}

</script>
