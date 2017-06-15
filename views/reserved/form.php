<style type="text/css">
    .dropdown-menu {
        color: #000;
    }
</style>
        <!-- header logo: style can be found in header.less -->
           <?php
                if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-warning alert-dismissable">
                <i class="fa fa-warning"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan Gagal !</b>
               <!--      --> 
                </div>
           
                </section>
                <?php
                }
                ?>
                
                 <!-- Main content -->
<form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
    <section class="content">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
            <!-- general form elements disabled -->
                <div class="title_page"> <?= $title ?></div>

                    <div class="box box-cokelat">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <label>Tanggal </label>
                                            <div class="input-group">

                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $row->date ?>"/>
                                            </div><!-- /.input group -->
                                        </div>
                                    </div>
                                </div>

                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <label>Jam</label>
                                                <div class="input-group">                                            
                                                    <input type="text" id="" name="i_hour" class="form-control timepicker" value="<?= $row->hour?>"/>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                </div><!-- /.input group -->
                                            </div>
                                        </div>
                                    </div><!-- /.form group -->
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                        <label>Nama</label>
                                        <select id="i_member_id" name="i_member_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                        <option value="0"></option>
                                        <?php
                                        while($r_member = mysql_fetch_array($query_member)){
                                        ?>
                                        <option value="<?= $r_member['member_id'] ?>" <?php if($row->member_id == $r_member['member_id']){ ?> selected="selected"<?php } ?>><?= $r_member['member_name']?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>  
                                        </div>
                                        <div class="col-md-3">
                                            <button style="margin-top: 23px;" data-toggle="modal" data-target="#modal_member" class="btn btn-info">
                                            <span class="glyphicon glyphicon-plus"></span>Tambah Member
                                            </button>
                                        </div>
                                    </div>  
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <label>Telepon</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                            <input min="0" required class="form-control" type="number" id="i_phone" name="i_phone" placeholder="Masukkan telepon ..." value="<?= $row->phone?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <label>Alamat</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                                <input required type="text" id="i_address" name="i_address" class="form-control" placeholder="masukkan alamat ..." value="<?= $row->address?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <label>Pijat</label>
                                           <select id="i_pijat_id" name="i_pijat_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <option value="0"></option>
                                            <?php
                                            while($r_pijat = mysql_fetch_array($query_pijat)){
                                            ?>
                                            <option value="<?= $r_pijat['pijat_id'] ?>" <?php if($row->pijat == $r_pijat['pijat_id']){ ?> selected="selected"<?php } ?>><?= $r_pijat['pijat_name']?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div style="clear:both;"></div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input class="btn btn-danger" type="submit" value="Save"/>
                            <a href="<?= $close_button?>" class="btn btn-default" >Close</a>
                        </div>
                    </div><!-- /.box -->

            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</form>

<!-- modal input stock -->
<div id="modal_member" class="modal fade" name="medium_modal">
  <form action="reserved.php?page=save_add_member" method="post">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color: #fff;" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Tambah Stock</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label>Nama </label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                        <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama member..." value="<?= $row->member_name ?>"/>
                </div>
            </div>
            <div class="form-group">
               <label>Telepon</label>
               <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                   <input required min="0" type="number" id="" name="i_telepon" class="form-control" placeholder="Masukkan telepon member..." value="<?= $row->member_phone ?>"/>
               </div>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                    </div>
                <input required type="text" name="i_alamat" class="form-control" placeholder="Masukkan alamat..." value="<?= $row->member_alamat ?>"/>
                </div>
             </div> 
             <div class="form-group">
                <label>Email</label>
                <input required type="email" name="i_emails" class="form-control" placeholder="Masukkan email member..." value="<?= $row->member_email ?>"/>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#i_member_id').on('change', function(){
            var i_member_id = $(this).val();
            $.ajax({
                type        : "post",
                data        : {i_member_id:i_member_id},
                dataType    : "json",
                url         : "reserved.php?page=get_member_details",
                success     : function(data){
                   $('#i_phone').val(data.member_phone);
                   $('#i_address').val(data.member_alamat);
                }
            })
        });
    });
</script>