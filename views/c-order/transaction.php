<?php 
if(isset($_GET['t'])){
  	$date = format_date($_GET['t']);
} else {
	$date = format_date(date("Y-m-d"));
}
?>
<link href="../css/transaction.css" rel="stylesheet" type="text/css"/>
<?php /*
<!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../views/c-order/bootstrap-timepicker.min.css">
*/ ?>
<!-- bootstrap time picker -->
<script src="../views/c-order/bootstrap-timepicker.min.js"></script>
<style type="text/css">
	label{
		color: rgb(107, 52, 106);
	}
</style>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#i_pijat").change(function(){
    var pijat_id = $("#i_pijat").val();
    $.ajax({
        url: "../views/c-order/getdata.php",
        data: "proses=paketitem&pijat_id="+pijat_id,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#paketitem").html(msg);
        }
    });
  });
});
  </script>
<script type="text/javascript">

	function set_harga() {
		var i_pijat = $('#i_pijat').val();
		var harga = $('#i_pijat option:selected').data('harga')||0;
		$('#pijat_price').val(harga)||0;
		$('#grand_total_currency').val(toRp(harga))||0;
		console.log(harga);
	}

	$('body').on('click', '.btn-add-cart', function (e) {
      $.fn.addCart($(this));
      e.preventDefault();
  });


$(document).ready(function(){

	set_harga();

	var items = [];
	var html = '';
	var add_item_list = [];
	// var item_detail = [];
	// var search_data = [];

	$.fn.getItems = function(){
		$.get("transaction.php?page=get_items",function(data){
						var no = 1;
						$.each(JSON.parse(data), function (index, value) {
								items.push(value);
								html += '<tr>\
													<td style="text-align:center;">'+no+'</td>\
													<td id="item-name">'+value.item_name+'\
													<td class="text-right">'+Intl.NumberFormat().format(value.item_harga_jual)+'</td><td class="text-center">\
														<button data-disc="" data-price="'+value.item_harga_jual+'" \
														data-qty="1" data-name="'+value.item_name+'" \
														data-id="'+value.item_id+'" data-has-promo=""\
														data-status-aktif="'+value.status_id+'"\
														data-promo-item-name="" data-promo-gratis="" data-promo-qty="" \
														class="btn btn-success btn-xs btn-add-cart">\
															<i class="fa fa-plus"></i>\
														</button>\
													</td>\
												</tr>';
									no++;
								});

						$("#data_items").html(html);
						// $('#table_item').animate({scrollTop: $('#data_items').prop("scrollHeight")}, 500);
				}).fail(function(data){
							alert(data);
					});
					// alert();
					// $('#table_item').animate({scrollTop: $('#data_items').prop("scrollHeight")}, 500);
	}

	$.fn.addCart = function(btn){

		var this_name 			= btn.attr('data-name');
    var this_id 				= parseInt(btn.attr('data-id'));
		var this_harga_jual = btn.attr('data-price');
		var this_status 		= btn.attr('data-status-aktif');

		var this_qty = 1;
		var item_exist = 0;
		var item_exist_index = -1;

			if (add_item_list) {
				$.each(add_item_list, function (index, value) {
								if (value.item_id == this_id) {
										item_exist = 1;
										item_exist_index = index;
										this_qty = this_qty + value.item_qty;
								}
						});
			}

			if (item_exist) add_item_list.splice(item_exist_index, 1);

			var new_item_detail = {
							'item_name'		: this_name,
							'item_id'			: this_id,
							'item_price'	: this_harga_jual,
							'item_qty'		: this_qty,
							'item_status'	: this_status
					};


			add_item_list.push(new_item_detail);
			localStorage.setItem('item_detail', JSON.stringify(add_item_list));
			$.fn.refreshChart();

	}
		$("body").on("click", ".removeCart", function (event) {
				var item_id 		= $(this).attr('data-id');
				var bapak 			= $(this).parent();
				var mbah				= bapak.parent();
				var mbahembah		= mbah.parent();
				var item_index 	= mbahembah.index();

				$.each(add_item_list, function (index, value) {
							if (value.item_id == item_id) {
									add_item_list.splice(index, 1);
									return false;
							}
					});
					localStorage.setItem('item_detail', JSON.stringify(add_item_list));
					$.fn.refreshChart();
		});

	$.fn.refreshChart = function () {
					// $.fn.refreshSales();
					storage_item_detail = JSON.parse(localStorage.getItem('item_detail'));

					var html = '';
					var html_struk = '';
					var input_sales_detail = '';
					var intSubTotal = 0;
					var total_item = 0;
					var total_item_qty = 0;
					//
					// $.each(storage_sales_detail, function (index, value) {
					// // 		var item_disc = value.item_disc;
					// // 		if( item_disc ) has_discount = 1;
					// // });
					//
					$("#tbody_sales_cart").empty();
					$.each(storage_item_detail, function (index, value) {

							var item_name = value.item_name;
							var item_id = value.item_id;
							var item_price = value.item_price;
							var item_qty = value.item_qty;
							var item_status = value.item_status;
							var item_total = item_qty * item_price;

							intSubTotal += item_total;
							var itemPrice = Intl.NumberFormat().format(item_price);
							var itemTotal = Intl.NumberFormat().format(item_total);
							// var itemDiscTotal = Intl.NumberFormat().format(item_disc_total);

							html += '<tr>';
							html += '<td class="text-center">';
							html += '<input type="hidden" name="itemid[]" id="itemid" value="'+item_id+'">';
							html += '<div class="input-group input-group-sm">';
							html += '<span class="input-group-btn">';
							html += '<button data-id="" class="btn btn-danger btn-sm btn-decrease-cart" type="button"><i class="fa fa-minus"></i></button>';
							html += '</span>';
							html += '<input type="text"  style="text-align:center;width:80px;" name= "itemqty[]" id="itemqty" class="form-control input-sm qty" value="' + item_qty + '">';
							html += '<span class="input-group-btn">';
							html += '<button data-id="" class="btn btn-success btn-sm btn-increase-cart" type="button"><i class="fa fa-plus"></i></button>';
							html += '</span>';
							html += '</div>';
							html += '</td>';
							html += '<td>' + item_name;
							html += '</td>';
							html += '<td class="text-right">'+itemPrice+'</td>';
							html += '<td class="text-right">'+itemTotal+'</td>';
							html += '<td style="text-align: right;">' +
											'<div class="btn-group">' +
											'<button type="button" data-id="'+item_id+'" class="btn btn-danger removeCart"><i class="fa fa-trash-o"></i></button>'+
											'</div>' +
											'</td>';
							html += '</tr>';
							$("#tbody_sales_cart").html(html);
							// console.log(item_name);
			});
			var intSubTotalcur = Intl.NumberFormat().format(intSubTotal);

			$('#total_allcurr').val(intSubTotalcur);
			$('#total_all').val(intSubTotal);
		};

		$('#search').keyup(function(){
			var word = $(this).val();
			var this_data = '';
			word = word.toLowerCase();

			var search_data = [];

			  $.each(items, function (index, value) {
					var name = value.item_name.toLowerCase();

					if( name.indexOf(word) > -1){
						this_data = {
                        'item_id'		: value.item_id,
                        'item_name' : value.item_name,
												'item_harga_jual' : value.item_harga_jual
												// 'item_status'			: value.item_status
                    }

						search_data.push(this_data);
						// console.log(search_data);
					}
				});
				var no =1;
				var html = '';
				// $("#data_items").empty();
				$("#data_items").html(html);
				$.each(search_data, function (index, value) {
				// 	// var item_name  = value.item_name;
						html += '<tr>\
											<td style="text-align:center;">'+no+'</td>\
											<td id="item-name">'+value.item_name+'\
											<td class="text-right">'+Intl.NumberFormat().format(value.item_harga_jual)+'</td><td class="text-center">\
												<button data-disc="" data-price="'+value.item_harga_jual+'" \
												data-qty="1" data-name="'+value.item_name+'" \
												data-id="'+value.item_id+'" data-has-promo=""\
												data-status-aktif="'+value.status_id+'"\
												data-promo-item-name="" data-promo-gratis="" data-promo-qty="" \
												class="btn btn-success btn-xs btn-add-cart">\
													<i class="fa fa-plus"></i>\
												</button>\
											</td>\
										</tr>';
							no++;
				// 			// console.log(value.item_harga_jual);
						});
						$("#data_items").html(html);

		});

	$("body").on("click", ".btn-decrease-cart", function (event) {
			var qty = $(this).parent().parent().find("input:text");
			var value = qty.val();
			var value = parseInt(value);
      if (value > 1) {
          var item_row = $(this).parent().parent().parent().parent();
          var item_index = item_row.index();
          var this_name = '';
          var this_id = 0;
          var this_price = 0;
          var this_qty = 0;
          var this_total = 0;
          var item_exist = 0;
          var item_exist_index = -1;
          if (add_item_list) {
              $.each(add_item_list, function (index, value) {
                  if (item_index == index) {
                      var qty = value.item_qty - 1;
                      this_name = value.item_name;
                      this_id = value.item_id;
                      this_price = value.item_price;
											this_qty = qty;
                      this_total = value.item_total * this_qty;
                      item_exist = 1;
                      item_exist_index = index;
                  }
              });
          }
  		}
			var new_data = {
                    'item_name': this_name,
                    'item_id': this_id,
                    'item_price': this_price,
                    'item_qty': this_qty,
                };
			add_item_list[item_exist_index] = new_data;
			localStorage.setItem('item_detail', JSON.stringify(add_item_list));
			// console.log(add_item_list);
			$.fn.refreshChart();
      event.preventDefault();
	});

	$("body").on("click", ".btn-increase-cart", function (event) {
		var qty = $(this).parent().parent().find("input:text");
		var value = qty.val();
		var value = parseInt(value);

				var item_row = $(this).parent().parent().parent().parent();
				var item_index = item_row.index();
				var this_name = '';
				var this_id = 0;
				var this_price = 0;
				var this_qty = 0;
				var this_total = 0;
				var item_exist = 0;
				var item_exist_index = -1;
				if (add_item_list) {
						$.each(add_item_list, function (index, value) {
								if (item_index == index) {
										var qty = value.item_qty + 1;
										this_name = value.item_name;
										this_id = value.item_id;
										this_price = value.item_price;
										this_qty = qty;
										this_total = value.item_total * this_qty;
										item_exist = 1;
										item_exist_index = index;
								}
						});
				}

		var new_data = {
									'item_name': this_name,
									'item_id': this_id,
									'item_price': this_price,
									'item_qty': this_qty,
							};
		add_item_list[item_exist_index] = new_data;
		localStorage.setItem('item_detail', JSON.stringify(add_item_list));
		// console.log(add_item_list);
		$.fn.refreshChart();
		event.preventDefault();
	});


	$.fn.getItems();


	$("#form_pijat").submit(function(e) {
		//alert('ok');
		/*e.preventDefault(); // avoid to execute the actual submit of the form.

    	var url = "c-order.php?page=simpan_transaksi";
		var storage_item_detail = JSON.parse(localStorage.getItem('item_detail'));
		// var item_id 	= [];
		// var item_qty 	= [];
		// var item_price = [];

		var paramArr = $("#form_pijat").serializeArray();

		$.each(storage_item_detail, function(index, value){
			  
		  paramArr.push( {name:'item_id[]', value:value.item_id },
		                 {name:'item_qty[]', value:value.item_qty },
		                 {name:'item_price[]', value:value.item_price });

		});
		// var paramArr = $("#form_pijat").serializeArray();
		//   paramArr.push( {name:'item_id[]', value:item_id },
		//                  {name:'item_qty[]', value:item_qty },
		//                  {name:'item_price[]', value:item_price });
*/
    			//var storage_item_detail = JSON.parse(localStorage.getItem('item_detail'));
    			var paramArr = $("#form_pijat").serializeArray();

				$.each(storage_item_detail, function(index, value){
					  
				  paramArr.push( {name:'item_id[]', value:value.item_id },
				                 {name:'item_qty[]', value:value.item_qty },
				                 {name:'item_price[]', value:value.item_price });

				});
				var urlnya = "c-order.php?page=simpan_transaksi";
				$.ajax({
					type: "POST",
					url: urlnya+"&page=simpan_transaksi",
					data:paramArr,			
					success: function(html){ 
						//alert(html);
						//document.location.href="index.php?g=ass&p=arf";
						//self.close();
						//opener.location.reload(true);

					}
				});
});

});
</script>

<script type="text/javascript">
$(document).ready(function() {
  
  //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });

}); 
</script>


<section class="content">
	<div class="col-md-12">
	<?php if(isset($_GET['page']) && $_GET['page'] == "reserved") {
	$keterangan = "reserved"; ?>">
	<h3>RESERVED</h3><?php } else { ?>
	<input type="hidden" name="keterangan" value="<?php echo "order"; ?>">
	<h3>ORDER</h3>
	<?php $keterangan = "order";  } ?>
		<div class="box">
			<div class="box-body">

				<form role="form" id="form_pijat">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-4">
								<div class="form-group">
									<input type="hidden" name="keterangan" value="<?php echo $keterangan; ?>">
									<input type="hidden" name="page" id="page" value="simpan_transaksi">
									<input type="hidden" name="kursi" id="kursi" value="<?=$_GET['kursi']?>">
									<input type="hidden" name="ruangan" id="ruangan" value="<?=$_GET['ruangan']?>">
									<input type="hidden" name="branch" id="branch" value="<?=$_GET['branch']?>">
									<input type="hidden" name="a" id="a" value="<?=$_GET['a']?>">
									<label for="">Tanggal : </label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" required class="form-control pull-right normal"
										id="date_picker1" name="i_date" value="<?= $date ?>"/>
									</div><!-- /.input group -->
								</div>
							</div>
							<div class="col-md-4">
								<div class="bootstrap-timepicker">
					                <div class="form-group">
					                  <label>Jam :</label>

					                  <div class="input-group">
					                    <input type="text" class="form-control timepicker" name="jam" id="jam">

					                    <div class="input-group-addon">
					                      <i class="fa fa-clock-o"></i>
					                    </div>
					                  </div>
					                  <!-- /.input group -->
					                </div>
					                <!-- /.form group -->
					              </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Member :</label>
									<select id="i_member" name="i_member" size="1"
									class="selectpicker show-tick form-control" data-live-search="true" required>
		                      <option value="0"></option>
		                      <?php
		                      $q_member = mysql_query("SELECT * FROM `members` order by member_name ASC");
		                      while($r_member = mysql_fetch_array($q_member)){
		                      ?>
		                     <option value="<?= $r_member['member_id'] ?>" >
								<?= $r_member['member_name']?> [<?= $r_member['member_phone']?>]
							</option>
		                      <?php
		                      }
		                      ?>
		              </select>
								</div>
							</div>
							


							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Pijat :</label>
										<select id="i_pijat" name="i_pijat" size="1" class="selectpicker show-tick form-control"
										data-live-search="true" onchange="set_harga()" required>
	                     <option value="0"></option>
	                      <?php
	                      $q_pijat = mysql_query("SELECT * FROM `pijat` ORDER BY pijat_name ASC");
	                      while($r_pijat = mysql_fetch_array($q_pijat)){
	                      ?>
	                      <option value="<?= $r_pijat['pijat_id'] ?>" data-harga = "<?php echo $r_pijat['pijat_harga'];?>">
	                      	<?= $r_pijat['pijat_name']?>
	                      </option>
	                      <?php
	                      }
	                      ?>
										</select>
									</div>


									<div class="row" id="paketitem"></div>


									<div class="form-group">
										<label>Harga :</label>
										<input required type="text" class="form-control normal" readonly name="grand_total_currency" id="grand_total_currency">
										<input type="hidden" name="pijat_price" id="pijat_price" class="form-control normal"/>
									</div>
									<div class="form-group">
										<label>Pemijat :</label>


										<select id="i_pemijat" name="i_pemijat" size="1" class="selectpicker show-tick form-control"
										data-live-search="true" required>
	                     <option value="0"></option>
	                      <?php
	                      $q_pemijat = mysql_query("SELECT * FROM pemijat WHERE branch_id = $_SESSION[branch_id] AND st_pemijat = 1 ORDER BY nama_pemijat ASC");
	                      while($r_pemijat = mysql_fetch_array($q_pemijat)){
	                      ?>
	                      <option value="<?= $r_pemijat['pemijat_id'] ?>">
	                      	<?= $r_pemijat['nama_pemijat']?>
	                      </option>
	                      <?php
	                      }
	                      ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="row">
									<div class="col-md-6">
										<div class="input-group">
											<input type="text" id="search" class="form-control input-sm normal" placeholder="Cari produk">
											<span class="input-group-btn">
												<button class="btn btn-default btn-sm" type="button">
													<i class="fa fa-search"></i>
												</button>
											</span>
										 </div><!-- /input-group -->
									</div>
									<div class="col-md-6">
										<div class="">
													<input type="text" name="" value="" id="total_allcurr" class="price-tag form-control normal" style="text-align: right;" readonly>
													<input type="hidden" name="" value="" id="total_all" class="price-tag form-control normal">
												</div><!-- /input-group -->
									</div>
								</div>
								<div class="col-md-6">
										<div id="" class="panel panel-default panel-item">
											<div class="row">
											<table id="table_item" class="table my-item" style="font-size: 12px;">
		                      <thead>
		                        <tr>
								 								<th width="5%">No.</th>
		                          	<th width="50%">NAMA ITEM</th>
		                          	<th class="text-right">HARGA</th>
		                          	<th class="text-center"><i class="fa fa-th"></i></th>
		                        </tr>
		                      </thead>
		                      <tbody class="" id="data_items" class="scrollable">

		                      </tbody>
		                    </table>
										</div>
									</div>
								</div>
									<div class="col-md-6">
										<div class="panel panel-default panel-item">
										<table class="table my-item">
											<thead>
												<tr>
													<th class="text-center" style="width:10%;">QTY</th>
													<th width="40%">ITEM</th>
													<th style="">HARGA</th>
													<th class="text-center hide" id="sales-column-discount">DISC</th>
													<th class="text-right">TOTAL</th>
													<th width="13%" class="text-center"><i class="fa fa-th"></i></th>
												</tr>
											</thead>
											<tbody id="tbody_sales_cart">

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer" style="background-color: #fff; border-color:#ddd;">
	            <button id="" type="submit" class="btn btn-danger">Save</button>
	            <a href="c-order.php">
								<button type="button" name="button" class="btn btn-default" >
									Close
								</button>
							</a>
	        </div>
				</form>
			</div>
		</div>
	</div>
</section>
