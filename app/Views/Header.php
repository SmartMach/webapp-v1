<nav class="navbar sticky-top navbar-expand-lg topnav" style="top:0;position:fixed;width:100%;">
    <div class="container-fluid">
        <img id="smartlogo" src="<?php echo base_url()?>/assets/img/logo.png?version=<?php echo rand() ; ?>" alt="SmartMach Logo">
        <?php 
                $condition = $this->data['user_details'][0]['role'];
                $condition1 = $this->data['user_details'][0]['site_id'];
                $session = \Config\Services::session();
                if($condition1 == "smartories"){
                    if($session->get('active_site')){
                        if(($condition == "Smart Admin") || ($condition == "Smart Users")){
                            ?>
                            <div class="box site_based_header_visibility" style="margin-top:1.4rem;" >
                            <label class="" style="margin-top:-0.5rem;position:fixed;margin-left:0.6rem;z-index:1;background:white;font-size:12px;color:#8c8c8c;">Site Name</label>
                                <div class="input-box fieldStyle">
                                    <select name="site_id" id="site_id" class="form-select font_weight_modal" required="true">
                                       <!-- temporary aligning -->
                                        <option value="<?php echo $session->get('active_site').'-'.$session->get('active_site_name'); ?>" selected="selected" disabled="true"><?php echo $session->get('active_site_name').'-'.$session->get('active_site'); ?></option>
                                    </select>
                                </div>
                            </div>


                            <!-- existing selected site -->
                            <!-- <div class="box site_based_header_visibility" style="margin-top:1.4rem;" >
                                <div class="input-box fieldStyle">
                                    <select name="site_id" id="site_id" class="form-select font_weight_modal" required="true">

                                    </select>
                                </div>
                            </div> -->
                            <!-- <select name="site_id" id="site_id" required="true"> -->
                                <!-- <option value="<?php echo $session->get('active_site'); ?>" ><?php echo $session->get('active_site'); ?></option> -->
                            <!-- </select> -->
                            
                            <?php
                        }
                    }else{
                        if(($condition == "Smart Admin") || ($condition == "Smart Users")){
                            ?>
                            <!-- <select name="site_id" id="site_id" required="true">
                                    <option value=" " selected="true" disabled>Select Site</option>
                            </select> -->
                            <div class="box  site_based_header_visibility" style="margin-top:1.4rem;" >
                            <label class="" style="margin-top:-0.5rem;position:fixed;margin-left:0.4rem;z-index:1;background:white;font-size:12px;color:#8c8c8c;">Site Name</label>
                                <div class="input-box fieldStyle">
                                    <select name="site_id" id="site_id" class="form-select font_weight_modal" required="true">
                                        <option value=" " selected="true" disabled>Select Site</option>
                                    </select>
                                </div>
                            </div>
                            
                            <?php
                        }
                    }
                }else{
                    // temporary remove the site admin and site user and operator site based dropdown
                    ?>
                    <!-- <select name="site_id" id="site_id" required="true">

                    </select> -->
                    <?php
                }
                
            ?>
        <div class="d-flex" onfocus="myFunction(event);">
            <div class="tooltip_logout ">
                <div id="info_circle_color">
                    <p id="get_text_info"></p>
                </div>
                <div class="tooltiptext out">
                    <div class="" style="display:flex; height:max-content; margin-bottom:0.2rem;">
                        <div class="" style="width:20%;display:flex;justify-content:center;align-items:center;margin:3px;">
                            <div class="circle_div" id="short_name"></div>
                        </div>
                       <div style="width:80%;">
                            <b class="name_div_logout" id="full_name"></b>
                            <!-- <b class="font_design" style="word-wrap: break-word;" id="full_name"></b> -->
                            <span style="margin-top:0;font-size:13px;float:left;" id="role_display"></span>
                        </div>
                    </div>
                    <div class="logout_css  unset_session" style="">
                        <div class="" style="width:20%;display:flex;align-items:center;justify-content:center;margin:3px;">
                            <i class="fa fa-power-off font_logout"></i>
                        </div>
                        <div style="width: 80%;display:flex;align-items:center;justify-content:start;">
                            <span style="font-weight:400;">Logout</span>
                        </div>
                    </div> 
                </div>
            </div>
            
        </div>
        <!-- <div class="d-flex mx-auto"> -->
       
        <!-- </div> -->

    </div>
</nav>