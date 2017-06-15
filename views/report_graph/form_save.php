<!-- Content Header (Page header) -->
               <section class="content-header">
                    <h1>
                        <?= $title?> 
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>  <?= $title?> </a></li>
                        
                        <li class="active">Form</li>
                    </ol>
                </section>
				 <?php
                if(isset($_GET['add']) && $_GET['add'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
                Data agent berhasil di inputkan
                </div>
           
                </section>
                <?php
                }
                ?>
               <?php
                if(isset($_GET['ok']) && $_GET['ok'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
                Data Berhasil di save
                </div>
           
                </section>
                <?php
                }
                ?>
                 <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Create Event berhasil
               Silahkan inputkan trainer
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

                          
                          

                             <form role="form" action="<?= $action?>" method="post">

                            <div class="box box-danger">
                                
                               
                                <div class="box-body">
                                    
                                        <!-- text input -->
                                         <div class="form-group">
                                            <label>Event Name</label>
                                            <input required type="text" readonly="readonly" name="event_name" class="form-control" placeholder="Enter ..." value="<?= $row->transaction_name ?>"/>
                                        </div>
                             
                                         <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" name="event_date" value="<?= $all_date ?>" readonly="readonly"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                
                                        <div class="form-group">
                                            <label>Event Hour</label>
                                            <input required type="text" readonly name="event_hour" class="form-control" placeholder="Enter ..." value="<?= $row->transaction_hour ?>"/>
                                        </div>
 

                                        <div class="form-group">
                                        <label>Event Type</label>
                                        <select class="form-control" name="type_id" readonly>
                                        <?php
                                        $query_city = mysql_query("select * from transaction_types");
                                        while($row_type = mysql_fetch_array($query_city)){
                                        ?>
                                        <option value="<?= $row_type['transaction_type_id']?>" <?php if($row_type['transaction_type_id'] == $row->transaction_type_id){ ?>selected <?php } ?>><?= $row_type['transaction_type_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                 		
                                        
                                        <div class="form-group">
                                        <label>Units</label>
                                        <select class="form-control" name="unit_id" readonly>
                                        <?php
                                        $query_city = mysql_query("select * from units");
                                        while($row_unit = mysql_fetch_array($query_city)){
                                        ?>
                                        <option value="<?= $row_unit['unit_id']?>" <?php if($row_unit['unit_id'] == $row->unit_id){ ?>selected <?php } ?>><?= $row_unit['unit_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                       <div class="form-group">
										<label>Event description</label>
										<textarea required class="form-control"  readonly name="event_description" rows="3" placeholder="Enter ..."><? echo $row->transaction_description ?></textarea>	
										</div>
                                      
                                       
                                      
                                   
                                </div><!-- /.box-body -->
                               
                            
                            </div><!-- /.box -->
                       </form>
             