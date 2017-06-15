 <style type="text/css">
   .skin-blue .sidebar > .sidebar-menu > li,
   .treeview>a{
    background-color: rgb(153, 117, 161);
    border-color: #361563;
   }
 </style>
 <aside class="left-side sidebar-offcanvas <?php /*if($_SESSION['menu_active'] == 3){ ?>collapse-left <?php }*/ ?>">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php
                             $user_data = get_user_data();
              if($user_data[2]==""){
                $img = "../img/user/business_user.png";
              }else{
                $img = "../img/user/".$user_data[2];
              }
              ?>
                            <img src="<?=$img?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php

                                        echo "Welcome, ".$user_data[0];
                                        ?></p>

                            <a href="#"><?=$user_data[2]?></a>
                        </div>



                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->

                 <ul class="sidebar-menu">
                 <?php
                 //echo "=====".$user_data[3];
                 $menu_lv1 = menu_lv1($user_data[3]);

                 while($row = mysql_fetch_array($menu_lv1)){
                 $cek_menu_lv2 = cek_menu_lv2($user_data[3],$row['side_menu_id']);
                 $menu_lv2 = menu_lv2($user_data[3],$row['side_menu_id']);

                 ?>
                  <li <?php if($cek_menu_lv2 != 0){ ?> class="treeview" <?php } ?> >
                            <a href="<?=$row['side_menu_url']?>">
                                 <i class="<?=$row['side_menu_icon']?>"></i>
                                <span><?=$row['side_menu_name']?></span>
                                <?php if($cek_menu_lv2 != 0){?> <i class="fa fa-angle-left pull-right"></i><?php }?>
                            </a>

                            <?php
                            if($cek_menu_lv2){
                              ?>
                              <ul class="treeview-menu">
                              <?php
                              while($row2 = mysql_fetch_array($menu_lv2)){
                              ?>
                                <li><a href="<?=$row2['side_menu_url']?>"><?=$row2['side_menu_name']?></a></li>
                              <?php
                              }
                              ?>
                              </ul>
                              <?php
                            }
                            ?>
                  </li>

                 <?php
                 }
                 ?>
            </aside>
