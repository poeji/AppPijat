<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<form class="" id="form_add_infrastruktur">
  <div class="modal-body">
    <label for="" style="font-size:12px;color:#000;font-family:arial;">Infrastruktur</label>
    <input type="hidden" id="ruangan_id" name="ruangan_id" value="<?= $ruangan_id?>">
    <select class="selectpicker form-control" id="infrastruktur_id" name="infrastruktur_id" onchange="get_img_infrastruktur()">
      <option value="0"></option>
      <?php while ($r_infrastruktur = mysql_fetch_array($q_infrastruktur)) {?>
        <option value="<?= $r_infrastruktur['infrastruktur_id']?>"><?= $r_infrastruktur['infrastruktur_name']?></option>
      <? } ?>
    </select>
    <div class="form-group">
      <label for="" style="font-size:12px;color:#000;font-family:arial;">Nama Infrastruktur</label>
      <input type="text" name="inf_name" class="form-control" value="">
    </div>
  </div>
  <input type="hidden" id="infrastruktur_img" name="infrastruktur_img" value="">
  <div class="modal-footer">
    <button type="button" name="button" class="btn btn-warning" onclick="add_infrastruktur()">Simpan</button>
  </div>
</form>
<script type="text/javascript">

  function get_img_infrastruktur(){
    var infrastruktur_id = $('#infrastruktur_id').val();
    $.ajax({
      type    : 'POST',
      url     : 'infrastruktur_setting.php?page=get_img_infrastruktur',
      data    : {infrastruktur_id:infrastruktur_id},
      dataType: 'json',
      success : function(data){
        $('#infrastruktur_img').val(data);
      }
    })
  }

  $('.selectpicker').selectpicker('refresh');

  function add_infrastruktur(){
    var infrastruktur_img = $('#infrastruktur_img').val();
    $.ajax({
      type    : 'POST',
      url     : 'infrastruktur_setting.php?page=save_infrastruktur',
      data    : $('#form_add_infrastruktur').serialize(),
      dataType: 'json',
      success : function(data){
        $('#ruangan_box').prepend($('<img>',{id:'theImg_'+data, name:'theImg_'+data, src:'../img/infrastruktur/'+infrastruktur_img}))
        // $('#theImg_'+data).draggable( {
        //   containment: '#ruangan_box',
        //   cursor: 'move',
        //   snap: '',
        //   stop: ''
        // } );
        $('#theImg_'+data).draggable({
            stack: "#ruangan_box",
            stop: function(event, ui) {
                var pos_x = ui.offset.left;
                var pos_y = ui.offset.top;
                var need = ui.helper.data("need");

                console.log(pos_x);
                console.log(pos_y);
                console.log(data);

                //Do the ajax call to the server
                $.ajax({
                    type: "POST",
                    url: "infrastruktur_setting.php?page=save_infrastruktur_location",
                    data: { x: pos_x, y: pos_y, ruangan_infrastruktur_id: data}
                  }).done(function( msg ) {
                    // alert( "Data Saved: " + msg );
                  });
          }
        });
        $('#medium_modal').modal('hide');
      }
    });
  }



</script>
