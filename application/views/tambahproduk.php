<?php include"header.php"; ?>
<style type="text/css">
   .form-group{ width: auto; }
   .input-group{
    vertical-align: middle;
    display: inline-block;
    width: 55%;
    }
   .label-form{
    vertical-align: middle;
    display: inline-block;
    width: 35%;
    }
    .btn-side{
        vertical-align: middle;
    display: inline-block;
    width: 5%;
    }
    .form-tambah{
        width: 500px;
    }
</style>
<div class="content">
<div class="form-tambah animated fadeInUp">
    <h1>Entri Saldo Awal Persediaan</h1>
    <form method="POST" name="formtambahproduk" id="formtambahproduk"" action="<?php echo base_url();?>index.php/home/tambahproduk/<?php echo $list['id_produk'];?>">
    
    <div class="form-group">
        <div class="label-form">
             Kode Barang
         </div>
         <div class="input-group">
             <input type="text" name="kode_barang" required >
        </div>
    </div>
    <div class="form-group">
        <div class="label-form">
             Produk
         </div>
         <div class="input-group">
             <input type="text" name="nama_produk" required >
        </div>
    </div>
    <div class="form-group">
        <div class="label-form">
             Gudang
         </div>
         <div class="input-group">
            <select name="gudang_fk" id="gudang_fk" required>
                <?php foreach ($gudang as $key => $list){ ?>
                <option value="<?php echo $list['gudang_id'];?>"><?php echo $list['nama_gudang'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="btn-side">
             <img src="<?php echo base_url();?>assets/img/plus.png" style="margin-bottom: 5px; cursor: pointer;" onclick="tambahGudang()">
         </div>
       

    </div>
    <div class="form-group">
        <div class="label-form">
             Jumlah
         </div>
         <div class="input-group">
             <input type="text" class="currency" name="stok" style="text-align: right; width: 50px;" required>
        </div>
    </div>
    <div class="form-group">
        <div class="label-form">
             Harga Pokok
         </div>
         <div class="input-group">
             <input type="text" class="currency" name="harga_pokok" style="text-align: right;width: 150px;" required>
        </div>
    </div>
<br/><br/><br/>
   
    </form>
     <button class="btn-primary" onclick="$('#formtambahproduk').submit()" type="submit" id="btn-baru" style="float: right;"> Rekam</button>
     <button class="btn-primary" onclick="tampil()" id="btn-baru" style="float: right;"> Batal</button>
</div>
  </div>
<script type="text/javascript">

var popup;
   function tambahGudang(){
    var gudang_fk = document.getElementById('gudang_fk');
         popup = window.open("<?php echo base_url();?>index.php/home/tambahgudang/", "Popup", "width=600,height=400");
                popup.focus();
     }
    function pilihgudang(){
         setTimeout(function(){ 
      
        $.ajax({
             url: '<?php echo base_url();?>index.php/home/getgudang',
              success: function(data){
               var data = JSON.parse(data);
               var toAppend ='';
               $.each(data,function(i,o){
                toAppend += '<option value="' +o.gudang_id+ '" selected>'+o.nama_gudang+'</option>';
               });
                document.getElementById('gudang_fk').innerHTML = toAppend;
               }
              });
        popup.close();
          }, 500);

    }
    function tampil(){
        $("body").load('<?php echo base_url(); ?>index.php/home/tampil');
    }
    $("#formtambahproduk").submit(function(event){
        event.preventDefault();
                          var formData = new FormData($(this)[0]);
                           $.ajax({
                           url: $(this).attr('action'),
                            type: 'POST',
                            data: formData,
                            async: false,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function (data) {
                              $('body').html(data);
                            },
                           
                            });
                         
                          return false;
                        });
                        

</script>