<?php

if(!$_SESSION['login']){
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>.: Kedai Taman :.</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Popup Modal -->
        <link href="../css/popModal.css" type="text/css" rel="stylesheet" >
        <!-- Preview -->
        <link href="../css/preview.css" type="text/css" rel="stylesheet" >
         <!-- iCheck for checkboxes and radio inputs -->
        <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
         <!-- daterange picker -->
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap time Picker -->
        <link href="../css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <!-- datepicker -->
       <link href="../css/datepicker/datepicker.css" rel="stylesheet">

       <link rel="stylesheet" type="text/css" href="../css/style_table.css" />
    <!-- tooltip -->
    <link rel="stylesheet" type="text/css" href="../css/tooltip/tooltip-classic.css" />
    <!-- button component-->
    <link rel="stylesheet" type="text/css" href="../css/button_component/component.css" />
    <link rel="stylesheet" type="text/css" href="../css/button_component/content.css" />
       
       <!-- lookup -->
       <link rel="stylesheet" type="text/css" href="../css/lookup/bootstrap-select.css">
       <!-- Button -->
	   <link rel="stylesheet" type="text/css" href="../css/button/component.css" />
       <!-- tooptip meja -->
       <link rel="stylesheet" type="text/css" href="../css/tooltip/tooltip-classic.css" />
      
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <!-- footable 
           <link href="../css/footable/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css"/>
            <link href="../css/footable/footable.standalone.css" rel="stylesheet" type="text/css"/>
           
           
            <script src="../js/footable/footable.js?v=2-0-1" type="text/javascript"></script>
            <script src="../js/footable/footable.sort.js?v=2-0-1" type="text/javascript"></script>
            <script src="../js/footable/footable.filter.js?v=2-0-1" type="text/javascript"></script>
            <script src="../js/footable/footable.paginate.js?v=2-0-1" type="text/javascript"></script>
            <script src="../js/footable/bootstrap-tab.js" type="text/javascript"></script>
         -->

        <!-- jQuery 2.0.2 -->
       <script src="../js/jquery.js"></script>
        <script src="../js/function.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
         <script type="text/javascript">
		  function update_discount(){
			 var total = parseFloat(document.getElementById("i_total").value);
			 var discount = parseFloat(document.getElementById("i_discount").value);
			 
			 if(discount > total){
				 alert("Discount tidak boleh melebihi total harga");
				 document.getElementById("i_discount").value = 0;
				 document.getElementById("i_grand_total").value = total;
		     }else{
			 	var grand_total = total - discount;
				document.getElementById("i_grand_total").value = grand_total;
				document.getElementById("i_payment").value = grand_total;
			 }
		  }
		  
		  function update_change()
			{
				
				var bayar = parseFloat(document.getElementById("i_payment").value);
				var total = parseFloat(document.getElementById("i_grand_total").value);
				
				
				if(bayar < total ){
					alert("Pembayaran tidak boleh lebih kecil dari Total Pembelian");
					kembali = 0;
				}else{
					
					kembali = bayar - total;
				}
				
				
				document.getElementById("i_change").value = kembali;
				
			}
			
			
			function payment_method(id){
				var bank_frame = document.getElementById("bank_frame");
				if(id == 1){
					bank_frame.style.display = 'none';
				}else{
					bank_frame.style.display = 'table-cell';
				}
			}

		   </script>

    </head>
    <body class="skin-blue">


 <div class="header_fixed"> 
 

          <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
            <button class="blue_color_button"  type="button"  onClick="javascript: window.location.href = 'order.php'; ">BACK TO ORDER</button>
            
          </div><!-- morph-button -->

          <div class="logo_order"></div>

         
 </div>

<br>
<br>
<br>
        <!-- header logo: style can be found in header.less -->
           <?php
                if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-warning alert-dismissable">
                <i class="fa fa-warning"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan Gagal !</b>
               Pembayaran tidak boleh lebih kecil dari total
                </div>
           
                </section>
                <?php
                }
				?>
     
          <!-- Main content -->
          <br>
                <section class="content">
                  <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-md-offset-1">
                            
                            <div class="box">
                             <div class="payment_title">bayar bill</div>
                                <div class="box-body2 table-responsive">
                                <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                             <th >No</th>
                                            <th>Menu</th>
                                            <th align="right">Qty</th>
                                            <th align="right">Harga</th>
                                            <th align="right">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no_item = 1;
  											$total_price = 0;
										   while($row_item = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><?= $no_item ?></td>
                                            <td valign="top"><?= $row_item['menu_name'] ?></td>
                                            <td align="right" valign="top"><?= $row_item['transaction_detail_qty'] ?></td>
                                            <td align="right" valign="top"><?= number_format($row_item['transaction_detail_grand_price']) ?></td>
                                            <td align="right" valign="top"><?= number_format($row_item['transaction_detail_total']) ?></td>
                                            </tr>
                                            <?php
											$no_item++;
											 $total_price = $total_price + $row_item['transaction_detail_total'];
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          
                                       
                                         <tfoot>
                                            
                                            <tr>
                                                <td colspan="2" style="font-size:20px;">Total </td>
                                                <td colspan="3" style="text-align:right; font-size:20px;" ><?= number_format($total_price)?> 
                                                 <input required type="hidden" name="i_total" id="i_total" class="form-control" value="<?= ($total_price)?>" style="text-align:right; font-size:30px; height:50px;" readonly/>
                                                </td>
                                               
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="font-size:20px;">Discount </td>
                                                <td colspan="3" style="text-align:right; font-size:20px;" >
                                                 <input required type="text" name="i_discount" id="i_discount" class="form-control" value="0" style="text-align:right; font-size:20px;" onChange="update_discount()"/>
                                                </td>
                                               
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="font-size:20px;">Grand Total </td>
                                                <td colspan="3" style="text-align:right; font-size:20px;" >
                                                 <input required type="text" name="i_grand_total" id="i_grand_total" class="form-control" value="<?= ($total_price)?>" style="text-align:right; font-size:20px;" readonly/>
                                                </td>
                                               
                                            </tr>
                                              <tr>
                                                <td colspan="2"> <div class="form-group">
                                            <label>Kembali</label>
                                            <input required type="text" name="i_change" id="i_change" class="form-control" value="0" readonly style="text-align:right; font-size:30px; height:50px;"/>
                                        </div>  </td>
                                                 <td colspan="3">
                                                 <div class="form-group">
                                            <label>Bayar</label>
                                            <input required type="number" name="i_payment" id="i_payment" class="form-control" value="<?= ($total_price) ?>" style="text-align:right; font-size:30px; height:50px;" onChange="update_change()" />
                                        </div>
                                                   </td>
                                               
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="font-size:36px;"> 
                                                
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:20px;">
  <tr>
    <td align="center">
                                                <label>
                                                    <input type="radio" name="i_payment_method" id="i_payment_method" value="1" checked onclick="payment_method(1)">
                                                   Cash
                                                </label>
                                            
                                            </td>
    <td align="center">
                                                <label>
                                                    <input type="radio" name="i_payment_method" id="i_payment_method" value="2" onclick="payment_method(2)">
                                                   Debit
                                                </label>
                                            </td>
    <td align="center"><label>
                                                    <input type="radio" name="i_payment_method" id="i_payment_method" value="3" onclick="payment_method(3)">
                                                   Credit
                                                </label></td>
  </tr>
</table>

                                                
                                                 </td>
                                               
                                               
                                            </tr>
                                            <tr>
                                                <td colspan="5" style=" display:none;"  id="bank_frame">
                                                <select id="basic" name="i_bank_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
										   $q_bank = mysql_query("select * from banks order by bank_id");
                                           while($r_bank = mysql_fetch_array($q_bank)){
                                            ?>
                                             <option value="<?= $r_bank['bank_id'] ?>"><?= $r_bank['bank_name']?></option>
                                             <?php
                                             }
                                             ?>
                                           </select>     
                                                 </td>
                                               
                                               
                                            </tr>
                                             <tr>
                                                <td colspan="5" style="font-size:36px;"> <button type="submit" class="btn btn-info btn-block" style="height:80px; font-weight:bold; font-size:22px;">BAYAR</button> 
                                                
                                                 </td>
                                               
                                               
                                            </tr>
                                        </tfoot>
                                    
                                        
                                    </table>
						</form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>

                        <div class="col-md-3">
                        </div>

                    </div>
                  </div>
                </section><!-- /.content -->
       
    </body>
</html>

       

 <!-- page script -->
        <script type="text/javascript">
            $(function() {
               
 				$('#example_simple').dataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": false,
                    "bInfo": false,
                    "bAutoWidth": false
                });
			
				
            });
			
		
          
        </script>