<?php include"header.php"; ?>
<style type="text/css">
   .form-group{ width: auto; }
   .input-group{
    display: inline-block;
    width: 65%;
    }
   .label-form{
    display: inline-block;
    width: 34%;
    }
    .content{
        margin:20px;
    }
</style>
<div class="content">
    <h1>Tambah Gudang</h1>
    
    <form method="POST" action="<?php echo base_url();?>index.php/home/tambahgudang">
    
    <div class="form-group">
        <div class="label-form">
             Nama Gudang
         </div>
         <div class="input-group">
             <input type="text" name="nama_gudang" value="<?php echo $list['nama_gudang'];?>">
        </div>
    </div>
    <div class="form-group">
        <div class="label-form">
             Alamat Gudang
         </div>
         <div class="input-group">
             <input type="text" name="alamat_gudang" value="<?php echo $list['alamat_gudang'];?>">
        </div>
    </div>
    

    <button class="btn-primary" type="submit" id="btn-baru" style="float: right;"> Simpan</button>
    </form>

  </div>
<script type="text/javascript">
    $('form').submit(function() {
                window.opener.pilihgudang();
                window.opener.focus();              
        });
   
</script>