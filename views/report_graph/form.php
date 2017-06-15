<!-- Content Header (Page header) -->
<!--<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });
});
</script>-->

                 <?php
                if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">

                <div class="alert alert-danger alert-dismissable">
                <i class="fa fa-warning"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
               Data Item masih kosong
                </div>

                </section>
                <?php
                }
				?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">

                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->


                           <div class="title_page"> <?= $title ?></div>

                             <form role="form" action="<?= $action?>" method="post">

                            <div class="box box-primary">
                                <div class="box-body">
                                    	<div class="col-md-12">
                                          <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group">
                                            <div class="input-group-lg">
                                                <input type="radio" required id="reservdate" name="i_date_res" value="By Date" checked/><label>By date</label>
                                                <input type="radio" required id="reservdate2" name="i_date_res" value="By Date"/><label>By Month</label>
                                            </div>
                                        </div>
                                        <div id="dates2">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                                <input type="text" class="form-control pull-right" id="reservationtime" name="i_date" value="<?= $date_default?>"/>
                                        </div></br>
                                        </div>
                                        <div id="dates1" hidden>
                                        <label>Start Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker_custom" name="date_awal" value="<?= $date_default2?>"/>
                                        </div></br>
                                        <label>End Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker_custom2" name="date_akhir" value="<?= $date_default3?>"/>
                                        </div></br>
                                        </div>
                                        <!-- /.input group -->
                                    </div><!-- /.form group -->





                                          </div>


                                              <div style="clear:both;"></div>


                                </div><!-- /.box-body -->


								<div class="box-footer">
									<input class="btn btn-danger" type="submit" value="Preview Report"/>
									<!--<input class="btn btn-primary" type="button" id="excela" value="Cetak Graph Menu" onclick="saveexcel('a')"/>-->
									<input class="btn btn-primary" type="button" id="excela" value="Cetak Graph Sales" onclick="saveexcel('b')"/>
                                </div>

                            </div><!-- /.box -->


                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
              <script>
				$(function(){
					saveexcel = function(a){
						if(($("#datepicker_custom").val() == "")||($("#datepicker_custom2").val() == "")) {
							alert("Range Tanggal Belum Dipilih");
						}else{
							if(a=='a'){
								window.open('print.php?page=graph&c='+a+'&date='+$("#reservationtime").val(), '_blank');
							}else{
								window.open('print.php?page=graph&c='+a+'&date='+$("#reservationtime").val(), '_blank');
							}
						}
					}
				});
              </script>
