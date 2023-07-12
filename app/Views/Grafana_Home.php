<!DOCTYPE html>
<html lang="en">
<head>
    <title>SmartMach!</title>

    <link rel="shortcut icon" href="<?php echo  base_url(); ?>/assets/img/Myproject.png" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Link For Bootstrap -->
    <link href="<?php echo base_url()?>/bootstrap_5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>/bootstrap_5.1.3/dist/js/bootstrap.min.js?version=<?php echo rand() ; ?>"></script>
    <script src="<?php echo base_url() ?>/bootstrap_5.1.3/dist/js/bootstrap.bundle.min.js?version=<?php echo rand() ; ?>"></script>

    <!-- CSS STANDARDS START-->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/standard/config.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/standard/template.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/standard/template_oui.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/standard/layout.css?version=<?php echo rand() ; ?>">

    <!-- CSS STANDARDS END-->
    
    <!--Link For CSS-->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/config.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/css_general.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/production.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/multi-dropdown.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/user_management_sub.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model_size_css.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/user_management.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/sidemenubar.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/general_settings_sub.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/general_settings.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model_sub_test.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model_test1.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/main.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/common.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/graph.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/user_management_sub2.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/pre_loader.css">
    <!-- temporary for strategy wait for part settings input alignment changes -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/css_demo1.css">



    
    <!-- javascript link for date time -->
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/custom_date_format.js"></script>


    <!-- strategy current shift in general settings css -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/current_shift.css">

    <!-- css configuration file -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/config.css?version=<?php echo rand(); ?>">
    <!--Link For FONTS-->
    <link href="<?php echo base_url()?>/assets/fonts/Roboto/Roboto-Black.ttf" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/all-fontawesome.css">
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/all-fontawesome.js"></script>

<style>    
    .paddingm{
      padding: 0;
      margin: 0;
    }

    .sidenave-hover:hover{
        background-color:#EFF7FF;
        color:#595959;
    }

    .icon-font{
        font-size:1.4rem;
        justify-content:center;

    }
    .icon-font1{
        font-size:1.4rem;
        padding: 1px 1px 1px 2px;

    }
    .icon-font_first{
        font-size:1.4rem;
        padding: 1px 1px 1px 1px;

    }
    .icon-font_last{
        font-size:1.4rem;
        padding: 1px 1px 1px 2px;

    }
    .icon-font_third{
        font-size:1.4rem;
        padding: 1px 1px 1px 1px;

    }
    .right-type{
        text-align:right;
        right:1.2rem;
        padding-right:1.2rem;
    }
    .fontbox{
        white-space: nowrap;
        width: 10rem; 
        overflow: hidden;
        text-overflow: ellipsis;
    }
    #settings_div .row .marright1 p {
    text-align: right;
    margin-right: 3rem;
}

.divbox_reject  .divinput_box_reject label {
    position: absolute;
    top: -9px;
    left: 25px;
    color: #999;
    background-color: white;
    transition: 0.5s;
    pointer-events: none;
    font-family: 'Roboto', sans-serif;
    font-size:12px;
    color:#8c8c8c;
    margin-bottom: 0px;
    margin-top: 0px;
}
    .font_weight{
        font-weight: 500;
        font-family: 'Roboto' sans-serif;

    }

    .tooltip_name{
        font-size:1rem;
        font-weight:700;
        font-family:'Roboto' sans-serif;

    }

    .font_weight_modal{
        font-family: 'Roboto' sans-serif;
        font-weight: 550;
    }
    .border-color{
        border-color:1px solid #d9d9d9;
        color:#d9d9d9;
        font-family:'Roboto' sans-serif;
    }
    .img_round{
        border-radius:70%;
    }

    .fixtabletitle_rejection{
        top: 11.5rem;
        overflow:hidden;
        z-index: 1;
        white-space: nowrap;
        background: #fff;
    }
    .fixtabletitle_correction{
        top: 11.4rem;
        overflow:hidden;
        z-index: 1;
        white-space: nowrap;
        background: #fff;
    }

    /*.nav-icon-hover:hover{
        padding: 0.4rem;
    }
    .nav-icon-hover{
       margin-right:0.2rem;
    }*/

    /* custome tooltip for css its new */
    .tooltip_logout{
        position: relative;
        display: inline-block;

        /* border-bottom: 1px dotted black; */
    }

   
    .tooltip_logout .tooltiptext {
        visibility: hidden;
        /* transition-delay: 2s; */
        min-width: max-content;
        background-color: white;
        border: 1px solid #d9d9d9;
        color: black;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        padding-bottom:0;
        position: absolute;
        z-index: 2000;
        top: -10px;
        right: 110%;
        min-height: max-content;
        font-family:'Roboto' sans-serif;
        transition-delay: -1s;
    }

    
    .tooltip_logout .tooltiptext::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 100%;
        margin-top: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent transparent grey;

    }
    .tooltip_logout:hover .tooltiptext {
        visibility: visible;
        
      
    }
    .tooltiptext{
        position: relative;
        /* z-index: 2000; */
    }

    .out{
        transition-duration: 2s;
    }

    .circle_div{
        height:2.7rem;
        width:2.7rem;
        border-radius:50%;
        /* background-color:#005abc; */
        
        display:flex;
        justify-content:center;
        align-items:center;
        color:white;

    }

    .font_design{
        font-size:16.2px;
        /* padding:1px; */
        text-align:center;
        margin-top:0.1rem;
        float:left;


    }
    .font_logout{
        font-size:19px;
        vertical-align:bottom;
    }
    .logout_css{
        display:flex;
        height: 2.3rem;
        /* justify-content:Center;
        align-items:center; */
       box-sizing:border-box;
        cursor:pointer;    
    }

    .logout_css:hover{
        background-color:#E7F2FF;
        color:#005CBC; 
        /* border-bottom:5px;    */
    }


     /* for microsoft edge pasword field default icon remove */
     input::-ms-reveal,
      input::-ms-clear {
        display: none;
      }


      /* logout name div design */
      .name_div_logout{
       width:100%;
       float:left;
       text-align:start;
       text-transform:capitalize;
      }

      #info_circle_color{
        height:2.4rem;
        width:2.4rem;
        border-radius:50%;
        color:white;
        display:flex;
        justify-content:center;
        align-items:center;
      }
      #get_text_info{
        padding: 0;
        margin-top: 1.2rem;
      }
</style>
</head>

<body >
<!-- <div> -->
        <?php require_once 'Header.php' ?>
        <div class="row paddingm">
            <!-- side nav bar -->
             <div class="col-lg paddingm side_nav side_nav_c left-sidebar">
                <ul class="side-menu">
                        <li class="side-menu-li d-flex">
                            <a href="#">
                                <!-- <i class="fa fa-line-chart nav-icon nav-icon-hover " style="font-size: 23px;padding:9px" dvalue="Financial" alt="Financial"></i> -->
                                <img src="<?php echo base_url()?>/assets/icons/nav_icon_financial.png?version=<?php echo rand() ; ?>" class="icons-side-nav fa-line-chart nav-icon nav-icon-hover" dvalue="Financial">
                            </a>
                            <i class="fa fa-ellipsis-v icons-menu icon-font_first icon-font-js"></i>
                            <ul>
                                <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">FINANCIAL METRICS</p>
                                </nav>
                                <?php if($this->data['access'][0]['oee_financial_drill_down'] >=1){ ?>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center; " class="icon-align ">
                                        <!-- <i class="fa  fa-angle-double-down paddingm icon-sub " style="font-style: 15px;"></i> -->
                                        <img src="<?php echo base_url()?>/assets/icons/nav_financial_oee.png?version=<?php echo rand() ; ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div style="width: 90%;" >
                                        <a href="<?= base_url('Home/load_option/Financial_FOeeDrillDown')?>" id="active-demo" class="nav-sub " dvalue="FOeeDrillDown">OEE DRILL DOWN</a>
                                    </div>
                                </li>
                                <?php }?>
                                <?php if($this->data['access'][0]['opportunity_insights'] >=1){ ?>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <!-- <i class="fa fa-lightbulb paddingm color icon-sub" style="font-style: 15px;"></i> -->
                                        <img src="<?php echo base_url()?>/assets/icons/nav_financial_opportunity.png?version=<?php echo rand() ; ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div style="width: 90%;" class="">
                                        <a href="<?= base_url('Home/load_option/Financial_OpportunityInsights')?>"   dvalue="OpportunityInsights" class=" nav-sub">OPPORTUNITY INSIGHTS</a>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="side-menu-li d-flex">
                            <a href="#">
                                <!-- <i class="fa fa-industry nav-icon after-industry nav-icon-hover" dvalue="Production" style="font-size: 25px;padding:9px" alt="Production"></i> -->
                                <img src="<?php echo base_url()?>/assets/icons/nav_icon_pdm.png?version=<?php echo rand() ; ?>" class="icons-side-nav fa-industry nav-icon nav-icon-hover" dvalue="Production">
                            </a>
                            <i class="fa fa-ellipsis-v icons-menu icon-font1 icon-font-js"></i>
                            <ul>
                                 <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">PRODUCTION DATA MANAGEMENT</p> 
                                </nav>
                                <?php if($this->data['access'][0]['production_data_management'] >=1) ?>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <!-- <i class="fa fa-clock-o paddingm icon-sub" style="font-style: 15px;"></i> -->
                                        <img src="<?php echo base_url()?>/assets/icons/pdm_downtime.png?version=<?php echo rand() ; ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div style="width: 90%;">
                                        <a href="<?= base_url('Home/load_option/Production_Downtime')?>" class="nav-sub " dvalue="Downtime">DOWNTIME</a>
                                        <!-- <a href="<?= base_url('Home/load_option/Production_Downtime_Up')?>" class="nav-sub " dvalue="Downtime">DOWNTIME</a> -->

                                    </div>
                                </li>
                                <?php if($this->data['access'][0]['production_data_management'] >=1){ ?>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <!-- <i class="fa fa-ban paddingm icon-sub" style="font-style: 15px;"></i> -->
                                        <img src="<?php echo base_url()?>/assets/icons/pdm_quality.png?version=<?php echo rand() ; ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div style="width: 90%;">
                                        <a href="<?= base_url('Home/load_option/Production_Rejection')?>" class="nav-sub" dvalue="Rejection">QUALITY REJECTS</a>
                                    </div>
                                </li>
                                <?php } ?>
                                <?php if($this->data['access'][0]['production_data_management'] >=1){ ?>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <!-- <i class="fa fa-check paddingm icon-sub" style="font-style: 15px;"></i> -->
                                        <img src="<?php echo base_url()?>/assets/icons/pdm_corrections.png?version=<?php echo rand() ; ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div style="width: 90%;">
                                        <a href="<?= base_url('Home/load_option/Production_Corrections')?>" class="nav-sub " dvalue="Corrections">CORRECTIONS</a>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>

                        <li class="side-menu-li d-flex ">
                            <a href="<?= base_url('Home/load_option/Current_Shift_Performance')?>">
                                <!-- <i class="fa fa-gear nav-icon nav-icon-hover" dvalue="Current" style="font-size: 29px;padding:9px" alt="Current Shift"></i> -->
                                <img src="<?php echo base_url()?>/assets/icons/nav_icon_current_shift.png?version=<?php echo rand() ; ?>" class="icons-side-nav fa-current nav-icon nav-icon-hover nav-icon-align" dvalue="Current">
                            </a>

                            <ul>
                                <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">CURRENT SHIFT PERFORMANCE</p>
                                </nav>
                            </ul>
                        </li> 

                        <li class="side-menu-li d-flex ">
                            <a href="#">
                                <!-- <i class="fa fa-gear nav-icon nav-icon-hover" dvalue="Settings" style="font-size: 29px;padding:9px" alt="Settings"></i> -->
                                <img src="<?php echo base_url()?>/assets/icons/nav_icon_settings.png?version=<?php echo rand() ; ?>" class="icons-side-nav fa-gear nav-icon nav-icon-hover" dvalue="Settings">
                            </a>
                            <i class="fa fa-ellipsis-v icons-menu icon-font_last icon-font-js" style=""></i>
                            <ul>
                                <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">SETTINGS</p>
                                </nav>
                                <?php if($this->data['access'][0]['settings_machine'] >= 1){ ?>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <!-- <i class="fa fa-angle-double-down paddingm icon-sub" style="font-style: 15px;"></i> -->
                                        <img src="<?php echo base_url()?>/assets/icons/nav_financial_oee.png?version=<?php echo rand() ; ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div style="width: 90%;">
                                        <a href="<?= base_url('Home/load_option/Settings_Machines')?>" class="nav-sub" dvalue="Machines">MACHINE</a>
                                    </div>
                                </li>
                                <?php } ?>
                                <?php if($this->data['access'][0]['settings_part'] >= 1){ ?>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <!-- <i class="fa fa-lightbulb-o paddingm icon-sub" style="font-style: 15px;"></i> -->
                                        <img src="<?php echo base_url()?>/assets/icons/nav_financial_opportunity.png?version=<?php echo rand() ; ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div style="width: 90%;">
                                         <a href="<?= base_url('Home/load_option/Settings_Tools')?>" class="nav-sub" dvalue="Tools">PARTS</a>
                                    </div>
                                </li>
                                <?php } ?>
                                <?php if ($this->data['access'][0]['settings_general']  >=1) {?>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <!-- <i class="fa fa-bullseye paddingm icon-sub" style="font-style: 15px;"></i> -->
                                        <img src="<?php echo base_url()?>/assets/icons/nav_settings_general.png?version=<?php echo rand() ; ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                        
                                    </div>
                                    <div style="width: 90%;">
                                        <a href="<?= base_url('Home/load_option/Settings_Goals_Others')?>" class="nav-sub " dvalue="Goals">GENERAL</a>
                                    </div>
                                </li>
                                <?php }?>
                                <?php if ($this->data['access'][0]['settings_user_management']  >=1) {?>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <!-- <i class="fa fa-user-circle-o paddingm icon-sub" style="font-style: 15px;"></i> -->
                                        <img src="<?php echo base_url()?>/assets/icons/nav_settings_user.png?version=<?php echo rand() ; ?>" class="icons-smart icon-opportunity-insights icon-sub">
                                    </div>
                                    <div style="width: 90%;">
                                        <a href="<?= base_url('Home/load_option/Settings_Users')?>" class="nav-sub" dvalue="Users">USER ACCOUNT</a>
                                    </div>
                                </li>
                            <?php } ?>
                            </ul>
                        </li>

                        <!-- daily production link -->
                        <?php if ($this->data['access'][0]['daily_production_data']  >=1) {?>
                        <li class="side-menu-li d-flex ">
                            <a href="<?php echo base_url('Home/load_option/Daily_Production_Status'); ?>">
                                <i class="fa fa-calendar-day nav-icon nav-icon-hover" dvalue="Daily" style="font-size: 29px;padding:9px;height: 1.8rem;width: 1.8rem;margin-right: 0.8rem;" alt="Daily"></i>
                            </a>
                            <ul>
                                <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">DAILY PRODUCTION STATUS</p> 
                                </nav> 
                            </ul>
                        </li>
                        <?php } ?>
                        <!-- daily production link end -->

                        <!-- production Downtime New module -->
                        <?php if ($this->data['access'][0]['production_downtime']  >=1) {?>
                        <li class="side-menu-li d-flex">
                            <a href="<?php echo base_url('Home/load_option/Downtime_Production'); ?>">
                                <!-- <i class="fa fa-clock nav-icon nav-icon-hover" dvalue="Downtime" style="font-size: 29px;padding:9px;height: 1.8rem;width: 1.8rem;margin-right: 0.8rem;" alt="Downtime"></i> -->
                                <img src="<?php echo base_url()?>/assets/icons/nav_icon_downtime.png?version=<?php echo rand() ; ?>" class="icons-side-nav fa-clock nav-icon nav-icon-hover nav-icon-align" dvalue="Downtime">
                            </a>
                            <ul>
                                <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">PRODUCTION DOWNTIME</p>
                                </nav>
                            </ul>
                        </li>
                        <?php } ?>
                        <!-- production downtime new module end -->

                        <!-- production Downtime New module -->
                        <?php if ($this->data['access'][0]['production_quality']  >=1) {?>
                        <li class="side-menu-li d-flex">
                            <a href="<?php echo base_url('Home/load_option/Quality_Production'); ?>">
                                <!-- <i class="fa fa-award nav-icon nav-icon-hover" dvalue="Quality" style="font-size: 29px;padding:9px;height: 1.8rem;width: 1.8rem;margin-right: 0.8rem;" alt="Quality"></i> -->
                                <img src="<?php echo base_url()?>/assets/icons/nav_icon_quality.png?version=<?php echo rand() ; ?>" class="icons-side-nav fa-quality nav-icon nav-icon-hover nav-icon-align" dvalue="Quality">
                                
                            </a>

                            <ul>
                                <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">PRODUCTION QUALITY</p>
                                </nav>
                            </ul>
                        </li>
                        <?php } ?>
                        <!-- <i class="fa-duotone fa-award-simple"></i> -->
                        <!-- production downtime new module end -->

                        <!-- oee drilldown new module -->
                        <?php if ($this->data['access'][0]['oee_drill_down']  >=1) {?>
                        <li class="side-menu-li d-flex">
                            <a href="<?php echo base_url('Home/load_option/Oee_Drill_Down'); ?>">
                                <i class="fa fa-bore-hole nav-icon nav-icon-hover" dvalue="Oee" style="font-size: 29px;padding:9px;height: 1.8rem;width: 1.8rem;margin-right: 0.8rem;" alt="Oee"></i>
                            </a>
                            <ul>
                                <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">OEE DRILLDOWN</p> 
                                </nav> 
                            </ul>
                        </li>
                        <?php } ?>
                        <!-- oee drilldown new module end  -->

                        <!-- oee drilldown new module -->
                        <?php if ($this->data['access'][0]['alert_management']  >=1) {?>
                        <li class="side-menu-li d-flex">
                            <a href="<?php echo base_url('Home/load_option/Alert_Settings'); ?>">
                                <img src="<?php echo base_url()?>/assets/icons/nav_icon_alert.png?version=<?php echo rand() ; ?>" dvalue="Alert" class="icons-side-nav fa-alert nav-icon nav-icon-hover nav-icon-align" dvalue="Alert">
                            </a>
                            <ul>
                                <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">Alert Management</p> 
                                </nav> 
                            </ul>
                        </li>
                        <?php } ?>
                        <!-- oee drilldown new module end  -->

                        <!-- Issue Management -->
                        <?php if ($this->data['access'][0]['work_order_management']  >=1) {?>
                        <li class="side-menu-li d-flex">
                            <a href="<?php echo base_url('Home/load_option/Work_Order_Management'); ?>">
                                <img src="<?php echo base_url()?>/assets/icons/nav_icon_issue.png?version=<?php echo rand() ; ?>" class="icons-side-nav fa-work nav-icon nav-icon-hover nav-icon-align" dvalue="Work">
                            </a>
                            <ul>
                                <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">Work Order Management</p> 
                                </nav> 
                            </ul>
                        </li>
                        <?php } ?>

                        <!-- Issue Management End -->
                </ul>
            </div> 
            <div class="col-lg paddingm">        
                <?php
                     
                    if($select_opt == null && $select_sub_opt == null ){
                        echo "<h1 style='margin-left:6rem;'>No Records Founds!!</h1>" ;
                        echo "<pre>";
                        //echo $this->data['access'][0]['Settings_Machine'];
                    }
                    elseif($select_opt != null && $select_sub_opt == null)
                    {
                        echo view(''. $this->data['select_opt'].'',$this->data);
                    }
                    else{
                        echo view(''. $this->data['select_opt'].'',$this->data);
                    }
                ?>
            </div>        
        </div>
    <!-- </div> -->
<!-- </div> -->
</body>
</html>
<script>

    // document title
    let doc_title = document.title;
    window.addEventListener("blur",()=>{
        document.title="SmartMach";
    });

    window.addEventListener("focus",()=>{
        document.title = doc_title;
    });

    var MenuOpt = '<?php echo $this->data['select_opt']; ?>';
    var MenuSub = MenuOpt.split("_");
    var listIcons = document.getElementsByClassName("nav-icon");
    var listSubMenu = document.getElementsByClassName("nav-sub");
    var subicon = document.getElementsByClassName("icon-sub");
    var actionList = document.getElementsByClassName('icon-font-js');
      for (var i = 0; i < listIcons.length; i++) {
        var x = listIcons[i].getAttribute("dvalue");
        
        if(MenuSub[0] == x){
            var icon_name = listIcons[i].getAttribute("class");

            const split_nav = icon_name.split(" ");
            var img_side_name = "";

            if (split_nav[1] === "fa-line-chart") {
                img_side_name = "nav_icon_financial_active";
                listIcons[i].style = "background-color:#005abc;color:white;font-size:23px;padding:9px;";
            }
            else if(split_nav[1] === "fa-gear"){
                listIcons[i].style = "background-color:#005abc;color:white;font-size:29px;padding:9px;";
                img_side_name = "nav_icon_settings_active";
            }else if(split_nav[1] === "fa-industry"){
                img_side_name = "nav_icon_pdm_active";
                listIcons[i].style = "background-color:#005abc;color:white;font-size:25px;padding:9px;";
            }
            // daily production status icon
            else if(split_nav[1] === "fa-bar-chart"){
                listIcons[i].style = "background-color:#005abc;color:white;font-style:15px;font-size:27px;padding:9px;";
            }
            // Production Downtime
            else if(split_nav[1] === "fa-clock"){
                img_side_name = "nav_icon_downtime_active";
                listIcons[i].style = "background-color:#005abc;color:white;font-style:15px;font-size:27px;padding:9px;";
            }
            // Quality
            else if(split_nav[1]==="fa-quality"){
                img_side_name = "nav_icon_quality_active";
                listIcons[i].style = "background-color:#005abc;color:white;font-style:15px;font-size:27px;padding:9px;";
            }
            // Current Shift Performance
            else if(split_nav[1]==="fa-current"){
                img_side_name = "nav_icon_current_shift_active";
                listIcons[i].style = "background-color:#005abc;color:white;font-style:15px;font-size:27px;padding:9px;";
            }
            else if (split_nav[1] === "fa-work") {
                img_side_name = "nav_icon_issue_active";
                listIcons[i].style = "background-color:#005abc;color:white;font-style:15px;font-size:27px;padding:9px;";
            }
            else if (split_nav[1] === "fa-alert") {
                img_side_name = "nav_icon_alert_active";
                listIcons[i].style = "background-color:#005abc;color:white;font-style:15px;font-size:27px;padding:9px;";
            }
            else{
                listIcons[i].style = "background-color:#005abc;color:white;font-size:29px;padding:9px;";
            }

            listIcons[i].setAttribute('src', '<?php echo base_url()?>/assets/icons/'+img_side_name+'.png?version=<?php echo rand() ; ?>');
        }
      }
        for (var i = 0; i < listSubMenu.length; i++) {
         var y = listSubMenu[i].getAttribute("dvalue");
          if(MenuSub[1] == y){
            var img_name = "";
            if (y == "OpportunityInsights") {
                img_name = "nav_financial_opportunity_active";
            }else if (y == "FOeeDrillDown") {
                img_name = "nav_financial_oee_active";
            }else if (y == "Downtime") {
                img_name ="pdm_downtime_active";
            }else if (y == "Rejection") {
                img_name = "pdm_quality_active";
            }else if (y == "Corrections") {
                img_name = "pdm_corrections_active";
            }else if (y == "Machines") {
                img_name = "nav_financial_oee_active";
            }else if (y == "Tools") {
                img_name = "nav_financial_opportunity_active";   
            }else if (y =="Goals") {
                img_name = "nav_settings_general_active";
            }else if (y == "Users") {
                img_name = "nav_settings_user_active";
            }

            listSubMenu[i].style = "color:#005abc;font-weight:bold";
            subicon[i].style = "color:#005abc;font-weight:bold;padding-left:0px;fonst-size:1rem;";
            subicon[i].setAttribute('src', '<?php echo base_url()?>/assets/icons/'+img_name+'.png?version=<?php echo rand() ; ?>');
            if (y == "Users") {
                $('.site_based_header_visibility').css("display","none");   
            }else{
                $('.site_based_header_visibility').css("display","inline");
            }
          }
          
        }

var UserNameRef = "<?php echo($this->data['user_details'][0]['user_id'])?>";
var UserRoleRef ="<?php  echo($this->data['user_details'][0]['role'])?>";
var site_id = "<?php echo($this->data['user_details'][0]['site_id']); ?>";
//alert(site_id);

    $(document).ready(function(){

        // logout click event controller
       $(document).on('click','.unset_session',function(event){
            event.preventDefault();
            event.stopPropagation();
            location.href="<?php echo base_url('Home/logout_session'); ?>";
       });



        if (((UserRoleRef == "Smart Admin") || (UserRoleRef == "Smart Users")) && (site_id == "smartories")) {
            
            // if (active_Site != " ") {
                //alert('site');
                $.ajax({
                    url: "<?php echo base_url('User_controller/site_based_dropdown'); ?>",
                    type: "POST",
                    dataType: "json",
                    data:{
                        UserNameRef:UserNameRef,
                        UserRoleRef:UserRoleRef,
                    },
                    success:function(res_Site){
                        console.log('sites'+res_Site);
                        <?php 
                            $session = \Config\Services::session();
                        ?>
                        var active_Site = "<?php echo $session->get('active_site'); ?>";
                        // if (active_Site == " ") {
                        //     console.log(res_Site[0].site_id);
                            
                            var elements = $('');

                            res_Site.forEach(function(item){ 
                                if (active_Site.length === 0) {
                                    elements = elements.add('<option value="'+item.site_id+'-'+item.site_name+'" >'+item.site_name+' -'+item.site_id+'</option>');
                                    $('#site_id').append(elements);
                                }else if(active_Site.length > 0){
                                    console.log("ok its selected");
                                    if (item.site_id.localeCompare(active_Site) == 0) {
                                        //  elements = elements.add('<option value="'+item.site_id+'" selected="true" disabled="true">'+item.site_name+'-'+item.site_id+'</option>');
                                    }else{
                                       elements = elements.add('<option value="'+item.site_id+'-'+item.site_name+'" >'+item.site_name+' -'+item.site_id+'</option>');
                                    }
                                    // $('#site_id').val(active_Site);
                                    $('#site_id').append(elements);
                                }
                                
                               
                            });
                        // }else{
                        //     var elements = $('');
                        //     res_Site.forEach(function(item){
                        //         console.log(active_Site);
                        //         if (item.site_id.localeCompare(active_Site) == 0) {
                        //             elements = elements.add('<option value="'+item.site_id+'" selected="true" disabled="true">'+item.site_name+' -'+item.site_id+'</option>');
 
                        //         }else{
                        //             elements = elements.add('<option value="'+item.site_id+'" >'+item.site_name+' -'+item.site_id+'</option>');

                        //         }
                        //         $('#site_id').append(elements);
                        //        $('#site_id').val(active_site);
                        //     });
                        // }
                                 
                    },
                    error:function(res){
                        alert("Sorry!Try Agian SiteName!!");
                    }
                }); 
        //    }else{
        //     alert('ok');
        //    }
        }else{
           // alert('site selected');
           var site_name = "empty_sitname";
            $.ajax({
                url:"<?php echo base_url('Home/session_get_fun');  ?>",
                type:"POST",
                dataType:"json",
                data:{
                    site_id:site_id,
                    site_name:site_name,
                },
                success:function(res){
                    //alert(res);
                    //location.reload();
                },
                error:function(err){
                    console.log(err);
                }
            }); 
            var elements = $('<option value="'+site_id+'" selected="true" disbled="true">'+site_id+'</option>');
            $('#site_id').append(elements);
            // $('#site_id').val(site_id);
        }


       

    });

    $(document).on('change','#site_id',function(){
        var site_id_arr = $('#site_id').val();
        var site_id = site_id_arr.split("-");
       //alert(site_id);
        $.ajax({
            url:"<?php echo base_url('Home/session_get_fun');  ?>",
            type:"POST",
            dataType:"json",
            data:{
                site_id:site_id[0],
                site_name:site_id[1],

            },
            success:function(res){
                //alert(res);
                location.reload();
            },
            error:function(err){
                console.log(err);
            }
        }); 

    });

   





// popover
$(document).ready(function(){
    var fname = "<?php echo($this->data['user_details'][0]['first_name'])?>";
    var lname = "<?php echo $this->data['user_details'][0]['last_name'] ?>";
    var role = "<?php echo $this->data['user_details'][0]['role'] ?>";


    var first_letter = fname.charAt(0).toUpperCase();
    var last_letter = lname.charAt(0).toUpperCase();

    $('#short_name').html(first_letter+''+last_letter);
    var char_leng = fname+' '+lname;
    var len_char = char_leng.length;
    console.log("text length:\t"+len_char);
    // $('.tooltiptext').css("max-width",len_char+"rem");
    $('#full_name').html(char_leng);
    $('#full_name').css("text-overflow","ellipsis");
    $('#role_display').html(role);

    // info circle random colors circle colors alignment
    var info_color = ["#005bbc","#ff3399","#70ad47","#7c68ee","#d60700","#827718","#bd02d6","#fcba03","#fc6f03","#6bfc03"];
    var random_info_color = info_color[Math.floor(Math.random()*info_color.length)];
    $('#info_circle_color').css("background-color",random_info_color);
    $('.circle_div').css("background-color",random_info_color);
    $('#get_text_info').html(first_letter+''+last_letter);

});



 
</script>
