 <!DOCTYPE html>
 <html>
 <head>


 <title>Tes SofDev Front End Skynosoft</title>
<link rel="icon" href="http://skynosoft.com/wp-content/uploads/2017/07/cropped-fav1-32x32.png" sizes="32x32" />
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animation.css">
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<style>
body{
	background-color: #ececec;
	font-size: 8pt;
}
.content{
	margin:20px 200px 20px 200px;
	padding:20px 50px 10px 50px;
	background-color: white;
	font-family: "arial";
	color:#727272;
	height:80vh;
	border-radius: 5px;
	-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.31);
-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.31);
box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.31);
}
table {
	border-collapse: collapse;
  	border-spacing: 0;
  	width: 100%;
}
thead tr th {
	background-color: #357ec2;
	color:white;
	padding: 5px;
	font-weight: normal;
	text-align: left;
	font-size: 10pt;
}
tbody tr{
	background-color: #efefef;
	border-top: 5px solid white;
}
tbody tr td{
	padding:10px 5px 10px 5px;
	font-size: 8pt;
	color: #626262;
}
tbody tr{
	cursor: pointer;
}
tfoot tr th{
	padding:10px 5px 10px 5px;
	font-size: 8pt;
}
.highlight { background: #c1e4e8; }

input[type=text],select{
	margin-bottom: 5px;
	font-size: 8pt;
	color:#626262;
	background-color: #efefef;
	border:none;
	padding:5px;
	width:100%;
}
.btn-primary{
	background-color: #357ec2;
	color: white;
	width:100px;
	border:none;
	margin:5px 2px 5px 0;
	padding:3px;
	font-size: 8pt;
	cursor: pointer;
}
</style>
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
 </head>