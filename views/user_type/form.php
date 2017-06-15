<style type="text/css">
  .tampil{
    opacity: 1 !important;
  }
  .box-body {
      background-color: #fff!important;
  }
  .box-footer{
    background-color: rgba(#bf00d5, 0.92)!important;
  }

  input[type=checkbox].css-checkbox {
    position:absolute; z-index:-1000; left:-1000px; overflow: hidden; clip: rect(0 0 0 0); height:1px; width:1px; margin:-1px; padding:0; border:0;
  }

  input[type=checkbox].css-checkbox + label.css-label {
    padding-left:25px;
    height:20px;
    display:inline-block;
    line-height:20px;
    background-repeat:no-repeat;
    background-position: 0 0;
    font-size:20px;
    vertical-align:middle;
    cursor:pointer;
  }

  input[type=checkbox].css-checkbox:checked + label.css-label {
    background-position: 0 -20px;
  }

  label.css-label {
    background-image:url(http://csscheckbox.com/checkboxes/u/csscheckbox_1a184d81ea2bbeb14c864c76dd9c1bfc.png);
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
</style>

<!-- Content Header (Page header) -->

  <?php
  if(isset($_GET['did']) && $_GET['did'] == 1){
    include '../models/user_type_model.php';
  ?>
  <section class="content_new">
      <div class="alert alert-info alert-dismissable">
        <i class="fa fa-check"></i>
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
        <b>Simpan gagal !</b>
        Password dan confirm password tidak sama
      </div>
  </section>
  <?php } ?>
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
            <!-- text input -->
            <!-- <div class="form-group">
            <label>Code</label>
            <input required type="text" name="i_code" class="form-control" placeholder="Enter code ..." value="<?= $row->user_code ?>"/>
            </div>-->
              <div class="col-md-12" style="color: #000;">
                <div class="form-group">
                  <label>Name</label>
                  <input required type="text" name="i_name" class="form-control" placeholder="Enter name ..." value="<?= $row->user_type_name ?>"/>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form_category col-md-9 col-sm-9 col-xs-9" >Menu</div>
                  <div class="form_category col-md-3 col-sm-3 col-xs-3" style="text-align:center">Hak Akses</div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div style="padding-top:10px;" class="item form-group" >
                  <label class="control-label col-md-9 col-sm-9 col-xs-9" for="name" style="text-align:left;"></label>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <p style="font-size:20px;"><strong>&nbsp;&nbsp;&nbsp; C &nbsp;&nbsp;R &nbsp;&nbsp;U &nbsp;&nbsp;&nbsp;D</strong></p>
                    </div>
                  </div>
                <?php
                $user_type_id = $row->user_type_id;
                $query = manu($user_type_id);
                while($row = mysql_fetch_array($query)){ ?>
                <div class="form-group" >
                <label class="control-label col-md-9 col-sm-9 col-xs-9" for="name" style="text-align:left; border-bottom-style:inset; color: #000;">
                  <?=$row['side_menu_name']?>
                </label>
                <?php if($row['side_menu_type_parent'] == 1){ ?>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label style="text-align:left; padding-left:1em;"></label>
                        <input type="checkbox" name="permit<?=$row['side_menu_id']?>[]"
                        <?php if(isset($row['permit_acces'])) if (strpos($row['permit_acces'], 'c') !== false){?>checked="checked"<?php }?> value="c"/>
                        <label style="text-align:left; padding-left:1em;"></label>
                        <input type="checkbox" name="permit<?=$row['side_menu_id']?>[]"
                        <?php  if(isset($row['permit_acces'])) if (strpos($row['permit_acces'], 'r') !== false){?>checked="checked"<?php }?> value="r"/>
                        <label style="text-align:left; padding-left:1em;"></label>
                        <input type="checkbox" name="permit<?=$row['side_menu_id']?>[]"
                        <?php if(isset($row['permit_acces'])) if (strpos($row['permit_acces'], 'u') !== false){?>checked="checked"<?php }?> value="u"/>
                        <label style="text-align:left; padding-left:1em;"></label>
                        <input type="checkbox" name="permit<?=$row['side_menu_id']?>[]"
                        <?php if(isset($row['permit_acces'])) if (strpos($row['permit_acces'], 'd') !== false){?>checked="checked"<?php }?> value="d"/>
                      </div>
                <?php } ?>
                </div>
                <?php
                $query2 = menu_parent($row['side_menu_id'],$user_type_id);
                while($row2 = mysql_fetch_array($query2)){?>
                  <div class="item form-group" >
                    <label class="control-label col-md-9 col-sm-9 col-xs-9" for="name" style="text-align:left; padding-left:5em; color: #000; border-bottom-style:inset;">
                      <?=$row2['side_menu_name']?>
                    </label>
                    <?php if($row2['side_menu_url'] != '#'){?>
                          <div class="col-md-3 col-sm-3 col-xs-3">
                            <label style="text-align:left; padding-left:1em;"></label>
                            <input type="checkbox" name="permit<?=$row2['side_menu_id']?>[]"
                            <?php if(isset($row2['permit_acces'])) if (strpos($row2['permit_acces'], 'c') !== false){?>checked="checked"<?php }?> value="c"/>
                            <label style="text-align:left; padding-left:1em;"></label>
                            <input type="checkbox" name="permit<?=$row2['side_menu_id']?>[]"
                            <?php  if(isset($row2['permit_acces'])) if (strpos($row2['permit_acces'], 'r') !== false){?>checked="checked"<?php }?> value="r" />
                            <label style="text-align:left; padding-left:1em;"></label>
                            <input type="checkbox" name="permit<?=$row2['side_menu_id']?>[]"
                            <?php if(isset($row2['permit_acces'])) if (strpos($row2['permit_acces'], 'u') !== false){?>checked="checked"<?php }?> value="u"/>
                            <label style="text-align:left; padding-left:1em;"></label>
                            <input type="checkbox" name="permit<?=$row2['side_menu_id']?>[]"
                            <?php if(isset($row2['permit_acces'])) if (strpos($row2['permit_acces'], 'd') !== false){?>checked="checked"<?php }?> value="d"/>
                          </div>
                    <?php }?>
                  </div>
                <?php }
                } ?>
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
