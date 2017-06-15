<script type="text/javascript">
function grand_total(){
	var harga = parseFloat(document.getElementById("i_harga").value);
	var qty = parseFloat(document.getElementById("i_qty").value);
	var	total = harga * qty;
	document.getElementById("i_total").value = total;
}
</script>
<?php if(isset($_GET['did']) && $_GET['did'] == 1){ ?>
<section class="content_new">
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-check"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Sukses !</b>
		Simpan Berhasil
	</div>
</section>
<?php }else if(isset($_GET['did']) && $_GET['did'] == 2){ ?>
<section class="content_new">
<div class="alert alert-info alert-dismissable">
<i class="fa fa-check"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
<b>Sukses !</b>
Edit Berhasil
</div>
</section>
<?php
} else if(isset($_GET['did']) && $_GET['did'] == 3){ ?>
	<section class="content_new">
		<div class="alert alert-info alert-dismissable">
			<i class="fa fa-check"></i>
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			<b>Sukses !</b>
			Delete Berhasil
		</div>
	</section>
<?php } ?>
<style media="screen">
  div.img_frame{
    width: 98%;
    height: 300px;
    background:0;
    border: 0px solid;
    margin-left: 10px;
    margin-right: 10px;
    padding: 10px;
    border-color: #d5d5d5;
  }
  .office_name{
    font-family:serif;
  }
  button.edit{
    border-radius: 20px;
  }
</style>
<section class="content">
	<div class="row">
		<div class="col-md-12">
      <div class="box">
        <div class="box-body">
          <div class="content">
            <div class="img_frame">
              <center>
                <?php $gambar = ($row->office_img) ? $row->office_img : "default.jpg"; ?>
                <img src="<?= "../img/office/".$gambar ?>" id="output_1" style="max-width:100%; max-height:320px;"/>
              </center>
            </div>
          </div>
          <center>
            <label class="office_name" style="font-family:inherit;font-size:50px;"><?= $row->office_name?></label>
            <br>
            <label for=""><?= $row->office_address?></label>
            <br>
            <label for=""><?= $row->office_phone?></label>
            <br>
            <label for=""><?= $row->office_email?></label>
            <br>
            <a href="<?=$action?>">
							<button type="button" name="button" class="btn btn-primary edit"  name="button">
								<i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit Profile
							</button>
            </a>
          </center>
          <br>
          <br>
        </div>
      </div>
		</div><!--/.col (right) -->
	</div>   <!-- /.row -->
</section><!-- /.content -->
<script type="text/javascript">
var loadFile = function(event) {
	var reader = new FileReader();
	$('#output_1').removeAttr('src');
	$('#output_1').empty();
	reader.onload = function(){
		var output = document.getElementById('output');
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
};
</script>
