<nav class="sticky-top tonav ">
    <!-- <div class="margin"> -->
        <div class="client-logo" style="width: 15%;float: left;">
            <p class="paddingm">ClLIENT LOGO</p>
        </div>
        <div style="float: left;width: 6%;display: flex;align-items: center;" class="tonavHeight">
            <p class="paddingm p1" style="align-self: flex-end;margin-bottom: 0.5rem;">Powerd by</p>
        </div>
        <div style="float: left;width: 10%;display: flex;align-items: center;" class="marleft tonavHeight">
            <img id="smartlogo1" src="<?php echo base_url()?>/assets/img/logo.png" style="height:1.8rem;text-align:center;margin-block-start:auto;margin-bottom: 0.5rem;">
        </div>
        <div style="float: left;width: 15%;" class="tonavHeight centerAlign">
            <div class="box" style="width:90%;">
                <div class="input-box">      
                    <select class="form-select" id="op_machine_drp">
                    </select>
                    <label for="inputMachineName" class="input-padding">Machine Name</label>
                </div>
            </div>
        </div>
        <div style="float: left;width: 10%;height: 100%;" class="centerAlign tonavHeight">
            <div>
                <p class="paddingm text-g">Shift Date</p>
                <p class="paddingm font-items" id="shift_date"></p>
                <input type="text" id="s_date_ref" style="display: none;">
            </div>
        </div>
        <div style="float: left;width: 10%" class="centerAlign tonavHeight">
            <div>
                <p class="paddingm text-g">Shift</p>
                <p class="paddingm font-items" id="shift_id"></p>
                <input type="text" id="s_id_ref" style="display: none;">
            </div>
        </div>
        <div style="float: left;width: 10%" class="centerAlign tonavHeight">
            <div>
                <p class="paddingm text-g">Start</p>
                <p class="paddingm font-items" id="start_time"></p>
                <input type="text" id="s_time_val" style="display: none;">
            </div>
        </div>
        <div style="float: left;width: 2%" class="centerAlign tonavHeight sarrow">
            <img src="<?php echo base_url('assets/img/oui_arrow.png'); ?>" onclick="oui_arrow_to_card()" class="img_font_wh dot-cont" style="height: 26px;margin-bottom: 0.5rem;">
        </div>
        <div style="float: left;width: 10%" class="centerAlign tonavHeight">
            <div>
                <p class="paddingm text-g">End</p>
                <p class="paddingm font-items" id="end_time"></p>
                <input type="text" id="e_time_val" style="display: none;">
            </div>
        </div>
        <div style="float: left;width: 10%; display: flex;align-items: center;justify-content: flex-end;" class="tonavHeight"> 
            <img id="user-logo" src="<?php echo base_url()?>/assets/img/logo1.png" style="" class="info-inline" alt="User">
        </div>
       
    <!-- </div> -->
</nav>