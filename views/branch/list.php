  <?php
  if(isset($_GET['did']) && $_GET['did'] == 1){ ?>
    <section class="content_new">
      <div class="alert alert-info alert-dismissable">
        <i class="fa fa-check"></i>
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
        <b>Sukses !</b>
        Simpan Berhasil
      </div>
    </section>
  <?php
  }else if(isset($_GET['did']) && $_GET['did'] == 2){ ?>
    <section class="content_new">
      <div class="alert alert-info alert-success">
        <i class="fa fa-check"></i>
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
        <b>Sukses !</b>
        Edit Berhasil
      </div>
    </section>
  <?php
  }else if(isset($_GET['did']) && $_GET['did'] == 3){?>
    <section class="content_new">
      <div class="alert alert-info alert-dismissable">
        <i class="fa fa-check"></i>
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
        <b>Sukses !</b>
        Delete Berhasil
      </div>
    </section>
  <?php } ?>
<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="title_page"> <?= $title ?></div>
        <div class="box">
          <div class="box-body2 table-responsive">
            <div class="col-md-12">
              <table id="example1" class="table table-bordered table-striped">
              <thead style="background-color: #9975a1; color: #fff;">
                <tr>
                  <th width="5%">No</th>
                  <th>Nama Cabang</th>
                  <th>Telepon</th>
                  <th>kota</th>
                  <th>Config</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $no = 1;
              while($row = mysql_fetch_array($query)){ ?>
                    <tr>
                      <td><?= $no?></td>
                      <td><?= $row['branch_name']?></td>
                      <td><?= $row['branch_phone'] ?></td>
                      <td><?= $row['branch_city'] ?></td>
                      <td style="text-align:center;">
                        <a href="branch.php?page=form&id=<?= $row['branch_id']?>" class="btn btn-default" >
                          <i class="fa fa-pencil"></i>
                        </a>
                        <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['branch_id']; ?>,'branch.php?page=delete&id=')"class="btn btn-default">
                          <i class="fa fa-trash-o"></i>
                        </a>
                      </td>
                    </tr>
              <?php $no++; } ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5">
                    <a href="<?= $add_button ?>" class="btn btn-danger">Add</a>
                  </td>
                </tr>
              </tfoot>
            </table>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>
  </section><!-- /.content -->
