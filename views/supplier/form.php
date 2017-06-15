<script type="text/javascript">
		  function grand_total()
			{
				
				var harga = parseFloat(document.getElementById("i_harga").value);
				var qty = parseFloat(document.getElementById("i_qty").value);
				
					
				var	total = harga * qty;
				
				
				
				document.getElementById("i_total").value = total;
				
			}

		   </script>
<!-- Content Header (Page header) -->
        

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          <div class="title_page"> <?= $title ?></div>

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                    
                                        <div class="col-md-12">
                                        
                                        <div class="form-group">
                                            <label>Nama Supplier</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama supplier..." value="<?= $row->supplier_name ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>No Telp</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input required min="0" type="number" name="i_telp" id="i_telp" class="form-control" placeholder="Masukkan nomor telepon..." value="<?= $row->supplier_phone ?>"/>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label>Email</label>
                                            <input required type="email" name="i_email" id="i_email" class="form-control" placeholder="Masukkan email..." value="<?= $row->supplier_email ?>"/>
                                        </div>
                                        <div class="form-group">
                                          <label>Alamat</label>
                                          <textarea name="i_alamat" id="i_alamat" cols="45" rows="5" class="form-control"><?= $row->supplier_addres ?></textarea>
                                        </div>
                                        </div>
                                        
                                       
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                    <input class="btn btn-danger" type="submit" value="Save"/>
                                    <a href="<?= $close_button?>" class="btn btn-default" >Close</a>
                                 </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->