<?php include"header.php"; ?>
<style type="text/css">
   .form-group{ width: auto; }
   .input-group{
    display: inline-block;
    width: 65%;
    }
   .label-form{
    display: inline-block;
    width: 30%;
    }
    .content{
        margin:20px;
    }
</style>
<div class="content">
    <h1>Edit Produk</h1>
    <?php foreach ($produk as $key => $list){ ?>
    <form method="POST" action="<?php echo base_url();?>index.php/home/editproduk/<?php echo $list['id_produk'];?>">
    
    <div class="form-group">
        <div class="label-form">
             Kode Barang
         </div>
         <div class="input-group">
             <input type="text" name="kode_barang" value="<?php echo $list['kode_barang'];?>">
        </div>
    </div>
    <div class="form-group">
        <div class="label-form">
             Produk
         </div>
         <div class="input-group">
             <input type="text" name="nama_produk" value="<?php echo $list['nama_produk'];?>">
        </div>
    </div>
    <div class="form-group">
        <div class="label-form">
             Gudang
         </div>
         <div class="input-group">
         <select name="gudang_fk" id="gudang_fk" required>
                <?php foreach ($gudang as $key => $list2){ ?>
                <option value="<?php echo $list2['gudang_id'];?>" <?php if($list2['gudang_id']==$list['gudang_fk']){echo ' selected';}?>><?php echo $list2['nama_gudang'];?></option>
                <?php } ?>
            </select>
        </div>
       

    </div>
    <div class="form-group">
        <div class="label-form">
             Jumlah
         </div>
         <div class="input-group">
             <input type="text" class="currency" name="stok" value="<?php echo number_format($list['stok']);?>" style="text-align: right; width: 50px;">
        </div>
    </div>
    <div class="form-group">
        <div class="label-form">
             Harga Pokok
         </div>
         <div class="input-group">
             <input type="text" class="currency" name="harga_pokok" value="<?php echo number_format($list['harga_pokok']);?>" style="text-align: right;width: 150px;">
        </div>
    </div>

    <button class="btn-primary" type="submit" id="btn-baru" style="float: right;"> Simpan</button>
    </form>
<?php } ?>
  </div>
<script type="text/javascript">
    $('form').submit(function() {
        window.opener.tampil();
        window.opener.focus();  
        
                          
        });

   
</script>
<script type="text/javascript">
     $('input.currency').keyup(function(event) {
                      if(event.which >= 37 && event.which <= 40) return;
                      $(this).val(function(index, value) {
                        return value
                        .replace(/\D/g, "")
                        .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                        ;
                      });


                    });
</script>