<style>
    .sidenav {
        height: 100vh;
        width: 0;
        /* position: fixed; */
        position: absolute;
        z-index: 20;
        top: 0;
        left: 0;
        /* background-color: #111; */
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        background-color: white;
        color: #111;
    }


    .sidenav a {
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        /* right: 25px; */
        font-size: 36px;
        margin-left: 35px;
        z-index: 20;
    }


    /* 
@media screen and (max-height: 450px) {
    .sidenav {
        padding-top: 15px;
    }

    .sidenav a {
        font-size: 18px;
    }
} */

    .menu_icon {
        z-index: 1;
        position: absolute;
        top: 5rem;
        left: 5px;
        display: none;
        background-color: white;
        padding: 0.5rem;

    }

    .menu_icon i {
        height: 30px;
        width: 30px;
    }


    .globalFilter {
        z-index: 1;
        position: absolute;
        top: 5rem;
        right: 10px;
        display: none;
        background-color: white;
        padding: 0.5rem;
    }


    /* global filters css */

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #fff;
        min-width: 160px;
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 10px;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    }

    .side-menu-li {
        margin-left: 0%;
    }

    .toggleMenu {
        display: none;
    }

    /* global filters css end*/


    @media (max-width:768px) {
        .menu_icon {
            display: inline;
        }

        .globalFilter {
            display: inline;
        }

        .dropdown-content {
            position: absolute;
            margin-left: -15rem;
        }

        .dropdown-content a {
            /* padding: 1rem; */
            margin: 1rem;
        }

        .po_absolute {
            margin-left: 1.7rem;
        }

        .boxx {
            width: 4.5rem;
            align-items: center;
        }

        .full_Views {
            margin-top: 4rem;
        }

        .logo_with_menu {
            width: 50%;
            display: flex;
            flex-direction: column;
            /* align-items: center; */
            justify-content: flex-start;
        }

        .toggleMenu {
            display: block;
        }




    }
</style>
<div class="full_Views d-flex">
    <nav class="nav_top topnav navbar-expand-lg top_nav_c display_f align_c justify_c full_screen_mode_oui_disturb">
        <div class="container-fluid display_f justify_sb align_c">
            <div class="logo_with_menu">
                <img id="smartlogo" src="<?php echo base_url() ?>/assets/img/logo.png?version=<?php echo rand(); ?>" alt="SmartMach Logo">
                <div class="toggleMenu">
                    <i onclick="openNav()" class="fa-solid fa-bars" style="width:25px;height:25px;color:#a6a6a6;"></i>
                </div>
            </div>
            <div style="width:50%;display:flex;flex-direction:row;align-items:center;justify-content:flex-end;">
                <?php
                $condition = $this->data['user_details'][0]['role'];
                $condition1 = $this->data['user_details'][0]['site_id'];
                $session = \Config\Services::session();
                if ($condition1 == "smartories") {
                    if ($session->get('active_site')) {
                        if (($condition == "Smart Admin") || ($condition == "Smart Users")) {
                ?>
                            <div class="box site_based_header_visibility" style="margin-right:1.8rem;">
                                <label class="" style="margin-top:-0.5rem;position:fixed;margin-left:0.6rem;z-index:1;background:white;font-size:12px;color:#8c8c8c;">Site Name</label>
                                <div class="input-box fieldStyle" style="height:max-content;">
                                    <select name="site_id" id="site_id" class="form-select font_weight_modal" required="true">
                                        <!-- temporary aligning -->
                                        <option value="<?php echo $session->get('active_site') . '-' . $session->get('active_site_name'); ?>" selected="selected" disabled="true"><?php echo $session->get('active_site_name') . '-' . $session->get('active_site'); ?></option>
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
                    } else {
                        if (($condition == "Smart Admin") || ($condition == "Smart Users")) {
                        ?>
                            <!-- <select name="site_id" id="site_id" required="true">
                                    <option value=" " selected="true" disabled>Select Site</option>
                            </select> -->
                            <div class="box  site_based_header_visibility" style="margin-right:1.8rem;">
                                <label class="" style="margin-top:-0.5rem;position:fixed;margin-left:0.4rem;z-index:1;background:white;font-size:12px;color:#8c8c8c;">Site Name</label>
                                <div class="input-box fieldStyle" style="height:max-content;">
                                    <select name="site_id" id="site_id" class="form-select font_weight_modal" required="true">
                                        <option value=" " selected="true" disabled>Select Site</option>
                                    </select>
                                </div>
                            </div>

                    <?php
                        }
                    }
                } else {
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
            </div>

            <!-- <div class="d-flex mx-auto"> -->

            <!-- </div> -->

        </div>
            <div id="mySidenav" class="sidenav" style="user-select: none;">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="#">
                    <li class="side-menu-li po_relative display_f justify_c align_c">
                        <a href="#" class="po_relative side-menu-element none_dec display_b">
                            <img src="<?php echo base_url() ?>/assets/icons/nav_icon_financial.png?version=<?php echo rand(); ?>" class="icons-side-nav fa-line-chart nav-icon nav-icon-hover" dvalue="Financial">
                        </a>
                        <i class="fa fa-ellipsis-v icons-menu-ellipsis icon-font-js"></i>
                        <ul class="side-nav-hover-content po_absolute paddingm">
                            <nav class="side-menu-li-header hover_elem_height display_f align_c">
                                <p class="paddingm side-menu-title fnt_fam">FINANCIAL METRICS</p>
                            </nav>
                            <?php if ($this->data['access'][0]['oee_financial_drill_down'] >= 1) { ?>
                                <li class="hover_elem_height side-menu-hover-btom display_f align_c sidenave-hover">
                                    <div class="icon-option display_f justify_c align_c">
                                        <img src="<?php echo base_url() ?>/assets/icons/nav_financial_oee.png?version=<?php echo rand(); ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div class="lable-option display_f align_c">
                                        <a href="<?= base_url('Home/load_option/Financial_FOeeDrillDown') ?>" id="active-demo" class="nav-sub lable-option-val none_dec" dvalue="FOeeDrillDown">OEE DRILL DOWN</a>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php if ($this->data['access'][0]['opportunity_insights'] >= 1) { ?>
                                <li class="hover_elem_height display_f align_c sidenave-hover">
                                    <div class="icon-option display_f justify_c align_c">
                                        <img src="<?php echo base_url() ?>/assets/icons/nav_financial_opportunity.png?version=<?php echo rand(); ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div class="lable-option display_f align_c">
                                        <a href="<?= base_url('Home/load_option/Financial_OpportunityInsights') ?>" dvalue="OpportunityInsights" class="nav-sub lable-option-val none_dec">OPPORTUNITY INSIGHTS</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                </a>

                <a href="#">
                    <li class="side-menu-li po_relative display_f justify_c align_c">
                        <a href="#" class="po_relative side-menu-element none_dec display_b">
                            <img src="<?php echo base_url() ?>/assets/icons/nav_icon_pdm.png?version=<?php echo rand(); ?>" class="icons-side-nav fa-industry nav-icon nav-icon-hover" dvalue="Production">
                        </a>
                        <i class="fa fa-ellipsis-v icons-menu-ellipsis icon-font-js"></i>
                        <ul class="side-nav-hover-content po_absolute paddingm">
                            <nav class="side-menu-li-header hover_elem_height display_f align_c">
                                <p class="paddingm side-menu-title fnt_fam">PRODUCTION DATA MANAGEMENT</p>
                            </nav>

                            <?php if ($this->data['access'][0]['production_data_management'] >= 1) ?>

                            <li class="hover_elem_height side-menu-hover-btom display_f align_c sidenave-hover">
                                <div class="icon-option display_f justify_c align_c">
                                    <img src="<?php echo base_url() ?>/assets/icons/pdm_downtime.png?version=<?php echo rand(); ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                </div>
                                <div class="lable-option display_f align_c">
                                    <a href="<?= base_url('Home/load_option/Production_Downtime') ?>" id="active-demo" class="nav-sub lable-option-val none_dec" dvalue="Downtime">DOWNTIME</a>
                                </div>
                            </li>
                            <?php if ($this->data['access'][0]['production_data_management'] >= 1) { ?>
                                <li class="hover_elem_height side-menu-hover-btom display_f align_c sidenave-hover">
                                    <div class="icon-option display_f justify_c align_c">
                                        <img src="<?php echo base_url() ?>/assets/icons/pdm_quality.png?version=<?php echo rand(); ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div class="lable-option display_f align_c">
                                        <a href="<?= base_url('Home/load_option/Production_Rejection') ?>" id="active-demo" class="nav-sub lable-option-val none_dec" dvalue="Rejection">QUALITY REJECTS</a>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php if ($this->data['access'][0]['production_data_management'] >= 1) { ?>
                                <li class="hover_elem_height display_f align_c sidenave-hover">
                                    <div class="icon-option display_f justify_c align_c">
                                        <img src="<?php echo base_url() ?>/assets/icons/pdm_corrections.png?version=<?php echo rand(); ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div class="lable-option display_f align_c">
                                        <a href="<?= base_url('Home/load_option/Production_Corrections') ?>" id="active-demo" class="nav-sub lable-option-val none_dec" dvalue="Corrections">CORRECTIONS</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                </a>
                <a href="#">
                    <li class="side-menu-li po_relative display_f justify_c align_c mr_right_side_nav">
                        <a href="<?= base_url('Home/load_option/Current_Shift_Performance') ?>" class="po_relative side-menu-element none_dec display_b">
                            <img src="<?php echo base_url() ?>/assets/icons/nav_icon_current_shift.png?version=<?php echo rand(); ?>" class="icons-side-nav fa-current nav-icon nav-icon-hover" dvalue="Current">
                        </a>
                        <ul class="side-nav-hover-content po_absolute paddingm">
                            <nav class="hover_elem_height display_f align_c">
                                <p class="paddingm side-menu-title fnt_fam">CURRENT SHIFT PERFORMANCE</p>
                            </nav>
                        </ul>
                    </li>
                </a>
                <a href="#">
                    <li class="side-menu-li po_relative display_f justify_c align_c">
                        <a href="#" class="po_relative side-menu-element none_dec display_b">
                            <img src="<?php echo base_url() ?>/assets/icons/nav_icon_settings.png?version=<?php echo rand(); ?>" class="icons-side-nav fa-gear nav-icon nav-icon-hover" dvalue="Settings">
                        </a>
                        <i class="fa fa-ellipsis-v icons-menu-ellipsis icon-font-js"></i>
                        <ul class="side-nav-hover-content po_absolute paddingm">
                            <nav class="side-menu-li-header hover_elem_height display_f align_c">
                                <p class="paddingm side-menu-title fnt_fam">SETTINGS</p>
                            </nav>

                            <?php if ($this->data['access'][0]['settings_machine'] >= 1) ?>

                            <li class="hover_elem_height side-menu-hover-btom display_f align_c sidenave-hover">
                                <div class="icon-option display_f justify_c align_c">
                                    <img src="<?php echo base_url() ?>/assets/icons/nav_financial_oee.png?version=<?php echo rand(); ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                </div>
                                <div class="lable-option display_f align_c">
                                    <a href="<?= base_url('Home/load_option/Settings_Machines') ?>" id="active-demo" class="nav-sub lable-option-val none_dec" dvalue="Machines">MACHINE</a>
                                </div>
                            </li>
                            <?php if ($this->data['access'][0]['settings_part'] >= 1) { ?>
                                <li class="hover_elem_height side-menu-hover-btom display_f align_c sidenave-hover">
                                    <div class="icon-option display_f justify_c align_c">
                                        <img src="<?php echo base_url() ?>/assets/icons/nav_financial_opportunity.png?version=<?php echo rand(); ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div class="lable-option display_f align_c">
                                        <a href="<?= base_url('Home/load_option/Settings_Tools') ?>" id="active-demo" class="nav-sub lable-option-val none_dec" dvalue="Tools">PARTS</a>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php if ($this->data['access'][0]['settings_general'] >= 1) { ?>
                                <li class="hover_elem_height side-menu-hover-btom display_f align_c sidenave-hover">
                                    <div class="icon-option display_f justify_c align_c">
                                        <img src="<?php echo base_url() ?>/assets/icons/nav_settings_general.png?version=<?php echo rand(); ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div class="lable-option display_f align_c">
                                        <a href="<?= base_url('Home/load_option/Settings_Goals_Others') ?>" id="active-demo" class="nav-sub lable-option-val none_dec" dvalue="Goals">GENERAL</a>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php if ($this->data['access'][0]['settings_user_management'] >= 1) { ?>
                                <li class="hover_elem_height display_f align_c sidenave-hover">
                                    <div class="icon-option display_f justify_c align_c">
                                        <img src="<?php echo base_url() ?>/assets/icons/nav_settings_user.png?version=<?php echo rand(); ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div class="lable-option display_f align_c">
                                        <a href="<?= base_url('Home/load_option/Settings_Users') ?>" id="active-demo" class="nav-sub lable-option-val none_dec" dvalue="Users">USER ACCOUNT</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                </a>
                <a href="#"><?php if ($this->data['access'][0]['daily_production_data']  >= 1) { ?>
                        <li class="side-menu-li po_relative display_f justify_c align_c mr_right_side_nav">
                            <a href="<?php echo base_url('Home/load_option/Daily_Production_Status'); ?>" class="po_relative side-menu-element none_dec display_b">
                                <!-- <img src="<?php echo base_url() ?>/assets/icons/Daily_Production_Status.png?version=<?php echo rand(); ?>" class="icons-side-nav fa-calendar-day nav-icon nav-icon-hover" dvalue="Daily"> -->
                                <i class="fa fa-calendar-day  nav-icon nav-icon-hover" dvalue="Daily" style="font-size: 29px;padding:9px;height: 1.8rem !important;width: 1.8rem !important;" alt="Daily"></i>
                            </a>
                            <ul class="side-nav-hover-content po_absolute paddingm">
                                <nav class="hover_elem_height display_f align_c">
                                    <p class="paddingm side-menu-title fnt_fam">DAILY PRODUCTION STATUS</p>
                                </nav>
                            </ul>
                        </li>
                    <?php } ?>
                </a>
                <a href="#"><?php if ($this->data['access'][0]['production_downtime']  >= 1) { ?>
                        <li class="side-menu-li po_relative display_f justify_c align_c mr_right_side_nav">
                            <a href="<?php echo base_url('Home/load_option/Downtime_Production'); ?>" class="po_relative side-menu-element none_dec display_b">
                                <img src="<?php echo base_url() ?>/assets/icons/nav_icon_downtime.png?version=<?php echo rand(); ?>" class="icons-side-nav fa-clock nav-icon nav-icon-hover" dvalue="Downtime">
                            </a>
                            <ul class="side-nav-hover-content po_absolute paddingm">
                                <nav class="hover_elem_height display_f align_c">
                                    <p class="paddingm side-menu-title fnt_fam">PRODUCTION DOWNTIME</p>
                                </nav>
                            </ul>
                        </li>
                    <?php } ?>
                </a>
                <a href="#"><?php if ($this->data['access'][0]['production_quality']  >= 1) { ?>
                        <li class="side-menu-li po_relative display_f justify_c align_c mr_right_side_nav">
                            <a href="<?php echo base_url('Home/load_option/Quality_Production'); ?>" class="po_relative side-menu-element none_dec display_b">
                                <img src="<?php echo base_url() ?>/assets/icons/nav_icon_quality.png?version=<?php echo rand(); ?>" class="icons-side-nav fa-quality nav-icon nav-icon-hover" dvalue="Quality">
                            </a>
                            <ul class="side-nav-hover-content po_absolute paddingm">
                                <nav class="hover_elem_height display_f align_c">
                                    <p class="paddingm side-menu-title fnt_fam">PRODUCTION QUALITY</p>
                                </nav>
                            </ul>
                        </li>
                    <?php } ?>
                </a>
                <a href="#"><?php if ($this->data['access'][0]['oee_drill_down']  >= 1) { ?>
                        <li class="side-menu-li po_relative display_f justify_c align_c mr_right_side_nav">
                            <a href="<?php echo base_url('Home/load_option/Oee_Drill_Down'); ?>" class="po_relative side-menu-element none_dec display_b">
                                <i class="fa fa-bore-hole  nav-icon nav-icon-hover" dvalue="Oee" style="font-size: 29px;padding:9px;height: 1.8rem !important;width: 1.8rem !important;" alt="Oee"></i>
                            </a>
                            <ul class="side-nav-hover-content po_absolute paddingm">
                                <nav class="hover_elem_height display_f align_c">
                                    <p class="paddingm side-menu-title fnt_fam">OEE DRILLDOWN</p>
                                </nav>
                            </ul>
                        </li>
                    <?php } ?>
                </a>
                <a href="#"> <?php if ($this->data['access'][0]['alert_management']  >= 1) { ?>
                        <li class="side-menu-li po_relative display_f justify_c align_c mr_right_side_nav">
                            <a href="<?php echo base_url('Home/load_option/Alert_Settings'); ?>" class="po_relative side-menu-element none_dec display_b">
                                <img src="<?php echo base_url() ?>/assets/icons/nav_icon_alert.png?version=<?php echo rand(); ?>" class="icons-side-nav fa-alert nav-icon nav-icon-hover" dvalue="Alert">
                            </a>
                            <ul class="side-nav-hover-content po_absolute paddingm">
                                <nav class="hover_elem_height display_f align_c">
                                    <p class="paddingm side-menu-title fnt_fam">ALERT MANAGEMENT</p>
                                </nav>
                            </ul>
                        </li>
                    <?php } ?>
                </a>
                <a href="#"><?php if ($this->data['access'][0]['work_order_management']  >= 1) { ?>
                        <li class="side-menu-li po_relative display_f justify_c align_c mr_right_side_nav">
                            <a href="<?php echo base_url('Home/load_option/Work_Order_Management'); ?>" class="po_relative side-menu-element none_dec display_b">
                                <img src="<?php echo base_url() ?>/assets/icons/nav_icon_issue.png?version=<?php echo rand(); ?>" class="icons-side-nav fa-alert nav-icon nav-icon-hover" dvalue="Work">
                            </a>
                            <ul class="side-nav-hover-content po_absolute paddingm">
                                <nav class="hover_elem_height display_f align_c">
                                    <p class="paddingm side-menu-title fnt_fam">WORK ORDER MANAGEMENT</p>
                                </nav>
                            </ul>
                        </li>
                    <?php } ?>
                </a>
                <!-- <a href="#">test</a> -->
            </div>
    </nav>
</div>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "100px";
        // document.getElementById("mySidenav").style.marginTop = "4rem";
        alert("hai")
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function handleResize() {
        var screenWidth = window.innerWidth;
        if (screenWidth >= 768) {
            closeNav();
            // myFunction();
        }
    }
    window.addEventListener("resize", handleResize);
    handleResize();

    function myFunction() {
        var dropdown = document.getElementById("myDropdown");
        if (dropdown.classList.contains('show')) {
            dropdown.classList.remove('show');
        } else {
            dropdown.classList.add('show');
        }
    }

    function stopPropagation(event) {
        event.stopPropagation();
    }

    // Add an event listener to close the dropdown when clicking outside of it
    document.addEventListener("click", function(event) {
        var dropdown = document.getElementById("myDropdown");
        var globalFilter = document.querySelector(".im-globalFilter");

        if (!dropdown.contains(event.target) && event.target !== globalFilter) {
            dropdown.classList.remove('show');
        }
    });

    // function myFunction() {
    //     // alert("hai");
    //     var dropdown = document.getElementById("myDropdown");
    //     if (dropdown.classList.contains('show')) {

    //     } else {
    //         dropdown.classList.add('show');
    //     }
    // }
    // window.onclick = function(event) {
    //     if (!event.target.matches('.dropbtn')) {
    //         var dropdowns = document.getElementsByClassName("dropdown-content");
    //         var i;
    //         for (i = 0; i < dropdowns.length; i++) {
    //             var openDropdown = dropdowns[i];
    //             if (openDropdown.classList.contains('show')) {
    //                 openDropdown.classList.remove('show');
    //             }
    //         }
    //     }
    // }
</script>