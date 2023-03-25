<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/alert_settings.css?version=<?php echo rand(); ?>">
</head>
<br>
<br>
<div style="margin-left: 4.5rem;">
    <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav">
        <div class="container-fluid paddingm">
            <p class="float-start" id="logo">Alert Settings</p>

        </div>
    </nav>
    <nav class="navbar navbar-expand-lg sub-nav sticky-top fixinnersubnav">
        <div class="container-fluid paddingm " style="display:flex;flex-direction:row-reverse;">

            <!-- <p class="float-start"></p> -->
            <div class="d-flex innerNav">

                <div class="filter_div" style="padding-right:2rem;">
                    <!-- search keyword -->
                    <div class="box rightmar" style="margin-right:0.5rem;">
                        <div class="fieldStyle input-box" style="height:2rem;">
                            <input type="text" class="form-control font_weight" id="filterkeyword"
                                style="font-size:12px;height:2.1rem;margin-top:0.5rem;" name="filterkeyword"
                                placeholder="Search by Keyword">
                            <label for="filterkeyword" class="input-padding">Search</label>
                        </div>
                    </div>
                    <!-- part -->
                    <div class="inner_div_align">
                        <div class="box rightmar" style="margin-right: 0.5rem;">
                            <label class="multi_select_label" style="">Part</label>
                            <div class="filter_selectBox_categorygp" onclick="category_multiselect_gp()">
                                <select class="multi_select_categorygp" style="">
                                    <option id="text_categorygp" style="">All Category</option>
                                </select>
                                <div class="filter_overSelect_categorygp"></div>
                            </div>
                            <div class="filter_checkboxes_categorygp " style="">
                                <!-- options in progress -->
                                <div class="filter_check_categorygb reason_oppcost_common" style="">
                                    <div class="cate_drp_check" style="">
                                        <input type="checkbox" id="one" class="categorygp_checkbox" value="all" />
                                    </div>
                                    <div class="cate_drp_text" style="">
                                        <p class="font_multi_drp" style="margin:auto;">All Categories</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Machine -->
                    <div class="inner_div_align">
                        <div class="box rightmar" style="margin-right: 0.5rem;">
                            <label class="multi_select_label" style="">Machine</label>
                            <div class="filter_selectBox_categorygp" onclick="category_multiselect_gp()">
                                <select class="multi_select_categorygp" style="">
                                    <option id="text_categorygp" style="">All Category</option>
                                </select>
                                <div class="filter_overSelect_categorygp"></div>
                            </div>
                            <div class="filter_checkboxes_categorygp " style="">
                                <!-- options in progress -->
                                <div class="filter_check_categorygb reason_oppcost_common" style="">
                                    <div class="cate_drp_check" style="">
                                        <input type="checkbox" id="one" class="categorygp_checkbox" value="all" />
                                    </div>
                                    <div class="cate_drp_text" style="">
                                        <p class="font_multi_drp" style="margin:auto;">All Categories</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Criteria -->
                    <div class="inner_div_align">
                        <div class="box rightmar" style="margin-right: 0.5rem;">
                            <label class="multi_select_label" style="">Criteria</label>
                            <div class="filter_selectBox_categorygp" onclick="category_multiselect_gp()">
                                <select class="multi_select_categorygp" style="">
                                    <option id="text_categorygp" style="">All Category</option>
                                </select>
                                <div class="filter_overSelect_categorygp"></div>
                            </div>
                            <div class="filter_checkboxes_categorygp " style="">
                                <!-- options in progress -->
                                <div class="filter_check_categorygb reason_oppcost_common" style="">
                                    <div class="cate_drp_check" style="">
                                        <input type="checkbox" id="one" class="categorygp_checkbox" value="all" />
                                    </div>
                                    <div class="cate_drp_text" style="">
                                        <p class="font_multi_drp" style="margin:auto;">All Categories</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- updated by -->
                    <div class="inner_div_align">
                        <div class="box rightmar" style="margin-right: 0.5rem;">
                            <label class="multi_select_label" style="">Updated By</label>
                            <div class="filter_selectBox_categorygp" onclick="category_multiselect_gp()">
                                <select class="multi_select_categorygp" style="">
                                    <option id="text_categorygp" style="">All Category</option>
                                </select>
                                <div class="filter_overSelect_categorygp"></div>
                            </div>
                            <div class="filter_checkboxes_categorygp " style="">
                                <!-- options in progress -->
                                <div class="filter_check_categorygb reason_oppcost_common" style="">
                                    <div class="cate_drp_check" style="">
                                        <input type="checkbox" id="one" class="categorygp_checkbox" value="all" />
                                    </div>
                                    <div class="cate_drp_text" style="">
                                        <p class="font_multi_drp" style="margin:auto;">All Categories</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- apply button -->
                    <div class="inner_div_align">
                        <a style="" class="settings_nav_anchor float-end apply_btn_style"
                            id="add_machine_button">APPLY</a>
                    </div>
                    <!-- filter reset button -->
                    <div class="inner_div_align">
                        <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" class="filter_reset_style"
                            style="" alt="">
                    </div>
                </div>
                <a style="background: #005abc;color: white;width:max-content;" class="settings_nav_anchor float-end"
                    id="add_machine_button">
                    <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD ALERT
                </a>
            </div>
            <div class="pagination_div" style="">
                <input type="text" class="pagination_input_div" value="1" style="">
                <span class="pagination_text_div" style="">of <span id="pagination_val">20</span> Pages</span>
            </div>
        </div>
    </nav>
    <div class="tableContent">
        <div class="settings_machine_header sticky-top fixtabletitle" style="margin-top:1rem;">
            <div class="row paddingm">
                <div class="col-sm-1 p3 paddingm" style="width:6%;">
                    <p class="basic_header">ID</p>
                </div>
                <div class="col-sm-2 p3 paddingm" style="width:12%;">
                    <p class="basic_header">ALERT NAME</p>
                </div>
                <div class="col-sm-2 p3 paddingm mar_right" style="width:12%;">
                    <p class="basic_header">MACHINES</p>
                </div>
                <div class="col-sm-2 p3 paddingm " style="width:13%;">
                    <p class="basic_header">PARTS</p>
                </div>
                <div class="col-sm-1 p3 paddingm" style="width:22%;">
                    <p class="basic_header">CRITERIA</p>
                </div>
                <div class="col-sm-2 p3 paddingm" style="width:9%;">
                    <p class="basic_header">NOTIFY AS</p>
                </div>
                <div class="col-sm-1 p3 paddingm" style="width:17%;">
                    <p class="basic_header">UPDATED BY</p>
                </div>
                <div class="col-sm-1 p3 paddingm" style="justify-content: center;width:8.9%;">
                    <p class="basic_header">ACTION</p>
                </div>
            </div>
        </div>

        <div class="contentMachine contentContainer paddingm " style="margin-bottom:0rem;">
            <div id="settings_div">
                <div class="row paddingm">
                    <div class="col-sm-1 col marleft" style="width:6%;">
                        <p>S1-A1</p>
                    </div>
                    <div class="col-sm-2 col marleft" style="width:12%;">
                        <p title='+item.machine_name+'>Alert Name1</p>
                    </div>
                    <div class="col-sm-2 col marleft" style="width:12%;">
                        <p>Injection Molding Machine1</p>
                    </div>
                    <div class="col-sm-2 col marleft" style="width:13%">
                        <p>Part Name1</p>
                    </div>
                    <div class="col-sm-1 col marleft" style="width:22%;">
                        <p>UnPlanned Downtime >= 30 min In Past 8 Hours</p>
                    </div>
                    <div class="col-sm-1 col marleft img_div_out" style=""><img
                            src="<?php echo base_url('assets/img/mail_demo.png'); ?>" alt="" class="img_div_css"
                            style=""> <img src="<?php echo base_url('assets/img/issue.png'); ?>" alt=""
                            class="img_div_Css1" style=""> </div>
                    <div class="col-sm-2 col marleft" style="">
                        <div class="circle_div_out" style="">SA</div><span class="small_txt_out" style="">Smart Admin
                        </span>
                    </div>
                    <div class="col-sm-1 col marleft img_action_out" style="width:9%;"><img
                            src="<?php echo base_url('assets/img/pencil.png'); ?>" alt="" class="img_action_icon" style="">
                        <img src="<?php echo base_url('assets/img/delete.png'); ?>" alt="" class="img_action_icon"
                            style="">
                    </div>
                </div>
            </div>

            <!-- row2 -->
            <div id="settings_div">
                <div class="row paddingm">
                    <div class="col-sm-1 col marleft" style="width:6%;">
                        <p>S1-A2</p>
                    </div>
                    <div class="col-sm-2 col marleft" style="width:12%;">
                        <p title='+item.machine_name+'>Alert Name2</p>
                    </div>
                    <div class="col-sm-2 col marleft" style="width:12%;">
                        <p>Injection Molding Machine2</p>
                    </div>
                    <div class="col-sm-2 col marleft" style="width:13%">
                        <p>Part Name2</p>
                    </div>
                    <div class="col-sm-1 col marleft" style="width:22%;">
                        <p>UnPlanned Downtime >= 30 min In Past 8 Hours</p>
                    </div>
                    <div class="col-sm-1 col marleft img_div_out" style=""> <img src="<?php echo base_url('assets/img/issue.png'); ?>" alt=""
                            class="img_div_Css1" style=""> </div>
                    <div class="col-sm-2 col marleft" style="">
                        <div class="circle_div_out" style="">SA</div><span class="small_txt_out" style="">Smart Admin
                        </span>
                    </div>
                    <div class="col-sm-1 col marleft img_action_out" style="width:9%;"><img
                            src="<?php echo base_url('assets/img/pencil.png'); ?>" alt="" class="img_action_icon" style="">
                        <img src="<?php echo base_url('assets/img/delete.png'); ?>" alt="" class="img_action_icon"
                            style="">
                    </div>
                </div>
            </div>

            <!-- row3 -->
            <div id="settings_div">
                <div class="row paddingm">
                    <div class="col-sm-1 col marleft" style="width:6%;">
                        <p>S1-A3</p>
                    </div>
                    <div class="col-sm-2 col marleft" style="width:12%;">
                        <p title='+item.machine_name+'>Alert Name3</p>
                    </div>
                    <div class="col-sm-2 col marleft" style="width:12%;">
                        <p>Injection Molding Machine3</p>
                    </div>
                    <div class="col-sm-2 col marleft" style="width:13%">
                        <p>Part Name3</p>
                    </div>
                    <div class="col-sm-1 col marleft" style="width:22%;">
                        <p>UnPlanned Downtime >= 30 min In Past 8 Hours</p>
                    </div>
                    <div class="col-sm-1 col marleft img_div_out" style=""><img
                            src="<?php echo base_url('assets/img/mail_demo.png'); ?>" alt="" class="img_div_css"
                            style=""> <img src="<?php echo base_url('assets/img/issue.png'); ?>" alt=""
                            class="img_div_Css1" style=""> </div>
                    <div class="col-sm-2 col marleft" style="">
                        <div class="circle_div_out" style="">SA</div><span class="small_txt_out" style="">Smart Admin
                        </span>
                    </div>
                    <div class="col-sm-1 col marleft img_action_out" style="width:9%;"><img
                            src="<?php echo base_url('assets/img/pencil.png'); ?>" alt="" class="img_action_icon" style="">
                        <img src="<?php echo base_url('assets/img/delete.png'); ?>" alt="" class="img_action_icon"
                            style=""></div>
                </div>
            </div>

        </div>
    </div>
</div>