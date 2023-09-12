<style>
  .stcode_dps{
    border-radius: 3px;
    border: 1.5px solid #d9d9d9;
    font-family: 'Roboto', sans-serif;
    font-size: 1.1rem;
    font-weight: bold;
    margin: 0px;
    padding: 1px 9px;
    margin-right: 0.5rem;
    display:flex;
    flex-direction:column;
    justify-content:center;
    height:2.5rem;
}
.machine_header_production_status{
  /* border-radius: 10px 10px 10px 10px; */
  border-radius:4px;
  color: black;
  margin-top: 2px;
  border: 1px solid #d9d9d9;
  /* display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center; */
}
.machine_align{
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
}
.mcname{
  font-size:0.8rem;
  font-family: 'Roboto', sans-serif;
  justify-content:center;
  margin-bottom:1px;
  font-weight:550;

}
.brandname{
  margin-top:4px;
  color:grey;
  font-size:0.7rem;
}
#partname_pds{
  font-family: 'Roboto', sans-serif;
  font-size:0.8rem;
  color:black;
  font-weight:500;
  text-align:center;
  /* margin:auto; */

}
#nict_pds,#ppc_pds,#good_pds,#reject_pds{
  font-family: 'Roboto', sans-serif;
  font-size:0.8rem;
  color:black;
  opacity: 0.8;
  font-weight:450;
  margin-block:auto;
  text-align:right;
  /* margin-left:1rem; */
  /* margin:auto; */
}
#target_pds{
  font-family:'Roboto', sans-serif;
  color:#005abc;
  font-weight:bold;
  opacity:1;
  font-size:0.8rem;
  margin-block:auto;
  text-align:right;
  /* margin-left:1rem; */
  /* margin:auto; */
}
#tpp_pds{
  font-family:'Roboto', sans-serif;
  /* color:#C00000; */
  font-weight:bold;
  opacity:1;
  font-size:0.8rem;
  margin-block:auto;
  margin-left:1rem;
  text-align:center;
  /* margin:auto; */
}

.marlpds{
  text-align:left;
  align-self:center;
 margin-left:1rem;
}
.marrpds{
  /* text-align:right; */
    margin-inline-start:auto;
    margin-right:1rem;
  /* margin-right:1rem; */
}
.marcpds{
  text-align:center;
}
#per_reject_pds{
  font-weight:800;
}

/* graph */
.graph_height_weight{
  width:20rem;
  height:7rem;
  margin-left:10rem
}
.graph1_totval{
  font-weight: 650;
}
.graph2_totval{
  font-weight:650;
}
.graph_border{
  margin-top:2px;
  height: 5.3rem;
  width:90%;
  border-radius: 3px 3px 3px 3px;
  border: 1px solid #d9d9d9;
  padding:0;
}
.basic_header_center{
    margin-bottom: 0;
    padding: 0px;
    margin:auto;
    /* margin-left: 1rem; */
}
.basic_right{
    padding:0;
    margin-left: 1rem;
}
/* 
.basic_left{
    padding:0;
    margin-left:1rem;
} */
.settings_machine_header .basic_header_center{
        margin-bottom: 0;
        padding: 0px; 
        margin:auto;
        /* margin-left: 1rem; */
    }
    .small_text_time{
        font-size:0.7rem;
        /* font-size:10px; */
        color:grey;
    }

    
.container-input{
    width: 80%; 
    padding: 12px 40px; 
    padding-right:4px;
    margin: 2px 0; 
    display: inline-block; 
    border: 1px solid #ccc; 
    box-sizing: border-box; 
    height:2.5rem;
}

.fontuser i{
    position: absolute;
    left: 29px;
    top: 13px;
    color: gray;
}
.fontuser{
    position: relative;
    font-size:20px;
}

/* graph 1 */
.graph1_parent_div{
  overflow-x:scroll;
  overflow-x: auto;
 
}

/* graph2 downtime graph */
.graph2_parent_div{
  overflow-x:scroll;
  overflow-x:auto;
 
}

  
</style>
<div style="margin-left: 4.5rem;">
        <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav" style="z-index:98;">
          <div class="container-fluid paddingm">
            <p class="float-start" id="logo">Daily Production Status</p>
    
              <div class="d-flex" style="margin-top:0.5rem;">
                <!-- calendar box -->
                  <div class="float-end " style="display:flex;flex-direction:row-reverse;">
                   
                    <div class="fontuser" style="width:100%;">
                    <i class="fa fa-calendar click_font" style="position:absolute;z-index:100;margin-left:1rem;margin-top:0.7rem;"></i>
                        <input type="text" class="form-control container-input" id="changed_date" style="position:relative;">
                      
                    </div>
                  </div>
              </div>
          </div>
        </nav>
        <div class="tableContent paddingm" style="margin-top:4rem; padding-left:3px;padding-right:3px; ">
            <div class="settings_machine_header sticky-top fixtabletitle" style="top:7.9rem;margin-bottom:0.3rem;z-index:95;">
                <div class="row paddingm">
                    <div class="col-sm-1 p3 paddingm" style="width:5.6%;">
                      <p class="basic_header" style="margin-left:0.7rem;">MACHINE </p>
                    </div>
                    <div class="col-sm-1 p3 paddingm" style="width:5.6%;">
                      <p class="basic_header">SHIFT</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm " style="width:8.5%;">
                      <p class="basic_header">PART</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm " style="width:6.7%;">
                      <p class="basic_right">NICT  (s)</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm " style="width:6.8%;">
                      <p class="basic_right">PPC</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm" style="width:6.6%;">
                      <p class="basic_right">TARGET</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm" style="width:6.3%;">
                      <p class="basic_right">GOOD</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm" style="justify-content: center;width:7.8%;">
                      <p class="basic_right">REJECTS</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm" style="width:8.5%;">
                      <p class="basic_header_center">TPP</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm" style="width:18.5%;">
                      <p class="basic_header">REJECTION REASON</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm" style="width:18.4%;">
                      <p class="basic_header">DOWNTIME  REASON</p>
                    </div>
                </div>
            </div>

        <div class="contentProduction contentContainer paddingm " style="margin-top:0;display:flex;flex-direction:column;">

        </div>
</div>


<!-- preloader -->

<!-- preloader -->
<!-- preloader -->
<div id="overlay">
      <div class="cv-spinner">
        <span class="spinner"></span>
        <span class="loading">Awaiting Completion...</span>
      </div>
</div>
<!-- preloader end -->


<!-- preloader -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Datetimepicker -->
    <script src="<?php echo base_url(); ?>/assets/js/datetimepicker.js?version=<?php echo rand() ; ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery.datetimepicker.min.css?version=<?php echo rand() ; ?>">
    <script src="<?php echo base_url(); ?>/assets/js/jquery.datetimepicker.js?version=<?php echo rand() ; ?>"></script>

<script>

  
$('#changed_date').datetimepicker({  
  timepicker:false,
  datepicker:true,
  format:'Y-m-d',
  maxDate: new Date(),
  // onChangeDateTime:checkPastTime_F,
  // onShow:checkPastTime_F,
});


    $(document).on('blur','#changed_date',function(){
      $("#overlay").fadeIn(300);
      load_allfiles();
    });

    /* onclick calendar icon its select to show the record
    $('.click_font').datetimepicker({
        timepicker:false,
        datepicker:true,
        format:'Y-m-d',
        onChangeDateTime:function(dp,$input){
            // alert($input.val());
            console.log("selected date:\t"+$input.val());
            $('#changed_date').val($input.val());
            // location.reload();
           

        },
        maxDate: new Date(),
    });
*/

    // document ready function its get color change for tpp record font color
    $(document).ready(function(){
        const current_date = getcurrent_date();
        console.log("current date"+current_date);
        $('#changed_date').val(current_date);
        $("#overlay").fadeIn(300);
        load_allfiles();
        console.log("after function calling");
        color_change_value();
    });
    
      // get final json records
      function load_allfiles(){
            // $("#overlay").fadeIn(300);
            var date =$('#changed_date').val();
            $.ajax({
                url:"<?php echo base_url('Daily_production_controller/getMachine_data'); ?>",
                method:"POST",
                dataType:"json",
                data:{
                    date:date,
                },
                success:function(res){
                    console.log("Ajax Succeed");
                    console.log(res);
                      $('.contentProduction').empty();
                    if (jQuery.isEmptyObject(res['Part_details'])){
                        $('.contentProduction').html('<p class="no_record_css">No Records...</p>');
                    }

                    var id = 1;
                    $.each(res['Part_details'],function(k,v){
                        var elements = $();
                        // console.log(v);
                        console.log("machine_id");
                        console.log(k);

                        elements = elements.add('<div class="" style="display:flex;flex-wrap:wrap;flex-direction:row;">'
                            +'<div class=" col paddingm" style="padding-right:2px; width:10%;">'
                              +'<div class="machine_header_production_status machine_align" style="height:99.5%;">'
                              // +'<div class="machine_header_production_status machine_align" id="height_'+k+'" style="">'
                                  +'<p class="mcname" style="text-align:center;">'+res['machine_details'][k][0]+'</p>'
                                  +'<span style="font-size:0.8rem;font-weight:550;">('+res['machine_details'][k][2]+'T)</span>'
                                  +'<span class="brandname">'+res['machine_details'][k][1]+'</span>'
                              +'</div>'
                            +'</div>'
                            +'<div class=" col paddingm '+k+'"style="padding-right:2px; width:3%;" machine_data="'+k+'" >'
                            +'</div>'
                            +'<div class="col-sm-10 " style="padding:0;width:69.8%;padding-right:2px;">'
                              +'<div class="col_'+k+'" style="padding:0;height:100%;width:100%;"></div>'
                            +'</div>'
                            // downtime graph
                            +'<div class="downtime_graph_'+k+'" style="width:19%;">'
                            +'</div>'
                            +'</div>');
                            $('.contentProduction').append(elements);
                            // shift alignment
                         
                            // shift creation
                        $.each(res['Part_details'][k],function(k1,v1){
                          var ele = $();
                          var downtime_ele = $();
                          //console.log("shift");
                          //console.log(k1);
                          //console.log("")
                          //console.log(v1);
                         

                          var height_shift = Object.keys(res['Part_details'][k][k1]).length;
                          var height = Object.keys(res['part_count_machine_wise'][k]).length;

                          var shift_percentage = 100/parseInt(height);
                          var container_height = 100 / parseInt(height);

                          shift_percentage = parseInt(shift_percentage)*parseInt(height_shift);
                          shift_percentage = parseInt(shift_percentage);
                          // this conditions and varaiables to hide future shift
                          var formattedDate = new Date(date);
                          var d = formattedDate.getDate();
                          var m =  formattedDate.getMonth();
                          m += 1;  
                          var y = formattedDate.getFullYear();

                          var c_date = new Date(y+"-"+(m > 9 ? m: "0" + m)+"-"+(d > 9 ? d: "0" + d)+" "+res['shift_wise_time'][k1]);
                          // var c_date = new Date("2022-12-17"+" "+"21:00:00");
                          // var current_date =new Date("2022-12-17 "+tmp_arr[t]);
                          // console.log(c_date+"\tshift date:\t");
                          if ( new Date() > c_date) {
                            
                            // ele = ele.add('<div class="machine_header_production_status machine_align '+k+'_'+k1+'" style="height:'+shift_percentage+'%;">'
                            ele = ele.add('<div class="machine_header_production_status machine_align '+k+'_'+k1+'" style="">'
                             +'<p class="shift_id_pds" style="font-size:0.8rem;font-weight:550;">'+k1+'</p>'
                            +'</div>');


                            var downtime_val_split = parseInt(res['Downtime_value'][k][k1]);
                            var downtime_hour_minute = getdowntime_text(downtime_val_split);
                            if (parseInt(downtime_val_split)>0) {
                              // downtime_ele = downtime_ele.add('<div class="machine_header_production_status machine_align downtime_'+k+'_'+k1+' " style="height:'+shift_percentage+'%;">'
                              downtime_ele = downtime_ele.add('<div class="machine_header_production_status machine_align downtime_'+k+'_'+k1+' " style="">'
                                +'<div id="graph2_'+k+'_'+k1+'" style="margin:0;display: grid;grid-template-columns: 60% 40%;font-size:0.7rem;width:100%;margin-block-end:auto;overflow:auto;">'
                                  // first downtime graph
                                  +'<div class="" style="width:100%; border: 1px solid #E5E4E2; border-top:0;border-right:0; padding:5px;">'
                                    +'<div style="width:100%; word-wrap: break-word;padding-left:0.4rem;font-weight:790;" title="Total">Total</div>'
                                  +'</div>'
                                  +'<div id="background_drval_'+k+'_'+k1+'_1" style="width:100%;text-align:right; border: 1px solid #E5E4E2; border-top:0; border-right:0; padding:5px;">'
                                    +'<p style="width:100%; word-wrap:break-word;color:#005abc;font-weight:800;margin-top:auto;margin-bottom:auto;font-size:0.7rem;" title="'+downtime_hour_minute+'"  data_duration="'+downtime_val_split+'" class="downtime_val_'+k+'_'+k1+'">'+downtime_hour_minute+'</p>'
                                  +'</div>'
                                  +'</div>'

                                +'</div>'
                              +'</div>');
                            }
                            else{
                              downtime_ele = downtime_ele.add('<div class="machine_header_production_status machine_align downtime_'+k+'_'+k1+' " style="">'
                              +'</div>');
                            }

                          }
                         

                          
                        
                          // console.log("shift height:\t"+shift_percentage);
                          $('.'+k).append(ele);
                          $('.downtime_graph_'+k).append(downtime_ele);

                          // downtime graph conditions
                          // downtime graph reasons
                          const downtime_reason_label = [];
                          const downtime_reason_val = [];
                          var tmp_downtime_random_count = 1;
                          var dtid = 1;
                          // console.log("Downtime reason");
                          // console.log(res['Downtime_reasons_val'][k][k1]);
                          $.each(res['Downtime_reasons_val'][k][k1],function(rname,rval){
                            var dr = $();
                            var tmpreason_id = rname.toString().split("r");
                            if (parseInt(rval)>0) {
                              downtime_reason_label.push(res['Downtime_reasons'][rname]);
                              downtime_reason_val.push(rval);
                              dtid = parseInt(dtid) +1;
                              var tmp_downtime_getfloat_val = parseInt(rval);
                              var tmp_downtime_hour_minute = getdowntime_val_text(tmp_downtime_getfloat_val);
                              dr = dr.add('<div class="" style="width:100%; border: 1px solid #d9d9d9;border-top:0;border-right:0; padding:5px;">'
                                  +'<div style="width:100%; word-wrap: break-word;padding-left:0.4rem;" title="'+res['Downtime_reasons'][tmpreason_id[1]]+'">'+res['Downtime_reasons'][tmpreason_id[1]]+'</div>'
                              +'</div>'
                              +'<div id="background_drval_'+k+'_'+k1+'_'+dtid+'" style="width:100%;text-align:right; border: 1px solid #d9d9d9;border-top:0;border-right:0;padding:5px;">'
                                +'<p style="width:100%; word-wrap:break-word;color:#005abc;font-weight:800;margin-top:auto;margin-bottom:auto;font-size:0.7rem;" title="'+tmp_downtime_hour_minute+'" data_duration="'+rval+'" class="downtime_val_'+k+'_'+k1+'">'+tmp_downtime_hour_minute+'</p>'
                              +'</div>');
                              $('#graph2_'+k+'_'+k1).append(dr);
                            }
                          });
                          // graph div adjustment
                          var graph_len = downtime_reason_label.length;
                          if (parseInt(graph_len)>0) {
                            var downtime_graph_leng = $('.downtime_val_'+k+'_'+k1).length;
                            // console.log("downtime graph :\t"+k);
                            // console.log("downtime graph length:\t"+downtime_graph_leng);
                            for(var i=0;i<parseInt(downtime_graph_leng);i++){
                             
                              var tmp_dreason_val = $('.downtime_val_'+k+'_'+k1+':eq('+i+')').attr("data_duration");
                              var downtime_total_reason = $('.downtime_val_'+k+'_'+k1+':eq(0)').attr("data_duration");
                              // console.log("tmp reason val:\t"+tmp_dreason_val);
                              var percentage_background  = parseInt(tmp_dreason_val)/parseInt(downtime_total_reason)*100;
                              // var color_deg = parseInt(percentage_background)/100*360;
                              // console.log("machine:\t"+k+"percentage"+percentage_background);
                              var tmp = parseInt(i) +1;
                              var remaining_percent = 100 - parseInt(percentage_background);
                              $('#background_drval_'+k+'_'+k1+'_'+tmp).css("background","linear-gradient(to right,  #B4D7FF "+parseInt(percentage_background)+"% , white "+parseInt(percentage_background)+"%, white 100%)");
                              // $('.background_rval_'+i).css("width",parseInt(percentage_background)+"%");
                            }

                          }else{
                            // temporary hide this condition for no downtime for mathan sir told
                            // $('#graph2_'+k+'_'+k1).append("No Reasons Mapped");
                          }
                      

                          // part wise record alignment
                          $.each(res['Part_details'][k][k1],function(k2,v2){
                            console.log(v2);
                            console.log(k2);

                            var part_count_pershift = Object.keys(res['Part_details'][k][k1]).length;
                            console.log("part count pershift:\t"+k2);
                            // console.log(typeof res['Part_production_details'][k][k1][k2][0]);
                            var el = $();
                            var part_name = res['part_names'][k2][0];
                            var tool_name = res['part_names'][k2][1];
                            var trejection = res['Part_production_details'][k][k1][k2][0];
                            // percentage conditions 
                            var percentage = res['Part_production_details'][k][k1][k2][3].toFixed(1);
                            var tmp_percentage = 0;
                            if (parseFloat(percentage)>0) {
                              tmp_percentage = percentage;
                            }else{
                              tmp_percentage = 0;
                            }

                            // from time and to time condition
                            const from_time_arr = v2[4][0].toString().split(":");
                            const to_time_arr = v2[4][1].toString().split(":");
                            var from_time = from_time_arr[0]+':'+from_time_arr[1];
                            var to_time = to_time_arr[0]+":"+to_time_arr[1];
                            // console.log("from time"+from_time);
                            // console.log("to time"+to_time);



                            // rejection count condition
                            if (trejection === null) {
                              rejection = 0;
                            }else{
                              rejection = parseInt(trejection);
                            }
                            var part_count_find = 0;
                            console.log(part_count_pershift);
                            if (parseInt(part_count_pershift)>1) {
                              // multiple parts pershift
                              part_count_find = parseInt(part_count_find) +1;
                             console.log("multiple parts");
                              el = el.add('<div class="row_'+k+'_'+k1+'" style="display:grid;gap:3px;"><div class="machine_header_production_status" style="width:100%;gird-column:1;display:flex;min-height:7rem;">'
                                +'<div class="mar_right" style="width:12%;margin-block:auto;display:flex;flex-direction:column;padding:0.3rem;">'
                                  +'<p id="partname_pds" title="'+part_name+'" style="margin-bottom:0;">'+part_name +'</p>'
                                    +'<p title="'+tool_name+'" style="text-align:center;margin-bottom:0;font-size:0.8rem;color:black;font-weight:550;width:100%;">('+tool_name+')</p>'
                                  +'<p title="'+from_time+' to '+to_time+'" style="text-align:center;margin-bottom:0;font-size:0.7rem;margin-top:4px;"><small class="small_text_time">'+from_time+' to '+to_time+'</small></p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:9.7%;margin-block:auto;">'
                                  +'<p  class="marrpds" id="nict_pds">'+v2[2]+'</p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:10%;margin-block:auto;">'
                                  +'<p  class="marrpds" id="ppc_pds">'+v2[1]+'</p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:9.6%;margin-block:auto;">'
                                  +'<p  class="marrpds target_pds" id="target_pds">'+parseInt(v2[3])+'</p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:9.2%;margin-block:auto;">'
                                  +'<p  class="marrpds"  id="good_pds">'+res['Part_production_details'][k][k1][k2][2]+'</p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:11.4%;margin-block:auto;">'
                                  +' <p  class="marrpds" id="reject_pds" >'+rejection+' <span id="per_reject_pds">('+tmp_percentage+'%)</span></p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:12.4%;margin-block:auto;margin-block:auto;">'
                                  +' <p  class=" tpp_pds" style="margin:auto;" id="tpp_pds" >'+res['Part_production_details'][k][k1][k2][1]+'</p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:26.8%;display:flex;flex-direction:column;height:100%;">'
                                    +'<div id="graph1_'+id+'" style="margin:0;display: grid;grid-template-columns: 60% 40%;font-size:0.7rem;overflow:auto;border-bottom: 1px solid #E5E4E2;border-left: 1px solid #E5E4E2;">'
                                       
                                    +'</div>'
                                +'</div>'
                              +'</div>' 
                              +'</div>');
                             
                              
                            }else{
                              console.log("single parts");
                              // single parts per shift
                              el = el.add('<div class="machine_header_production_status row_'+k+'_'+k1+'" style="width:100%;display:flex;min-height:7rem;">'
                              +'<div class="mar_right" style="width:11.89%;margin-block:auto;display:flex;flex-direction:column;padding:0.3rem;">'
                                  +'<p id="partname_pds" title="'+part_name+'" style="margin-bottom:0;">'+part_name +'</p>'
                                    +'<p title="'+tool_name+'" style="text-align:center;margin-bottom:0;font-size:0.8rem;color:black;font-weight:550;width:100%;">('+tool_name+')</p>'
                                    +'<p title="'+from_time+' to '+to_time+'" style="text-align:center;margin-bottom:0;font-size:0.7rem;margin-top:4px;"><small class="small_text_time">'+from_time+' to '+to_time+'</small></p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:9.6%;margin-block:auto;">'
                                  +'<p  class="marrpds" id="nict_pds">'+v2[2]+'</p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:9.90%;margin-block:auto;">'
                                  +'<p  class="marrpds" id="ppc_pds">'+v2[1]+'</p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:9.6%;margin-block:auto;">'
                                  +'<p  class="marrpds target_pds" id="target_pds">'+parseInt(v2[3])+'</p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:9%;margin-block:auto;">'
                                  +'<p  class="marrpds"  id="good_pds">'+res['Part_production_details'][k][k1][k2][2]+'</p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:11.2%;margin-block:auto;">'
                                  +' <p  class="marrpds" id="reject_pds" >'+rejection+' <span id="per_reject_pds">('+tmp_percentage+'%)</span></p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:12.4%;margin-block:auto;">'
                                  +' <p  class=" tpp_pds" style="margin:auto;" id="tpp_pds" >'+res['Part_production_details'][k][k1][k2][1]+'</p>'
                                +'</div>'
                                +'<div class="mar_right" style="width:26.6%;display:flex;flex-direction:column;">'
                                    +'<div id="graph1_'+id+'" style="margin:0;display: grid;grid-template-columns: 60% 40%;font-size:0.7rem;border-bottom: 1px solid #E5E4E2;border-left: 1px solid #E5E4E2;">'

                                    +'</div>'
                                +'</div>'
                              +'</div>');
                            }
                            $('.col_'+k).append(el);

                            
                             
                              // graph 1 foreach
                              // reasons label
                              const reasons_label = [];
                              const reasons_value = [];
                              // production rejection graph
                              var random_count = 1;
                              var quality_reason_total_val = 0;
                              var tid = 0;
                              const dummy_arr = res['Quality_reject_reason'][k][k1][k2];
                              
                              // console.log("dummy array");
                              // dummy_arr.sort(function(a,b) {
                              //     return a.val - b.val;
                              // });
                              // const arr_demo = descending_func(dummy_arr);
                              // console.log(dummy_arr);
                              $.each(res['Quality_reject_reason'][k][k1][k2],function(reason,rval){
                              
                                var qr = $();
                                  var tmp_reason_id = reason.toString().split("r");
                                  // console.log("quality reasons");
                                  //   console.log(tmp_reason_id);
                                  // reasons_label.push(res['quality_reasons'][tmp_reason_id]);
                                  if (parseInt(rval)>0) {
                                    tid = parseInt(tid) + 1;
                                    // console.log("quality reasons");
                                    // console.log(tmp_reason_id);
                                    quality_reason_total_val  = parseInt(quality_reason_total_val) + parseInt(rval);
                                    reasons_value.push(rval);
                                    reasons_label.push('R'+random_count);
                                    random_count = parseInt(random_count)+1;
                                    qr = qr.add('<div class="" style="width:100%; border-right: 1px solid #E5E4E2; border-bottom: 1px solid #E5E4E2; padding:5px;">'
                                      +'<div style="width:100%; word-wrap: break-word;padding-left:0.4rem;" title="'+res['quality_reasons'][tmp_reason_id[1]]+'">'+res['quality_reasons'][tmp_reason_id[1]]+'</div>'
                                    +'</div>'
                                    +'<div id="background_rval_'+k+'_'+k1+'_'+k2+'_'+tid+'" style="width:100%;text-align:right;border-bottom: 1px solid #E5E4E2; padding:5px;">'
                                      +'<p style="width:100%; word-wrap:break-word;color:#005abc;font-weight:800;margin-top:auto;margin-bottom:auto;" title="'+rval+'"  class="'+k+'_'+k2+'">'+rval+'</p>'
                                    +'</div>');
                                    $('#graph1_'+id).append(qr);
                                  }
                              });
                              
                              if (parseInt(quality_reason_total_val)<=0) {
                                // temporary hide this no rejection mathan sir told
                                // $('#graph1_'+id).append("No Rejection");
                              }else{
                                 // each rejection value width
                                var rejection_leng = $('.'+k+'_'+k2).length;
                                console.log("total length:\t"+rejection_leng);
                                for(var i=0;i<parseInt(rejection_leng);i++){
                                  //console.log("total quality:\t"+quality_reason_total_val);
                                  

                                  var tmp_reason_val = $('.'+k+'_'+k2+':eq('+i+')').text();
                                  //console.log("tmp reason val:\t"+tmp_reason_val);
                                  var percentage_background  = parseInt(tmp_reason_val)/parseInt(quality_reason_total_val)*100;
                                  var color_deg = parseInt(percentage_background)/100*360;
                                  var tmp = parseInt(i) +1;
                                  var remaining_percent = 100 - parseInt(percentage_background);
                                    if (parseInt(rejection_leng)=== 1) {
                                      // percentage_background = 99;
                                      $('#background_rval_'+k+'_'+k1+'_'+k2+'_'+tmp).css("background","#B4D7FF");
                                      console.log("single reason:\t"+rejection_leng);
                                    }else{
                                      $('#background_rval_'+k+'_'+k1+'_'+k2+'_'+tmp).css("background","linear-gradient(to right,  #B4D7FF "+parseInt(percentage_background)+"% , white "+parseInt(percentage_background)+"%, white 100%)");
                                    }
                                  // $('.background_rval_'+i).css("width",parseInt(percentage_background)+"%");
                                }
                              }

                              // length of the graph
                              // if (parseInt(reasons_label.length)>4) {
                              //     $('#graph1_'+id).css("overflow","auto");
                              // }
                             
                            
                              // shift id fixed height code
                              var shift_leng = $('.row_'+k+'_'+k1).length;
                              // console.log("shift height:"+shift_leng);
                              var shift_height = 0;
                              for(var j=0;j<parseInt(shift_leng);j++){
                                var sheight = $('.row_'+k+'_'+k1+':eq('+j+')').height();
                                shift_height = parseInt(shift_height) + parseInt(sheight);
                              }
                              // console.log("for loop end:\t"+shift_height);
                              var tmp_count = Object.keys(res['Part_details'][k][k1]).length;
                              var correct_height = 0;
                              if (parseInt(tmp_count)==1) {
                                if (k1 === "A") {
                                  correct_height = parseInt(shift_height)+2;  
                                }else{
                                  correct_height = parseInt(shift_height)+1.6;
                                }
                                
                              }else if(parseInt(tmp_count)>1){
                                if (k1 === "A") {
                                  correct_height = parseInt(shift_height)-1;
                                }else{
                                  correct_height = parseInt(shift_height)-1.5;
                                }
                                
                              }
                              
                              // var machine_height = $('.'+k).height();
                              // machine_height = parseInt(machine_height);
                              // console.log("Machine Height"+machine_height);
                              $('.'+k+'_'+k1).css("height",correct_height+"px");
                              $('.downtime_'+k+'_'+k1).css("height",correct_height+"px");
                              // $('#height_'+k).css("height",machine_height+"px");
                              id = parseInt(id) +1;
                          });
                        });



                       
                    });

                  color_change_value();
                  $("#overlay").fadeOut(300);
                },
                statusCode: {
               
                  500: function(){

                    $('.contentProduction').html("<p>No Records Some Error In Data Passing!</p>");
                    $("#overlay").fadeOut(300);
                    console.log("Record Issue in controller or Model site Because the status code is 500");
                  },
                  404:function(){
                    $('.contentProduction').html("<p>Data Getting File Not Found!</p>");
                    console.log("Data Passing Issue in Controller [ or ] Controller Function[ example names] ");
                  }
                },
                error:function(err){
                    // console.log("error"+err);
                    $("#overlay").fadeOut(300);
                }
            });
      }
      

   


    // this function get the curent date 
    function getcurrent_date(){
      const current_date = new Date();

      var d = String(current_date.getDate()).padStart(2, '0');
      var m = String(current_date.getMonth() + 1).padStart(2, '0'); //January is 0!
      var y = current_date.getFullYear();
      var today_date = y+"-"+m+"-"+d;

      // return "2023-06-10";
      return today_date;
    }

    // get downtime graph text for float to hour minute and seconds
    function getdowntime_text(downtime_val){
      var hour = parseInt(parseInt(downtime_val)/3600);
      var minute = parseInt(parseInt(downtime_val)/60);
      var second = parseInt(parseInt(downtime_val)%60);
      var tmp_hour = 0;
      if (parseInt(hour)>0) {
       tmp_hour = parseInt(hour);
      }else{
        tmp_hour = 0;
      }

      // minute
      var tmp_minute = 0;
      if (parseInt(minute)>0) {
        tminute = parseInt(downtime_val) -  parseInt(parseInt(hour)*3600);
        tmin = parseInt(tminute)/60;
        if (parseInt(tmin)>0) {
          tmp_minute = parseInt(tmin);
        }else{
          tmp_minute = 0;
        }
      }else{
        tmp_minute = 0;
      }

      // returning
      var downtime_text = "";
      if ((parseInt(tmp_hour)>0) && (parseInt(tmp_minute)>0) && (parseInt(second)>0)) {
        downtime_text = tmp_hour+"h "+tmp_minute+"m "+second+"s";
      }
      else if ((parseInt(tmp_minute)>0) && (parseInt(second)>0)) {
        downtime_text = tmp_minute+"m "+second+"s";
      }
      else if ((parseInt(tmp_hour)>0) && (parseInt(tmp_minute)>0)) {
        downtime_text = tmp_hour+"h "+tmp_minute+"m ";
      }
      else if ((parseInt(tmp_hour)>0) && (parseInt(second)>0)) {
        downtime_text = tmp_hour+"h 0m "+second+"s";
      }else if(parseInt(second)>0){
        downtime_text = second+"s";
      }else if (parseInt(tmp_minute)>0) {
        downtime_text = tmp_minute+"m";
      }else{
        downtime_text = tmp_hour+"h";
      }
      return downtime_text;
    }

    //  get downtime text using seconds for each reason
    function getdowntime_val_text(downtime_val){
      var hour = parseInt(parseInt(downtime_val)/3600);
      var minute = parseInt(parseInt(downtime_val)/60);
      var second = parseInt(parseInt(downtime_val)%60);
      var tmp_hour = 0;
      if (parseInt(hour)>0) {
       tmp_hour = parseInt(hour);
      }else{
        tmp_hour = 0;
      }

      // minute
      var tmp_minute = 0;
      if (parseInt(minute)>0) {
        tminute = parseInt(downtime_val) -  parseInt(parseInt(hour)*3600);
        tmin = parseInt(tminute)/60;
        if (parseInt(tmin)>0) {
          tmp_minute = parseInt(tmin);
        }else{
          tmp_minute = 0;
        }
      }else{
        tmp_minute = 0;
      }

      // returning
      var downtime_text = "";
      if ((parseInt(tmp_hour)>0) && (parseInt(tmp_minute)>0) && (parseInt(second)>0)) {
        downtime_text = tmp_hour+"h "+tmp_minute+"m "+second+"s";
      }
      else if ((parseInt(tmp_minute)>0) && (parseInt(second)>0)) {
        downtime_text = tmp_minute+"m "+second+"s";
      }
      else if ((parseInt(tmp_hour)>0) && (parseInt(tmp_minute)>0)) {
        downtime_text = tmp_hour+"h "+tmp_minute+"m ";
      }
      else if ((parseInt(tmp_hour)>0) && (parseInt(second)>0)) {
        downtime_text = tmp_hour+"h 0m "+second+"s";
      }else if(parseInt(second)>0){
        downtime_text = second+"s";
      }else if (parseInt(tmp_minute)>0) {
        downtime_text = tmp_minute+"m";
      }else{
        downtime_text = tmp_hour+"h";
      }
       
      return downtime_text;
    }


    // value color change
  function color_change_value(){
    var target_len =  $('.target_pds').length;
    // console.log("product value color change"+target_len);
    for(var i=0;i<parseInt(target_len);i++){
      const tval = $('.target_pds:eq('+i+')').text();
      const tpval = $('.tpp_pds:eq('+i+')').text();
      if (parseInt(tval) === parseInt(tpval)) {
        $('.tpp_pds:eq('+i+')').css("color","#005abc");
      }
      else if(parseInt(tpval) > parseInt(tval)){
        $('.tpp_pds:eq('+i+')').css("color","#3cb371");
      }
      else if(parseInt(tpval) < parseInt(tval)){
        $('.tpp_pds:eq('+i+')').css("color","#C00000");
      }
          
      // console.log("target value:\t"+i+"value:\t"+tval);
    }

  }

   

// every one hour automatic run code function
function current_date_auto_run() {
  //get the mins of the current time
  var mins = new Date().getMinutes();
  var cur_date = new Date();
  var cd = String(cur_date.getDate()).padStart(2, '0');
  var cm = String(cur_date.getMonth() + 1).padStart(2, '0'); //January is 0!
  var cy = cur_date.getFullYear();
  const tmp_current_date = cy+"-"+cm+"-"+cd;
  // if (mins == "00") {
    var date_inp = $('#changed_date').val();

    if (tmp_current_date === date_inp) {
      load_allfiles();
      color_change_value();
    }
}

// one hour
// setInterval(tick,3600000);
// one minute to  milliseconds 
setInterval(current_date_auto_run,300000);


</script>