
             
                    <div class="row">
                    <?php
                    $example = 1;
                    while($row_partner = mysql_fetch_array($query_partner)){
                    ?>
                        <div class="col-md-12">
                        <div class="otheader_title"><?= $row_partner['partner_name']?></div>
                        </div>

                         
                        <div class="col-md-12">
                            
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example_nopagination1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Menu </th>
                                                <th>Tipe </th>
                                                <th>Harga</th>
                                                <th>Config </th>
                                                  
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query_menu = mysql_query("select a.*, b.menu_type_name
                                                from menus a    
                                                join menu_types b on b.menu_type_id = a.menu_type_id
                                                where partner_id = '".$row_partner['partner_id']."'
                                                order by menu_id");
                                            while($row_menu = mysql_fetch_array($query_menu)){
                                            ?>

                                            <tr>
                                            <td><?= $no?></td>
                                               <td><?= $row_menu['menu_name']?></td>
                                               <td><?= $row_menu['menu_type_name']?></td>
                                               <td style="text-align:right;"><?= number_format($row_menu['menu_price'],0)?></td>
                                               <td style="text-align:center;">
                                                    <?php
                                                    $check_status = check_exist($id, $row_menu['menu_id']); 
                                                    ?>
                                                   <input type="checkbox" name="i_check_<?= $row_menu['menu_id'] ?>" value="1" <?php if($check_status > 0){ ?>checked="checked"<?php } ?>>

                                                </td> 
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                    
                                          
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                           
                        </div>

                        <?php
                            $example++;
                        }
                        ?>
                    </div>

                </form>
                    
                    

              