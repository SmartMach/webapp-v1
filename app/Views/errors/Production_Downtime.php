 
<style type="text/css">
    #chart{
      max-height: 10rem;
      width: 100%;
      margin: auto;
      padding: 10px;
      margin-top: 0.6rem;
    } 
    .marginlr{
      margin-left: 0.2rem;
      margin-right: 0.2rem;
    }
    .ICONDiv{
      display: flex;
      justify-content: center;
    }
    .ICON{
      font-size: 1.2rem;
      color: #595959;
    }
    .doth {
      height: 2rem;
      width: 2rem;
      border-radius: 50%;
      display: flex;
      text-align: center;
      align-items: center;
      justify-content: center;
    }
    .doth:hover{
      cursor: pointer;
      background: #cccccc;
    }

    .edit-split {
      position: relative;
    }
    .edit-split .edit-Subsplit {
      display: none;
      position: absolute;
      border-radius: 6px 6px 6px 6px;
      border:1px solid #d9d9d9;
      background: #fff;
      color: #595959;
      font-size: 12px;
      right:2.5rem;
      top: 0px;
      z-index: 1000;
      width: 22rem;
      height: 10rem;
    }
    .pvalue{
      font-family: 'Roboto', sans-serif;
      margin-top: 1rem;
      margin-bottom: 1rem;
    }

/* custom tooltip  strategy code*/
.d-flex{
      display: flex;
      flex-wrap: wrap;
      flex-direction: row;
      
    }
    .col-6{
      width: 50%;
      font-size: 1rem;
     
      /* font-weight: bold; */
    }
    .col-text{
      padding-left: 1rem;
      font-size: 0.8rem;
      font-weight:bold;
      font-family: 'Roboto';
      color:rgb(241, 92, 92);
    }
    .col-val{
      color:rgb(245, 41, 126);
      font-size: 0.8rem;
      font-family: 'Roboto';
    }
    .inEdit{
      display: none;
    }
    .inEditValue{
      display: none;
    }
    .addNotesReason{
      display: none;
    }
    .doneEdit{
      display: none;
    }
    /*.split_input:nth-child(1) #settings_div div div .delete-split{
      display: none;
    }*/
    .labelGraph{
      /*background-color: blue;*/
      height: 10px;
      width: 10px;
      margin-right: 0.5rem;
    }
    .labelGraph1{
      /*background-color: blue;*/
      height: 5px;
      width: 15px;
      margin-right: 0.5rem;
    }

    .labelAlign{
      margin-left: 0.5rem;
      margin-right: 1rem;
    }

    .text-label-graph p{
      font-family:'Roboto-Regular';
      font-size:0.8rem;
      color:#999999;
      margin-left: 0.5rem;
    }
    .text-label-graph-end{
      display: flex;
      justify-content: end;
    }
    .text-label-graph-end p{
      font-family:'Roboto-Regular';
      font-size:0.8rem;
      color:#999999;
      margin-right: 0.5rem;
    }

 
    .Tooltip_Container{
      height:max-content;
      width: max-content;
      padding: 0.5rem;
      z-index: 3000;

    }
    .nameHeader{
      color: #595959;
      font-weight: bold;
      font-family: 'Roboto', sans-serif;
      font-size: 0.9rem;
    }
    .contentName{
      color: #595959;
      font-family: 'Roboto', sans-serif;
      font-size: 0.8rem;
    }
    .durationVal{
      color: #bfbfbf;
      font-family: 'Roboto', sans-serif;
      font-size: 0.8rem;
    }
    .leftAllign{
      margin-left: 0.5rem;
    }
    
    /*graph icons*/
    .icon_img_wh{
      width: 1.2rem;
      height: 1.2rem;
    }
     .icon_img_wh1{
      width: 1.4rem;
      height: 1.4rem;
    }


</style>

<div style="margin-left: 4.5rem;">
        <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav">
          <div class="container-fluid paddingm" style="margin-top:0.2rem;">
            <p class="float-start p3" id="logo">Downtime</p>
            <div class="d-flex">
                    <p class="float-end stcode" style="color:#005CBC;font-size:1rem; ">
                        <span  id="Iactive">03</span> Machine OFF
                    </p>
                    <p class="float-end stcode" style="color: #C00000;font-size:1rem;">
                        <span  id="Active">02</span> Unnamed
                    </p>
              </div>
          </div>
        </nav>
        <nav class="navbar navbar-expand-lg sub-nav sticky-top fixinnersubnav">
          <div class="container-fluid paddingm " style="margin-top:1rem;">
              <div>
                <span class="float-start paddingm labelAlign center-align p4"><div class="labelGraph" style="background: #01bb55"></div><p class="paddingm p3">Active</p></span>
                <span class="float-start paddingm labelAlign center-align  p4"><div class="labelGraph" style="background: #005abc"></div><p class="paddingm p3">Inactive</p></span>
                <span class="float-start paddingm labelAlign center-align p4"><div class="labelGraph" style="background: #595959"></div><p class="paddingm p3">Machine OFF</p></span>
                <span class="float-start paddingm labelAlign center-align p4"><div class="labelGraph1" style="background: #c55911"></div><p class="paddingm p3">Machine OFF / Unnamed</p></span>
              </div>
              <div class="d-flex innerNav">
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                            <select class="form-select font_weight" name="" id="Production_MachineName" style="width: 10rem;">
                            </select>
                            <label for="inputSiteNameAdd" class="input-padding ">Machine Name</label>
                        </div>
                    </div>
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                            <input  type="date" class="form-control font_weight" name="" id="Production_shift_date" style="width: 10rem;">
                            <label for="inputSiteNameAdd" class="input-padding ">Shift Date</label>
                        </div>
                    </div>
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                            <select class="form-select font_weight" name="" id="RejectShift" style="width: 10rem;">
                             <!--  <option value="1">shift1</option>
                              <option value="2">shift2</option> -->
                            </select>
                            <label for="inputSiteNameAdd" class="input-padding ">Shift</label>
                        </div>
                    </div> 
              </div>
          </div>
        </nav>
<br>
<br>
        <!-- Downtime Graph -->
        <div class="chart-div">
            <div id="chart"></div>
            <div class="text-label-graph" style="width: 50%;float: left;">
              <p  id="shift_start_time_label" class="starttime"></p>
            </div>
            <div class="text-label-graph-end" style="width: 50%;float: left;">
              <p  id="shift_end_time_label" class="endtime"></p>
            </div>
        </div>
        <!--  -->
        <div class="tableContent downtimeHeader" style="display: none;">
          <div class="settings_machine_header sticky-top fixtabletitle">
              <div class="row paddingm">
                  <div class="col-sm-1 p3 paddingm">
                    <p class="basic_header">START TIME</p>
                  </div>
                  <div class="col-sm-1 p3 paddingm" style="word-wrap: break-word;flex-wrap: wrap;">
                    <p class=" basic_header">DURATION
                      <br>
                      (min)
                    </p>
                  </div>
                  <div class="col-sm-1 p3 paddingm">
                    <p class="basic_header">END TIME</p>
                  </div>
                  <div class="col-sm-1 p3 paddingm">
                    <p class="basic_header">CATEGORY</p>
                  </div>
                  <div class="col-sm-2 p3 paddingm">
                    <p class="basic_header">REASON</p>
                  </div>
                  <div class="col-sm-2 p3 paddingm">
                    <p class="basic_header">TOOL NAME</p>
                  </div>
                  <div class="col-sm-2 p3 paddingm">
                    <p class="basic_header">PART NAME</p>
                  </div>
                  <div class="col-sm-2 p3 paddingm" style="justify-content: center;">
                    <p class="basic_header">ACTION</p>
                  </div>
              </div>
          </div>

          <!-- Graph split content will be displayed in this div -->
        <div class="contentMachine paddingm ">
          <div class="split_input"></div>
        </div> 
      </div> 

<div class="modal fade" id="DeleteSPlit" tabindex="-1" aria-labelledby="DeleteSPlit1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="DeleteSPlit1" style="">CONFIRMATION MESSAGE</h5>
            </div>
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to delete this machine record?</label>
                    <p class="settings-machineAdd-model">Downtime duration will merge with its parent record</p>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn deleteRec" name="" value="SAVE" style="color: white;background: #005abc;">SAVE</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditSPlit" tabindex="-1" aria-labelledby="EditSPlit1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="EditSPlit1" style="">EDIT NOTES</h5>
            </div>
                <div class="modal-body">
                    <div class="box">
                      <div class="input-box fieldStyle">  
                          <textarea class="form-control NotesValue" id="NotesValue" rows="3"></textarea>    
                          <br>
                          <!-- <input type="text" class="form-control" id="" name=""> -->
                          <label for="inputMachineName" class="input-padding">Notes</label>
                      </div>
                      <input type="text" name="" class="indexNotes" id="indexNotes" style="display: none;">
                    </div>

                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn saveNotes" name="" data-bs-dismiss="modal" value="SAVE" style="color: white;background: #005abc;">SAVE</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
    </div>
  </div>
</div>
        
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
var UserNameRef = "<?php //echo($this->data['user_details'][0]['User_Name'])?>";
var UserRoleRef ="<?php //echo($this->data['user_details'][0]['Role'])?>";
var UserSiteRef ="<?php //echo($this->data['user_details'][0]['Site_ID'])?>";

//alert((2).toFixed(2));
//document.getElementsByClassName('ndelete')[0].style.display="none";

var data_array = new Array();
var data_time = new Array();
var event_ref= new Array();
var split_ref = new Array();
var machineEventIdRef ="";
var machineID_ref = "";
var shift_date_ref = "";
var shift_Ref ="";
var data_duration = new Array();
var data_notes = new Array();
var down_category = new Array();
var down_reason =new Array();
var down_tool = new Array();
var down_part = new Array();
var down_notes = new Array();
var machine_Name = "";

var down_category = new Array();

var down_reason_val = new Array();

var count_click = 0;
const index_arr = new Array();


//alert(UserSiteRef);
$(document).ready(function(){

  // var delete_icon = document.getElementsByClassName('delete-split');
  // delete_icon[0].style.display = "none";
  $("#Production_shift_date").attr('readonly',true);
  $('#RejectShift').attr('readonly',true);

  // Ajax function for dropdown machine names
  $('#Production_MachineName').empty();
  $.ajax({
    url: "<?php echo base_url('Home/retirve_machine_data'); ?>",
    method:"post",
    dataType:"json",
    success:function(result_machine){
      //alert(result_machine);
      // var elements = $('<option value="all" selected>All</option>');
      var elements = $();
      $('#Production_MachineName').append('<option value="" selected="true" disabled>Select</option>');
      result_machine.forEach(function(item){
       // alert(item.Machine_Id);
        elements = elements.add('<option value="'+item.machine_id+'" mname="'+item.machine_name+'">'+item.machine_name+'-'+item.machine_id+'</option>');
        $('#Production_MachineName').append(elements);
      });
    },
    error:function(err){
      alert("Error");
    }
  });
      $("#RejectShift").removeAttr("readonly");
  });

// then if you change the machine dropdown to enable the date input
$(document).on('change','#Production_MachineName',function(){
  var machinename = $('#Production_MachineName').val();
  if (machinename == "select") {
    $('#Production_shift_date').attr('readonly',true); 
  }else{
    $('#Production_shift_date').removeAttr('readonly');
  }
});

// then if you choose production_shift_date then retirve the particular day shifts
$(document).on('change','#Production_shift_date',function(){
  var production_machine_name = $('#Production_MachineName').val();
  var production_shift_date = $('#Production_shift_date').val();
  $('#RejectShift').empty();
  //
  $.ajax({
    url:"<?php echo base_url('Home/production_shift_retrive'); ?>",
    method:"post",
    data:{production_machine_name:production_machine_name,production_shift_date:production_shift_date},
    dataType:"json",
    success:function(production_shift){
      // alert(production_shift);
      var elements = $();
      $('#RejectShift').append('<option value="" selected="true" disabled>Select</option>');
      production_shift['shift'].forEach(function(item){
        //alert(item.Shifts);
        elements = elements.add('<option value="'+item.Shifts+'">Shift '+item.Shifts+'</option>');
      });
      $('#RejectShift').append(elements);
      $('#RejectShift').removeAttr('readonly');
    }
  });
});

$(document).on('change','#RejectShift',function(){
  var machine_name = $('#Production_MachineName').val();
  var shift_date = $('#Production_shift_date').val();
  var shift = $('#RejectShift').val();
  // alert(machine_name+" "+shift_date+" "+shift);
  if(machine_name !="select" && shift_date !="" && shift !="select"){
    getDownTimeGraph();
  }
  
});

$(document).on("click", ".delete-split", function(){
    var index = $('.delete-split').index(this);
    // $(this).closest('.rowData').remove();
    var ref =$(this).attr("splitRef");
    
    $('#DeleteSPlit').modal('show');
    $(document).on("click", ".deleteRec", function(){
      // alert(data_array);
        var startTime = "";
        var endTime="";
        var duration="";
        // Remove the current deleted row........
        $('.rowData:eq('+index+')').remove();
        $('#DeleteSPlit').modal('hide');
        if (index == 1) {
          var tmp = data_array[0].split(".");
          var tmpVal = parseInt(tmp[0])+parseInt(data_array[index]);
          data_array[0] = tmpVal+"."+tmp[1];
          duration = data_array[0];
          // alert("Index 1");
        }
        else{
          data_array[index-1] = parseInt(data_array[index-1])+parseInt(data_array[index]);
          duration = data_array[index-1];
        }
        data_array.splice(index, index);
        //alert(data_time.length);

        // data_time[(2*index)-1] = data_time[(2*index)-1];
        if (data_time.length >2) {
          startTime = data_time[(2*index)-2];
          data_time[(2*index)-1] = data_time[(2*index)+1];
          endTime = data_time[(2*index)-1];
        }
        data_time.splice(index,2);
        
        // alert("Start ="+startTime+"Duration ="+duration+" End ="+endTime);
        //alert(data_array);
        l = data_array.length;
        for (var i = 0; i<l; i++) {
          $('.startTime:eq('+i+')').text(data_time[2*i]);
          $('.endTime:eq('+parseInt(i)+parseInt(1)+')').text(data_time[parseInt(2*i)+1]);
          $('.ReasonDuration:eq('+i+')').text(data_array[i]);
          $('.sval:eq('+i+')').val(data_array[i]);
        }
       alert("Start ="+startTime+"Duration ="+duration+" End ="+endTime);
       // alert();
    //Update after Delete......
      $.ajax({
        url: "<?php echo base_url('Home/deleteSPlit'); ?>",
        type: "POST",
        dataType: "json",
        data:{
          ref:machineEventIdRef,
          End_time:endTime,
          duration:duration,
          SplitRef:ref,
          // Split_Ref:split_ref,
          Start_time:startTime,
        },
        success:function(res){
          alert("Record removed!!");
          //alert(res);
        },
        error:function(err){
          alert("Something went wrong!!");
        }    
      });
    }); 

});
    
    var IndexNotes = 0;
    $(document).on("click", ".addNotesReason", function(){
      var index = $('.addNotesReason').index(this);
      IndexNotes = index;
      var l=data_notes.length;    
      //Show Model..........
      $('#EditSPlit').modal('show');
      $('.NotesValue').val(data_notes[index]);
      
    });
    //Model save click event........
    $(document).on("click",".saveNotes",function(){
        var x = $('.NotesValue').val();
        data_notes[IndexNotes] = x;
    });

    $('#EditSPlit').on('hidden.bs.modal', function () {
      $('.NotesValue').val("");
    });
    $(document).on("click", ".addNotes", function(){
      if ($(this).parent().siblings('div').children('.inEdit').css('display').toLowerCase() == 'none') {
        $(this).parent().siblings('div').children('.inEdit').css('display','block');
        $(this).parent().siblings('div').children('.paraEdit').css('display','none');
        

        $(this).css("display","none");
        $(this).siblings('.reasonInfo').css("display","none");
        $(this).siblings('.delete-split').css("display","none");
        $(this).siblings('.splitclick').css("display","none");
        $(this).siblings('.doneEdit').css("display","block");
        $(this).siblings('.addNotesReason').css("display","block");
        //$('.paraEdit').css("display","none");
      }
      else{
        $(this).parent().siblings('div').children('.inEdit').css('display','none');
        $(this).parent().siblings('div').children('.paraEdit').css('display','block');
        //$('.inEdit').css("display","none");
        //$('.paraEdit').css("display","block");
      }

    $(document).on("change", ".DownCategoryValue", function(){
      var val = this.value;
      //alert($(this).parent().siblings('div').children('.ReasonCategory').html());
      //$(this).parent().siblings('div').children('.ReasonCategory').text("val");
      $(this).siblings('.ReasonCategory').text(val);
    });

    $(document).on("change", ".DownReasonValue", function(){
      var val = this.value;
      var count = $('.DownReasonValue');
      var index_value = count.index($(this));
      for (var i = 1 ; i <= down_reason.length; i++) {
        if (i == val) {
          $(this).siblings('.ReasonName').text(down_reason[i-1]);;
        }
      }
      if (val==2 || val==5) {
        document.getElementsByClassName('edit_input3')[index_value].style.display="inline";
        document.getElementsByClassName('edit_input4')[index_value].style.display="inline";
        document.getElementsByClassName('edit_display3')[index_value].style.display="none";
        document.getElementsByClassName('edit_display4')[index_value].style.display="none";
      }
      else{
        document.getElementsByClassName('edit_input3')[index_value].style.display="none";
        document.getElementsByClassName('edit_input4')[index_value].style.display="none";
        document.getElementsByClassName('edit_display3')[index_value].style.display="inline";
        document.getElementsByClassName('edit_display4')[index_value].style.display="inline";
      } 
    });
    $(document).on("change", ".DownTool", function(){
      var index = this.value;
      //var x = $(".DownTool").attr("mn");
      // var count = $('.DownToolVal');
      // var index_value = count.index($(this));
      for (var i = 1; i <= down_tool.length; i++) {
        var x = document.getElementsByClassName('DownToolVal')[i].getAttribute("tvalue");
        var y = x.split("."); 
        if (y[1] == index) {
          $(this).siblings('.ToolName').text(down_tool[i]);
          //alert(down_tool[i]);
        }
      } 
    });

    $(document).on("change", ".DownPart", function(){
      var val = this.value;
      // alert(down_part);
      for (var i = 1; i <= down_part.length; i++) {
        var x = document.getElementsByClassName('DownPartVal')[i].getAttribute("pval");
        var y = x.split("."); 
        if (y[1] == val) {
          $(this).siblings('.PartNameValue').text(down_part[i]);
          // alert(down_part[i]);
          // alert(down_tool[i]);
        }
      }
      // $(this).attr("href");
    });

    });

    $(document).on("click", ".edit-split", function(){
        if($(this).children(".edit-Subsplit").css('display').toLowerCase() == 'none'){
            // $(".edit-subMenu").css("display","block");
            $(this).children(".edit-Subsplit").css("display","block");
        }
        else{
            $(this).children(".edit-Subsplit").css("display","none");
        }
        $(document).mouseup(function(e) 
        { 
            var container = $(".edit-Subsplit");
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                container.hide();
            }
        });
    });

   function drawGraph(start,svalue,end,machineEventRef,notes,reason=null,part=null,tool=null,splitId,last_updated_by,last_updated_on){
    $( ".split_input" ).append('<div id="settings_div" class="rowData">'
            +'<div class="row paddingm">'
                +'<div class="col-sm-1 col marleft" ><p class="startTime">'+start+'</p></div>'
                +'<div class="col-sm-1 col marleft" >'
                    +'<input type="text" value="'+svalue+'" class="form-control inEdit form-control-md sval edit_input" id="val_g" required="true" name="val_g[]">'
                    +'<p class="paraEdit ReasonDuration edit_display" id="ReasonDuration">'+svalue+'</p>'
                +'</div>'        
                +'<div class="col-sm-1 col marleft" >'
                    +'<p class="startTime">'+end+'</p>'
                +'</div>'
                +'<div class="col-sm-1 col marleft" >'
                    +'<select class="form-select inEdit marginlr DownCategoryValue edit_input1">'
                      // +'<option value="planned">Planned</option>'
                      // +'<option value="unplanned" selected>Unplanned</option>'
                    +'</select>'
                    +'<p class="paraEdit ReasonCategory edit_display1" id="ReasonCategory">Unplanned</p>'
                +'</div>'
                +'<div class="col-sm-2 col marleft DownReasonDiv" >'
                  +'<select class="form-select inEdit marginlr DownReason DownReasonValue edit_input2">'
                      // +'<option>Tool Changeover</option>'
                      // +'<option>Break Down</option>'
                  +'</select>'
                  +'<p class="paraEdit ReasonName edit_display2" id="ReasonName">'+reason+'</p>'
                +'</div>'
                +'<div class="col-sm-2 col marleft" >'
                  +'<select class="form-select inEditValue marginlr DownTool edit_input3">'
                      // +'<option>Tool Name1</option>'
                      // +'<option>Tool Name2</option>'
                  +'</select>'
                  +'<p class="paraEditValue  edit_display3 ToolName">'+tool+'</p>'
                +'</div>'
                +'<div class="col-sm-2 col marleft" >'
                  +'<select class="form-select inEditValue marginlr DownPart edit_input4">'
                      // +'<option>Part Name1</option>'
                      // +'<option>Part Name2</option>'
                  +'</select>'
                  +'<p class="paraEditValue  PartNameValue edit_display4">'+part+'</p>'
                +'</div>'
                +'<div class="col-sm-2 col marleft ICONDiv">'
                    +'<span class="doth splitclick center-align clickdb dataUpdateVal nsplit" dvalue="'+end+'"  svalue="'+svalue+'" evalue="'+end+'" refVal="'+machineEventRef+'" splitRef="'+splitId+'" reason="'+reason+'" tool="'+tool+'" part="'+part+'"><img src="<?php echo base_url('assets/img/split.png'); ?>" class="icon_img_wh  ICON"></span>'
                    +'<span class="doth addNotes edit_visible npencil"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="icon_img_wh ICON "></span>'
                    +'<span class="doth addNotesReason dedit" value=""><img src="<?php echo base_url('assets/img/notes.png'); ?>" class="icon_img_wh ICON"></span>'
                    +'<span class="doth doneEdit dcheck" split="1" ><img src="<?php echo base_url('assets/img/tick.png'); ?>" class="icon_img_wh1 ICON" style="color:white;"></span>'
                    +'<span class="doth edit-split ninfo reasonInfo" >'
                      +'<img src="<?php echo base_url('assets/img/info.png'); ?>" class="icon_img_wh ICON info_click"  data_val="'+last_updated_by+'">'
                      +'<div class="edit-Subsplit" >'
                          +'<div style="display: flex;width: 100%;">'
                            +'<div style="width: 50%;float: left;height: 100%;">'
                              +'<p class="marleft p1 pvalue">Last Updated by</p>'
                            +'</div>'
                            +'<div style="width: 50%;float: left;height: 100%;">'
                              +'<p class="marleft pvalue"><span class="info_last_data"></span></p>'
                            +'</div>'
                          +'</div>'
                          +'<div style="display: flex;width: 100%;">'
                            +'<div style="width: 50%;float: left;height: 100%;">'
                              +'<p class="marleft p1 pvalue">Last Updated on</p>'
                            +'</div>'
                            +'<div style="width: 50%;float: left;height: 100%;">'
                              +'<p class="marleft pvalue"><b>'+getdate_time(last_updated_on)+'</b></p>'
                            +'</div>'
                          +'</div>'
                          +'<div style="display: flex;width: 100%;">'
                            +'<div style="width: 50%;float: left;height: 100%;">'
                              +'<p class="marleft p1 pvalue">Notes</p>'
                            +'</div>'
                            +'<div style="width: 50%;float: left;height: 100%;">'
                              +'<p class="marleft pvalue">'+notes+'</p>'
                            +'</div>'
                          +'</div>'
                      +'</div>'
                    +'</span>'
                    +'<span class="doth delete-split ndelete" style="" refVal="'+machineEventRef+'" splitRef="'+splitId+'"><img src="<?php echo base_url('assets/img/delete.png'); ?>" class="icon_img_wh1 ICON" ></span>'
                    +'<span class="doth circleMatch" style=""></span>'          
                +'</div>'
            +'</div>'
        +'</div>'); 
      return;
   }

    // Initialize the variables for check the first shift 

    var shiftFlag = 0;
    var shiftStartTime;

    //getDownTimeGraph();
    function getDownTimeGraph(){
      var machine_id = $('#Production_MachineName').val();
      var shift_date = $('#Production_shift_date').val();
      var shift = $('#RejectShift').val();
      // if(machine_name !="select" && shift_date !="" && shift !="select"){
      //   getDownTimeGraph();
      // }
      // alert();
      var url = "<?php echo base_url('Home/getDownGraph'); ?>";
      $.ajax({
           method: 'GET',
           url: url,
           dataType:'json',
           data:{
            machine_id:machine_id,
            shift_date:shift_date,
            shift:shift
           }
      }).then(function(response){           
              
                response['shift']['shift'].forEach(function(item){
                  if (item.Shifts == shift) {
                    $('.starttime').html(item.start_time);
                    $('.endtime').html(item.end_time);
                    shift_stime = item.start_time;
                    shift_etime = item.end_time;
                  }
                });

                $('#chart').empty();
                var graph_Data = [];
                var machine_on_count=[];
                var machine_off_count=[];
                var tool_change_count=[];
                var i=0;
                var preview ="";
                var val;
                var start="";
                var end="";
                var x=0;

                //Empty Graph
                // var shift_stime = "14:30:00:00";
                // var shift_etime="22:30:00:00";
                var shift_stime = shift_stime;
                var shift_etime=shift_etime;

                var split_shift_stime = shift_stime.split(":");
                var split_shift_etime = shift_etime.split(":");

                var sm = split_shift_stime[1];
                var sh = split_shift_stime[0];
                var ss = split_shift_stime[2];
                //alert(split_shift_etime); 

                $.each(response['machineData'],function(key,model){
                  //alert(model.notes);
                  down_notes.push(model.notes);
                  data_duration.push(model.start_time);
                  data_duration.push(model.end_time);
                  var colordemo = "";
                  machineID_ref = model.machine_id;
                  shift_date_ref = model.shift_date;
                  shift_Ref = model.shift_id;

                  colordemo = color_bar(model.event,model.reason_mapping);
                  var machineEvent =model.machine_event_id;
                  event_ref.push(model.machine_event_id);
                  // var downReason = model.downtime_reason_id;
                  // down_reason.push(model.downtime_reason_id);
                  // alert(downReason);

                  //Code for fill empty color
                  var tmpDataTimeSplit = model.start_time.split(":"); 

                  //Temporary variables for hour,minute,second
                  var em=tmpDataTimeSplit[1];
                  var eh =tmpDataTimeSplit[0];
                  var es=tmpDataTimeSplit[2];

                  var sv = parseInt(sh*60*60)+parseInt(sm*60)+parseInt(ss);
                  var ev = parseInt(eh*60*60)+parseInt(em*60)+parseInt(es);
                  ///alert(model.part_id);

                  if (sv != ev) {
                    var x = ev-sv;
                    var vh = Math.floor(x/(3600));
                    var vtt = (x)-(vh*3600);
                    var vm= Math.floor(vtt/60);
                    var vs = Math.floor(vtt%60);
        
                    var d = parseFloat(parseInt(vh*60)+parseInt(vm));
                    colordemo = color_bar("No Data",0);
                    var stimeData = ""+sh+":"+sm+":"+ss;
                    graph_Data.push({name:"No Data",data:[(d).toFixed(2)],color:colordemo,start:stimeData,end:model.start_time,machineEvent:machineEvent,down_notes:model.notes});
                  }

                  te = model.end_time.split(":");
                  sh = te[0];
                  sm = te[1];
                  ss = te[2];
                  graph_Data.push({name:model.event,data:[model.duration],color:colordemo,start:model.start_time,end:model.end_time,machineEvent:machineEvent,down_notes:model.notes});

                  if (key == (response['machineData'].length -1)) {
                    //alert(key);
                    var tmpDataTimeSplit = model.end_time.split(":"); 
                    sm=tmpDataTimeSplit[1];
                    sh =tmpDataTimeSplit[0];
                    ss=tmpDataTimeSplit[2]; 

                    eh = split_shift_etime[0];
                    em = split_shift_etime[1];
                    es = split_shift_etime[2];

                    var sv = parseInt(sh*60*60)+parseInt(sm*60)+parseInt(ss);
                    var ev = parseInt(eh*60*60)+parseInt(em*60)+parseInt(es);


                    if (sv != ev) {
                      var x = ev-sv;

                      var vh = Math.floor(x/(3600));
                      var vtt = (x)-(vh*3600);
                      var vm= Math.floor(vtt/60);
                      var vs = Math.floor(vtt%60);

                      var stimeData = ""+eh+":"+em+":"+es+"";
                      var d = parseInt(vh*60)+parseInt(vm);
                      colordemo = color_bar("No Data",0);
                      graph_Data.push({name:"No Data",data:[(d).toFixed(2)],color:colordemo,start:model.end_time,end:stimeData,machineEvent:machineEvent,down_notes:model.notes});
                    }
                  }
                    
                });  
              
                var options = {

                    series: graph_Data,
                    chart: {
                    type: 'bar',
                    //height: 80,
                    height: 100,
                    stacked: true,
                    stackType: '100%',
                    sparkline: {
                      enabled: true
                    },
                    stroke: {
                      width: 0,
                      colors: ['#fff']
                    },
                    events:{
                      click:function(event, chartContext, config){
                        //alert();
                        //function for find the split records
                        $('.split_input').empty();  

                        count_click = 0;
                        index_arr.length=0;
                        data_notes.length=0;
                        
                        //Commented for checking...........
                        // DownReason();
                        // DownTool(); 
                        // DownPart();
                                
                        //console.log(config);
                        var inval = config.seriesIndex;
                        var svalue = config.config.series[inval].data[config.dataPointIndex];
                        var sname = config.config.series[inval].name;
                        var start = config.config.series[inval].start;
                        var end = config.config.series[inval].end;
                        var machineEventRef = config.config.series[inval].machineEvent;
                        machineEventIdRef = config.config.series[inval].machineEvent;

                        $.ajax({
                          url: "<?php echo base_url('Home/findSplit'); ?>",
                          type: "POST",
                          dataType: "json",
                          data:{
                            ref:machineEventRef, 
                          },
                          success:function(res){
                            data_time=[];
                            data_array=[];
                            split_ref =[];

                            // alert(res);
                            // res.forEach(function(item){
                            //   alert(item.start_time);
                            // });  
                            
                            if (res.length > 0) {
                              var z = 0;
                              res.forEach(function(item){
                                
                                var notes = item.notes;
                                var downReason = item.downtime_reason_id;
                                if ((item.event != "Active")&&(item.event != "No Data")&&(item.split_duration >=1) ) {
                                  $('.downtimeHeader').css("display","block");
                                  shiftStartTime = start ; 

                                  // alert(item.split_duration);
                                  data_time.push(item.start_time);
                                  data_time.push(item.end_time);
                                  data_array.push(item.split_duration);
                                  split_ref.push(item.split_id);
                                  
                                  var reason = findDownReason(item.downtime_reason_id);
                                  //Draw Graph
                                  partid = item.part_id;
                                  toolid = item.tool_id;

                                  //var last_updated_by = res[]
                                
                                  // alert(reason);
                                  drawGraph(item.start_time,item.split_duration,item.end_time,item.machine_event_id,item.notes,reason,partid,toolid,item.split_id,item.last_updated_by,item.last_updated_on);

                                  $(".delete-split:eq(0)").css("display","none");
                                  $(".circleMatch:eq(0)").css("display","block");
                                
                                  machineEventIdRef = item.machine_event_id ;
                                  overall_value = svalue;
                                }
                                else {
                                  $('.downtimeHeader').css("display","none");
                                }

                                //function for retrive data......
                                DownReasonUpdate(z,reason);
                                DownToolUpdate(z,toolid);
                                DownPartUpdate(z,partid);
                                z=parseInt(z)+1;
                                
                              });

                            }
                          },
                          error:function(res){
                              alert("Sorry!Try Agian!!");
                          }
                        });
                        
                      }
                    }
                  },
                  plotOptions: {
                    bar: {
                      horizontal: true,
                    },
                  },
                  xaxis: {
                    tickPlacement: 'on',
                    labels: {
                      show:false,
                      formatter: function (val) {
                        return val + "M"
                      }
                    }
                  },
                  yaxis: {
                    title: {
                      text: undefined
                    },
                  },
                  // grid: {
                  //   show: true,
                  //   borderColor: '#90A4AE',
                  //   xaxis: {
                  //     lines: {
                  //       show: true 
                  //      }
                  //    },  
                  //   yaxis: {
                  //     lines: { 
                  //       show: true
                  //      }
                  //    },
                  // },
                  //main
                  // tooltip: {
                  //   // y: {
                  //   //   formatter: function (val, { series, seriesIndex, dataPointIndex, w }) {
                  //   //     return val + "M"
                  //   //   }
                  //   // }
                    
                  // },
                  //
                  tooltip: {
                    custom: function({series, seriesIndex, dataPointIndex, w}) {
                      var data = w.globals.initialSeries[seriesIndex].data[dataPointIndex];
                      var sname = w.globals.initialSeries[seriesIndex].name;
                      var start_time = w.globals.initialSeries[seriesIndex].start;
                      var end_time = w.globals.initialSeries[seriesIndex].end;
                      var part_id = w.globals.initialSeries[seriesIndex].part_id;
                      // alert(part_id);
                      //var machineEventRef = w.globals.initialSeries[seriesIndex].machineEvent;
                      
                      return ('<div class="Tooltip_Container">'+'<div>'
                            +'<p class="paddingm nameHeader">Machine Name</p>'
                            +'<p class="paddingm contentName">Part Name</p>'
                            +'<p class="paddingm contentName leftAllign"><span>'+start_time+' to </span><span>'+end_time+'</span></p>'
                            +'<p class="paddingm durationVal leftAllign">'+data+'m</p>'
                          +'</div>'
                        +'</div>'
                              
                      );
                    },


                  },


                  fill: {
                    opacity: 1              
                  },
                  legend: {
                    position: 'top',
                    horizontalAlign: 'left',
                    //offsetX: 10,
                    offsetY: -10,
                    show:false
                  },
                  annotations: {
                      points:[
                        {
                          x: 30,
                          y: 300,
                          marker: {
                            size: 8,
                            fillColor: '#fff',
                            strokeColor: 'red',
                            radius: 2
                          }
                        }
                      ]
                },
              };

              var chart = new ApexCharts(document.querySelector("#chart"), options);
              chart.render();

              // alert(data_duration);
              // DownReason();
              // DownTool();
              // DownPart();
        }); 
      }
      
      function color_bar(color,reason){
        var colordemo = "";
        if(color == "Machine OFF"){
          if (reason == 1) {
            colordemo = "#686868";
          }
          else{
            colordemo = "#888888";
          }
        }
        else if(color == "Active"){
          colordemo= "#01bb55";
        }
        else if(color == "No Data"){
          colordemo="#f2f2f2";
        }
        else{
          if (reason == 1) {
            colordemo = "#4F8DF2";
          }
          else{
            colordemo = "#015BBC";
          }
          
        }
        return colordemo;
      }

  var tmpArr = [];
  tmpArr=[];
  tmpArrEnd=[];
  $(document).on('click','.splitclick',function(){

    //Total record(row) count....
    var count = $('.splitclick');
    //Index value of splitted row.....
    var index1 = count.index($(this));
    //Duration value of the clicked row.....
    var svalue = document.getElementsByClassName('sval')[index1].value;
    //Split id for clicked row......  
    var splitRef = $(this).attr("splitRef");
    //Machine Event Id Reference for splitted row......
    var refVal = $(this).attr("refVal");

    //alert(refVal);

    //End value of the Total event(parent)....
    var dvalue = $(this).attr("dvalue");

    //var svalue = $(this).attr("svalue");
    //End value of the Total event....
    var evalue = $(this).attr("evalue");
    //Reason Id...
    var reason = $(this).attr("reason");
    //Tool Id....
    var tool = $(this).attr("tool");
    //Part Id...
    var part = $(this).attr("part");

    //Temporary value for is_split occured.......
    var tempSplit = 0;
  ///UI data updated code drop from here..........

    if (svalue === "") {
      alert('please select the value');
    }
    else{
      
      //check the current splitted duration is greater than 1, because minimum 2 is required for split.....
      if (parseInt(svalue)>1) {
        //Array for store splitted Data.....
        var splitData = [];
        //Make Splite....
        var split_value = svalue / 2;      
        var smal_val = parseInt(split_value);
        if (index1 == 0) {
          var mathv = parseInt(split_value);
        }
        else{
          var mathv = Math.ceil(split_value);
        }
      
        //progress for graph data updation
        //Update the value in data_array(global variable)....
        
        if (index1 == 0) {
          var fistSec = data_array[0].split(".");
          data_array[index1] = mathv+"."+fistSec[1];
        }
        else{
          data_array[index1] = mathv;
        }

        //Variable for split data passing
        splitData[0] = data_array[0];
        splitData[1] = smal_val;

        data_array.splice([index1 + 1],0,smal_val);
        document.getElementsByClassName('sval')[index1].value = mathv;

        //length of the data_array array....
        var l = data_array.length;
        //start value of the array.....
        var stime = data_time[0];
        //var endtime = data_time[1];

        data_time=[];
        //Calculation for seconds data.....
        var tmpStime = stime.split(":");
        var sh=parseInt(tmpStime[0]);sm=parseInt(tmpStime[1]);ss=parseInt(tmpStime[2]);
        if (parseInt(sh)<=9) {
            sh = "0" + sh;
          }
          if (parseInt(sm)<=9) {
            sm = "0"+sm;
          }

          if (parseInt(ss)<=9) {
            ss = "0" +ss;
          }
          stime = sh+":"+sm+":"+ss;
        //convert the values to seconds.....
        var xtmpStime = parseInt(parseInt(tmpStime[0]*60*60)+parseInt(tmpStime[1]*60)+parseInt(tmpStime[2]));
        var firstSecond = data_array[0].split(".");
        //alert(firstSecond);
        for(let i=0;i<l;i++){
          data_time.push(stime);
          //total seconds...
          if (i==0) {
            var t = parseInt(xtmpStime)+parseInt(parseInt(firstSecond[0])*60);
          }
          else{
            var t = parseInt(xtmpStime)+parseInt(data_array[i]*60);
          }
          //hour conversion, (one hour = 3600 seconds).....
          //alert(t);
          var h = parseInt(t/3600);
          var tmp = parseInt(parseInt(t)-parseInt(h*3600));
          var m = parseInt((tmp)/60);
          if (i == (l-1)) {
            var s = parseInt(parseInt(tmp) - parseInt(m*60)+ parseInt(firstSecond[1]));
            firstSecond[1] = 0;
          }
          else{
            var s = parseInt(parseInt(tmp)-parseInt(m*60));
          }
          if (i==0) {
            var tm = data_array[0].split(".");
            data_array[0] = tm[0]+"."+firstSecond[1];
          }

          var eh=h;em=m;es=s;
          if (parseInt(h)<=9) {
            eh = "0" + h;
          }
          if (parseInt(m)<=9) {
            em = "0"+m;
          }

          if (parseInt(s)<=9) {
            es = "0" + s;
          }

          var endTime = eh+":"+em+":"+es;
          data_time.push(endTime);
          xtmpStime = parseInt(parseInt(h*60*60)+parseInt(m*60)+parseInt(s));
          stime = endTime;
          //alert(s);
        }
        
    }
    else{
      alert("Minimum Split Reached!");
      tempSplit =1;
    }
    }

  if (tempSplit != 1) {
    //Alternate calculation for splitDataPass........
    var splitDataPass = [];
    //alert(index1);
    var indxVal = index1;
    var indxData = index1;
    //alert(data_time);
    // if(data_array.length != 1){
      for (var i = 0; i < 2; i++) {
        //alert(indxVal);
        if (index1 == 0) {
          splitDataPass.push(data_time[parseInt(indxVal)]);
          splitDataPass.push(data_time[parseInt(parseInt(indxVal)+parseInt(1))]);
        }
        else{
          splitDataPass.push(data_time[parseInt(parseInt(indxVal)+parseInt(1))]);
          splitDataPass.push(data_time[parseInt(parseInt(indxVal)+parseInt(2))]);
        }
        splitDataPass.push(data_array[indxData]);
        indxVal = indxVal+2;
        indxData=indxData+1;
      }

          //Display the current values in UI
      DownReasonUpdate(index1,reason);
      DownToolUpdate(index1,tool);
      DownPartUpdate(index1,part);

      //update for index+1 because split gives two rows, so we need to poit values to index+1 element..
      DownReasonUpdate(index1+1,reason);
      DownToolUpdate(index1+1,tool);
      DownPartUpdate(index1+1,part);

    // Insert the start time of each split record
      // $('.split_input').empty();
      // var TmpIndex=0;
      // for (let i = 0; i < l; i++) {
      //   //Draw Graph required values.....
      //   //drawGraph(start,svalue,end,machineEventRef,notes,reason=null,part=null,tool=null,splitRef)
      //   drawGraph(data_time[TmpIndex],data_array[i],data_time[parseInt(TmpIndex)+1],machineEventIdRef,down_notes[i],reason,part,tool,i);
      
      //   $(".delete-split:eq(0)").css("display","none");
      //   $(".circleMatch:eq(0)").css("display","block");
      //   TmpIndex = parseInt(TmpIndex)+2;
      // }
    
    var eventRefVal = $(this).attr('refVal');
    // Ajax function for store splitted value in database
    var shift_date_split = document.getElementById('Production_shift_date').value;
    var shift_id_split = document.getElementById('RejectShift').value;
    alert("Ref = "+eventRefVal+"Split Ref= "+splitRef+" Data = "+splitDataPass);
    $.ajax({
      url: "<?php echo base_url('Home/splitDownGraph'); ?>",
      type: "POST",
      dataType: "json",
      data:{
          // MachineRef:"MC1003",
          // ShiftRef:"B",
          // DateRef:"2022-04-07",
          shift_id:shift_id_split,
          shift_date:shift_date_split,
          Data:splitDataPass,
          SplitRef:splitRef,
          Ref:eventRefVal
      },
      success:function(res_Site){ 
        if (res_Site == true) {
          alert("Insert success");
          getSplittedData(machineEventIdRef,svalue);
        }
        else{
          alert("Not Inserted");
        }
      },
      error:function(res){
          alert("Sorry!Try Agian!!");
      }
    });

    tmpArr = [];
  }

});

function getSplittedData(machineEventRef,svalue){
  $.ajax({
    url: "<?php echo base_url('Home/findSplit'); ?>",
    type: "POST",
    dataType: "json",
    data:{
      ref:machineEventRef, 
    },
    success:function(res){
      $('.split_input').empty();
      data_time=[];
      data_array=[];
      split_ref =[];   
          if (res.length > 0) {
            var z = 0;
            res.forEach(function(item){
              var notes = item.notes;
              var downReason = item.downtime_reason_id;
              if ((item.event != "Active")&&(item.event != "No Data")&&(item.split_duration >=1) ) {
                $('.downtimeHeader').css("display","block");
                // shiftStartTime = start ; 

                data_time.push(item.start_time);
                data_time.push(item.end_time);
                data_array.push(item.split_duration);
                split_ref.push(item.split_id);
                
                var reason = findDownReason(item.downtime_reason_id);
                //Draw Graph
                partid = item.part_id;
                toolid = item.tool_id;

                drawGraph(item.start_time,item.split_duration,item.end_time,item.machine_event_id,item.notes,reason,partid,toolid,item.split_id,item.last_updated_by,item.last_updated_on);

                // alert(item.start_time);

                $(".delete-split:eq(0)").css("display","none");
                $(".circleMatch:eq(0)").css("display","block");
              
                machineEventIdRef = item.machine_event_id ;

                overall_value = svalue;
              }
              else {
                $('.downtimeHeader').css("display","none");
              }
              //function for retrive data......
              DownReasonUpdate(z,reason);
              DownToolUpdate(z,toolid);
              DownPartUpdate(z,partid);
              z=parseInt(z)+1;
            });
          }
    },
    error:function(res){
      alert(res);
    }
  });
}


$(document).on('click','.doneEdit',function(){
    //Reset the visibility of the input tag and paragraph tag......

    count_click = 0;
    index_arr.length=0;

    var count = $('.doneEdit');
    var index = count.index($(this));

    var dataArray = [];
    var updatedArray=[];
    var input = $( this );   
    var isplit = input.attr("split"); 
    var splitRef = $(this).siblings('.splitclick').attr('splitRef');
    var machineEventRef = $(this).siblings('.splitclick').attr('refVal');


    //functional flow for insert......
    var myObj =[];
    for (var i = 0; i <= (data_array.length-1); i++) {
      myObj= {"start_time": data_time[2*i], "split_duration": data_array[i],"end_time":data_time[(2*i)+1],"machine_id":machineEventRef,"split_id":i};

      // updatedArray.push("start_time= "+data_time[2*i]+" split_duration "+data_array[i]+" end_time= "+data_time[(2*i)+1]+" Id="+machineEventRef+" Split_id="+i);
    }

    // $('#EditSPlit').modal('show');

    $(this).parent().siblings('div').children('.inEdit').css('display','none');
    $(this).parent().siblings('div').children('.inEditValue').css('display','none');
      
    $(this).parent().siblings('div').children('.paraEdit').css('display','block');
    $(this).parent().siblings('div').children('.paraEditValue').css('display','block');
    $(this).siblings('.addNotes').css("display","block");
    $(this).siblings('.reasonInfo').css("display","block");
    $(this).siblings('.delete-split').css("display","block");
    $(this).siblings('.splitclick').css("display","block");
    $(this).css("display","none");
    $(this).siblings('.addNotesReason').css("display","none");
    $(".delete-split:eq(0)").css("display","none");
    $(".delete-split:eq(0)").css("visibility","hidden");

      // var duration = input.siblings('.dataUpdateVal').attr("svalue");
      // var start = input.siblings('.dataUpdateVal').attr("dvalue"); 
      // var end = input.siblings('.dataUpdateVal').attr("evalue");
      var category = document.getElementsByClassName('DownCategoryValue')[index].value;
      var reason = document.getElementsByClassName('DownReasonValue')[index].value;
      var toolname = document.getElementsByClassName('DownTool')[index].value;
      var partname = document.getElementsByClassName('DownPart')[index].value;

    notes = data_notes[index];
    dataArray.push(category,reason,toolname,partname,machineEventRef,splitRef,machineID_ref,shift_date_ref,shift_Ref,notes);

    // alert(split_ref);
    //Ajax function for update particular splitted value in database
    $.ajax({
      url: "<?php echo base_url('Home/updateDownGraph'); ?>",
      type: "POST",
      dataType: "json",
      data:{
          MachineRef:machineEventRef,
          SplitRef:splitRef,
          TimeArray:data_time,
          DurationArray:data_array,
          Split_Ref:split_ref,
          // ShiftRef:"1",
          // DateRef:"2022-04-07",
          Data:dataArray
      },
      success:function(res_Site){
        if (res_Site) {
          alert("Updated Successfully!!");
        } 
        else{
          alert("Something went wrong!");
        }
      },
      error:function(res){
          alert("Sorry!Try Agian!!");
      }
    });
});

  $(document).on('change','.sval',function(){
          var count2 = $('.sval');
          //index of the current selected row
          var index3 = count2.index($(this));
          //new entered duration
          var vale = document.getElementsByClassName("sval")[index3].value; 
          //actual duration before new duration enter 
          var len_split = document.getElementsByClassName("sval").length;
          var remain_value;
          //len_split = parseInt(len_split) - 1;
          //overall_value = parseInt(overall_value) - parseInt(len_split);
          var m =overall_value-(len_split-1);
          //condition check whethere total duration for that particular value is less for new enterd total value
          if (vale > m) {
            alert('Maximum split reached!');
            document.getElementsByClassName("sval")[index3].value = data_array[index3];
          }else{
            //alert(vale);
            if (vale >= 1) {
              var prev = data_array[index3];
              //check whether new entered duration is greater or less to do(addition or substraction) 
              if(vale > prev){
                    //find remaining value neede to substract from the clock wise and add it to current row
                    remain_value =parseInt(vale)-parseInt(prev);
                    i=index3;
                    var r = remain_value;
                    var v = vale;

                    var check = [];
                    //loop execute untill the remaining values get zero
                    while(r>0){
                      //check the clicked index is end of the array list to start the loop from the begining
                      if(i<(len_split-1)){
                        if (i==0) {
                          var tmp = data_array[0].split(".");
                          data_array[i] = parseInt(v)+"."+tmp[1];
                        }
                        else{
                          data_array[i] = parseInt(v);
                        }
                        //document.getElementsByClassName("sval")[i].value = data_array[i];
                        var flag = 1;
                        i= i+1;

                        nval = data_array[i];
                        //Substract the maximum substract limit from the next index value of the array(data_array)
                        if (r>nval) {
                          //substract maximum value from the next array index
                          r = (r-(nval-1));
                          prev = data_array[i]-(nval-1);
                          v = prev;
                          //v = r - data_array[i] ;
                        }
                        else{
                          nval = data_array[i];
                          if (nval !=1) {
                            v = nval-r;
                            if (i==0) {
                              var tmp = data_array[0].split(".");
                              data_array[i] = parseInt(v)+"."+tmp[1];
                            }
                            else{
                              data_array[i] = parseInt(v);
                            }
                            //data_array[i] = parseInt(v);
                            //time split checking
                            //document.getElementsByClassName("sval")[i].value = data_array[i];
                            r = (r-(nval));
                          }
                          else{
                            v=1;
                            flag = 0;
                            //i=i+1;
                          }
                        } 
                      }
                      else{
                        if (i==0) {
                          var tmp = data_array[0].split(".");
                          data_array[i] = parseInt(v)+"."+tmp[1];
                        }
                        else{
                          data_array[i] = parseInt(v);
                        }
                        //data_array[i] = parseInt(v);
                        //time split checking
                      
                        //document.getElementsByClassName("sval")[i].value = data_array[i];
                        
                        i=0;
                        nval = data_array[i]; 
                        //i= i+1;
                        nval = data_array[i];
                        if (r>nval) {
                          r = (r-(nval-1));
                          prev = data_array[i]-(nval-1);
                          v = prev;
                          //v = r - data_array[i] ;
                          //i=i+1;
                        }
                        else{
                          nval = data_array[i];
                          v = nval-r;
                          if (i==0) {
                            var tmp = data_array[0].split(".");
                            data_array[i] = parseInt(v)+"."+parseInt(tmp[1]);
                          }
                          else{
                            data_array[i] = parseInt(v);
                          }
                          //data_array[i] = parseInt(v);
                          //time split checking
                          //document.getElementsByClassName("sval")[i].value = data_array[i];
    
                          r = (r-(nval));
                        }
                      }
                      //r = parseInt(prev)-parseInt(vale);

                      //Calculation
                    var sx = data_time[0].split(":");
                    var mx= parseInt(sx[1]);
                    var hx= parseInt(sx[0]);
                    var sec = parseInt(sx[2]);
                    var nmx= mx;
                    var nhx=hx;
                    var nsec = sec;
                    var j=0;
                    var length = data_array.length;
                    while(j < length){
                      var tmp = ""+hx+":"+mx+":"+sec+"";
                      //2(i)+1 logic
                      data_time[(2*j)]=tmp;
                      mx = parseInt(mx)+parseInt(data_array[j]);
                      if (mx > 60) {
                        while(mx > 60){
                          hx = parseInt(hx)+1;
                          mx = parseInt(mx)-60;
                        }
                      }
                      nhx = hx;
                      nmx = mx;
                      nsec = sec;
                      if (j == (length-1)) {
                        var tmpCalc = data_array[0].split(".");
                        nsec= parseInt(nsec)+parseInt(tmpCalc[1]);
                        tmp = ""+nhx+":"+nmx+":"+nsec+"";
                      }
                      else{
                        tmp = ""+nhx+":"+nmx+":"+nsec+"";
                      }
                      data_time[(2*j)+1]=tmp;
                      j=j+1;
                    }
                    //Calculation for start and end time to change
                      //calcDataTiming();
                    }
                    // alert(data_array);
              }
              else{
                remain_value = parseInt(prev) - parseInt(vale);
                if (index3 ==0) {
                  var tmpsplit = data_array[0].split(".");
                  data_array[index3] = parseInt(vale)+"."+parseInt(tmpsplit[1]);
                }
                else{
                  data_array[index3] = parseInt(vale);
                }
                //time split checking
                //document.getElementsByClassName("sval")[index3].value = data_array[index3];
                
                var check = [];
                if (index3 == (data_array.length -1)) {
                  index3 = 0;
                  // new code added
                  var tmpsplit = data_array[0].split(".");
                  data_array[index3] = parseInt(tmpsplit[0])+parseInt(remain_value)+"."+parseInt(tmpsplit[1]);

                  //data_array[index3] = data_array[index3]+remain_value;

                    var sx = data_time[0].split(":");
                    var mx= parseInt(sx[1]);
                    var hx= parseInt(sx[0]);
                    var sec = parseInt(sx[2]);
                    var nmx= mx;
                    var nhx=hx;
                    var nsec=sec;
                    // alert(data_array);
                    var j=0;
                    var length = data_array.length;
                    //data_time = [];
                    while(j < length){
                      // alert(j);
                      var tmp = ""+hx+":"+mx+":"+sec+"";
                      ///alert(tmp);
                      check.push(tmp);
                      //2(i)+1 logic
                      data_time[(2*j)]=tmp;
                      mx = parseInt(mx)+parseInt(data_array[j]);
                      if (mx > 60) {
                        while(mx > 60){
                          hx = parseInt(hx)+1;
                          mx = parseInt(mx)-60;
                        }
                      }
                      nhx = hx;
                      nmx = mx;
                      nsec=sec;
                      if (j == (length-1)) {
                        var tmpCalc = data_array[0].split(".");
                        nsec= parseInt(nsec)+parseInt(tmpCalc[1]);
                        tmp = ""+nhx+":"+nmx+":"+nsec+"";
                      }
                      else{
                        tmp = ""+nhx+":"+nmx+":"+nsec+"";
                      }
                      check.push(tmp);
                      data_time[(2*j)+1]=tmp;
                      j=j+1;
                    }
                  //Calculation for start and end time to change
                  //calcDataTiming();
                }else{
                  index3 = parseInt(index3) + 1;
                  data_array[index3] = parseInt(data_array[index3])+parseInt(remain_value);
                  //2(n)+1 logic
                  var j = parseInt(2*(index3-1))+parseInt(1);
                  var sx = data_time[j].split(":");
                  var hx = sx[0];
                  var mx= parseInt(sx[1])-parseInt(remain_value);
                  var sec = parseInt(sx[2]);
                  if (parseInt(mx) <0) {
                    hx= hx-1;
                    mx= 60-parseInt(mx);
                  }
                  data_time[j] = ""+hx+":"+mx+":"+sec+"";
                  if (j == (length-1)) {
                    var tmpCalc = data_array[0].split(".");
                    sec= sec+tmpCalc[1];
                    data_time[j+1] = ""+hx+":"+mx+":"+sec+"";
                  }
                  else{
                    data_time[j+1] = ""+hx+":"+mx+":"+sec+"";
                  }
                  
                  //alert(data_time);
                }
                var navl = data_array[index3];
                //document.getElementsByClassName("sval")[index3].value =parseInt(navl) + parseInt(remain_value);

                //data_array[index3] = parseInt(navl) + parseInt(remain_value);
              }             
              
              var l=0;
              var len = data_time.length;
              while(l < len) {
                document.getElementsByClassName("startTime")[l].innerHTML=data_time[l];
                document.getElementsByClassName("startTime")[l+1].innerHTML=data_time[l+1];
                l=l+2;
              }
              var k=0;
              var dlen=data_array.length;
              while(k < dlen){
                document.getElementsByClassName("sval")[k].value =data_array[k];
                document.getElementsByClassName("ReasonDuration")[k].innerHTML=data_array[k];
                k=k+1;
              }
              //alert(data_array);
              //alert(data_time);
           }
          else{
            alert("Minimum split reached!");
          }
          // alert(data_array);
        }
   });

function calcDataTiming(){
  var sx = data_time[0].split(":");
  var mx= parseInt(sx[1]);
  var hx= parseInt(sx[0]);
  var nmx= mx;
  var nhx=hx;
  var j=0;
  var length = data_array.length;
  while(j < length){
    var tmp = ""+hx+":"+mx+"";
    check.push(tmp);
    //2(i)+1 logic
    data_time[(2*j)]=tmp;
    //document.getElementsByClassName("startTime")[(2*j)].innerHTML=tmp;
    mx = parseInt(mx)+parseInt(data_array[j]);
    if (mx > 60) {
      while(mx > 60){
        hx = parseInt(hx)+1;
        mx = parseInt(mx)-60;
      }
    }
    nhx = hx;
    nmx = mx;
    tmp = ""+nhx+":"+nmx+"";
    check.push(tmp);
    data_time[(2*j)+1]=tmp;
    //document.getElementsByClassName("startTime")[(2*j)+1].innerHTML=tmp;
    j=j+1;
  }
  // alert(data_time);
  return;
}

function addDownCategory(category){
  down_category.push(category);
}
function addDownReason(reason){
  down_reason.push(reason);
}
function addDownTool(tool){
  down_tool.push(tool);
}  
function addDownPart(part){
  down_part.push([part]);
}

  function findDownReason(ref){
    //alert(down_reason);
    var $tmpData = new Array();
    for (var i = 0; i < down_reason.length; i++) {
      if (i == ref) {
        $tmpData.push(down_reason[i-1]);
      }
    }
    return $tmpData;
  }

  function  DownReasonUpdate(ref,reason){
    $.ajax({
      url: "<?php echo base_url('Home/downtime_reason_retrive'); ?>",
      type: "POST",
      dataType: "json",
      // data: {
      //     Sname : this.value
      // },
      success:function(res_Site){
          $('.DownReason:eq('+ref+')').empty();
          $('.DownCategoryValue:eq('+ref+')').empty();
          var elements = $();
          var elementsCategory = $();
          var cat="";
          var id="";
          res_Site.forEach(function(item){
            // alert(item.downtime_category);
            if (item.downtime_reason == reason) {
              elements = elements.add('<option value='+item.downtime_reason_id+' dvalue='+item.downtime_reason_id+' selected>'+item.downtime_reason+'</option>');
              cat = item.downtime_category;
              id=item.downtime_reason_id;
            }
            else{
              elements = elements.add('<option value='+item.downtime_reason_id+' dvalue='+item.downtime_reason_id+'>'+item.downtime_reason+'</option>');
            }
          });
          if (cat=="Unplanned") {
            elementsCategory = elementsCategory.add('<option value="Unplanned" dvalue='+id+' selected>'+"Unplanned"+'</option>');
            elementsCategory = elementsCategory.add('<option value='+"Planned"+' dvalue='+id+'>'+"Planned"+'</option>');
          }
          else{
            elementsCategory = elementsCategory.add('<option value="Unplanned" dvalue='+id+'>'+"Unplanned"+'</option>');
            elementsCategory = elementsCategory.add('<option value='+"Planned"+' dvalue='+id+' selected>'+"Planned"+'</option>');
          }
          $('.DownReason:eq('+ref+')').append(elements);
          $('.DownCategoryValue:eq('+ref+')').append(elementsCategory);
          $('.ReasonCategory:eq('+ref+')').text(cat);
          
          // var x = $('.ReasonCategory:eq(0)').val();
          // alert(x);
      },
      error:function(res){
          alert("Sorry!Try Agian!!");
      }
    });
  }

  function DownToolUpdate(ref,tool){
    $.ajax({
      url: "<?php echo base_url('Home/getToolName'); ?>",
      type: "POST",
      dataType: "json",
      // data:{
      //     UserNameRef:UserNameRef,
      //     UserRoleRef:UserRoleRef,
      // },
      success:function(res_Site){   
          $('.DownTool:eq('+ref+')').empty();
          var elements = $();
          res_Site.forEach(function(item){
            if (item.tool_id == tool) {
              elements = elements.add('<option tvalue="'+item.tool_name+'.'+item.tool_id+'" class="DownToolVal" value="'+item.tool_id+'" selected>'+item.tool_name+' -'+item.tool_id+'</option>');
            }
            else{
              elements = elements.add('<option tvalue="'+item.tool_name+'.'+item.tool_id+'" class="DownToolVal" value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
            }
          });
          $('.DownTool:eq('+ref+')').append(elements);
          //$('.DownToolFirst').append(elements1);
      },
      error:function(res){
          alert("Sorry!Try Agian!!");
      }
  });
  }
  
  function DownPartUpdate(ref,part){
    $.ajax({
      url: "<?php echo base_url('Home/getPart'); ?>",
      type: "POST",
      dataType: "json",
      // data:{
      //     UserSiteRef:UserSiteRef,
      // },
      success:function(res_Site){  
        $('.DownPart:eq('+ref+')').empty();
          var elements = $();
          res_Site.forEach(function(item){
            if (item.part_id == part) {
              elements = elements.add('<option class="DownPartVal" pval="'+item.part_name+'.'+item.part_id+'" value="'+item.part_id+'" selected>'+item.part_name+' -'+item.part_id+'</option>');
            }
            else{
              elements = elements.add('<option class="DownPartVal" pval="'+item.part_name+'.'+item.part_id+'" value="'+item.part_id+'">'+item.part_name+' -'+item.part_id+'</option>');
            }
          });
          $('.DownPart:eq('+ref+')').append(elements);

          //$('.DownPartFirst').append(elements1);
      },
      error:function(res){
          alert("Sorry!Try Agian!!");
      }
  });
  }  

  DownReason();
  function DownReason(){

    $.ajax({
      url: "<?php echo base_url('Home/downtime_reason_retrive'); ?>",
      type: "POST",
      dataType: "json",
      // data: {
      //     Sname : this.value
      // },
      success:function(res_Site){
          $('.DownReason').empty();
          $('.DownReasonFirst').empty();
          var elements = $();
          var elements1 = $();
          down_reason=[];
          // alert(res_Site);
          res_Site.forEach(function(item){
            addDownReason(item.downtime_reason);
              elements = elements.add('<option value='+item.downtime_reason_id+' dvalue='+item.downtime_reason_id+'>'+item.downtime_reason+'</option>');
              elements1 = elements1.add('<option value='+item.downtime_reason_id+'>'+item.downtime_reason+' dvalue='+item.downtime_reason+'</option>');
          });
          $('.DownReason').append(elements);
          // alert(down_reason);
          $('.DownReasonFirst').append(elements1);
          //alert(down_reason);
      },
      error:function(res){
          alert("Sorry!Try Agian!!");
      }
    });
  }
  
  DownTool();
  function DownTool(){
    $.ajax({
      url: "<?php echo base_url('Home/getToolName'); ?>",
      type: "POST",
      dataType: "json",
      // data:{
      //     UserNameRef:UserNameRef,
      //     UserRoleRef:UserRoleRef,
      // },
      success:function(res_Site){   
        $('.DownTool').empty();
        $('.DownToolFirst').empty();
          var elements = $();
          var elements1 = $();
          down_tool = [];
          res_Site.forEach(function(item){
              addDownTool(item.tool_name);
              elements = elements.add('<option tvalue="'+item.tool_name+'.'+item.tool_id+'" class="DownToolVal" value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
              elements1 = elements1.add('<option value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
          });
          $('.DownTool').append(elements);
          //$('.DownToolFirst').append(elements1);
      },
      error:function(res){
          alert("Sorry!Try Agian!!");
      }
  });
  }

  DownPart();
  function DownPart(){
    $.ajax({
      url: "<?php echo base_url('Home/getPart'); ?>",
      type: "POST",
      dataType: "json",
      // data:{
      //     UserSiteRef:UserSiteRef,
      // },
      success:function(res_Site){  
        $('.DownPart').empty();
        $('.DownPartFirst').empty();
          var elements = $();
          var elements1 = $();
          down_part = [];
          res_Site.forEach(function(item){
              addDownPart(item.part_name);
              elements = elements.add('<option class="DownPartVal" pval="'+item.part_name+'.'+item.part_id+'" value="'+item.part_id+'">'+item.part_name+' -'+item.part_id+'</option>');
              elements1 = elements1.add('<option value="'+item.part_id+'">'+item.Part_Name+' -'+item.part_id+'</option>');
          });
          $('.DownPart').append(elements);
          //$('.DownPartFirst').append(elements1);
      },
      error:function(res){
          alert("Sorry!Try Agian!!");
      }
  });
  }


// downtime grap strategy code
/*
$(document).on('click','.splitclick',function(){
  var machine = "MC1001";
  var shift = 1;
  var toolid = "TL1001";
  var toolname = "Tool Name 1";
  var partid = "PT1001";
  var partname = "Part Name 1";
  var machine_status = 0;
  var downtime_status = 0;


});*/ 



// this function is first split then next click the pencile icon after click another row of pencile icon then check it for confirmation in leave or not
$(document).on('click','.edit_visible',function(){
  var count = $('.edit_visible');
  var index_value = count.index($(this));
  var edit_input = $('.edit_input').length;
  index_arr.push(index_value);
  count_click +=1;
 if (count_click == 1) {
   //alert(edit_input);
   true_value(index_value,edit_input);
 }else{
    if (confirm("Are You Sure You Should Leave The Record") == true) {
        true_value(index_value,edit_input);
    }else{
      var acount = index_arr.length;
        var invalue = index_arr[parseInt(acount-2)];
        invalue = Math.abs(invalue);
        true_value(invalue,edit_input);
        // console.log('array value:'+index_arr+"arrayindex:"+invalue);
    }
  //$('.edit_input')[index_value].css("display","inline");
 }
  

});
// this function is parent of pencil icon edit enable or disable function so this function is user define function 
function true_value(index_value,einput){
  for(var i=0;i<einput;i++){
      // $('.edit_input')[i].css("display","none");
      document.getElementsByClassName('edit_input')[i].style.display="none";
      document.getElementsByClassName('edit_input1')[i].style.display="none";
      document.getElementsByClassName('edit_input2')[i].style.display="none";
      document.getElementsByClassName('edit_input3')[i].style.display="none";
      document.getElementsByClassName('edit_input4')[i].style.display="none";

      document.getElementsByClassName('edit_display')[i].style.display="inline";
      document.getElementsByClassName('edit_display1')[i].style.display="inline";
      document.getElementsByClassName('edit_display2')[i].style.display="inline";
      document.getElementsByClassName('edit_display3')[i].style.display="inline";
      document.getElementsByClassName('edit_display4')[i].style.display="inline";
      
      // icons
      document.getElementsByClassName('dedit')[i].style.display="none";
      document.getElementsByClassName('dcheck')[i].style.display="none";
   
      document.getElementsByClassName('nsplit')[i].style.display="inline";
      document.getElementsByClassName('npencil')[i].style.display="inline";
      document.getElementsByClassName('ninfo')[i].style.display="inline";
      document.getElementsByClassName('ndelete')[i].style.display="inline";


    }
    document.getElementsByClassName('edit_input')[index_value].style.display="inline";
    document.getElementsByClassName('edit_input1')[index_value].style.display="inline";
    document.getElementsByClassName('edit_input2')[index_value].style.display="inline";
    //document.getElementsByClassName('edit_input3')[index_value].style.display="inline";
    //document.getElementsByClassName('edit_input4')[index_value].style.display="inline";

    document.getElementsByClassName('edit_display')[index_value].style.display="none";
    document.getElementsByClassName('edit_display1')[index_value].style.display="none";
    document.getElementsByClassName('edit_display2')[index_value].style.display="none";
    //document.getElementsByClassName('edit_display3')[index_value].style.display="none";
    //document.getElementsByClassName('edit_display4')[index_value].style.display="none";

    // icons
    document.getElementsByClassName('dedit')[index_value].style.display="inline";
    document.getElementsByClassName('dcheck')[index_value].style.display="inline";
   
      document.getElementsByClassName('nsplit')[index_value].style.display="none";
      document.getElementsByClassName('npencil')[index_value].style.display="none";
      document.getElementsByClassName('ninfo')[index_value].style.display="none";
      document.getElementsByClassName('ndelete')[index_value].style.display="none";

}

// get last updated by function
$(document).on('click','.info_click',function(){

  var valu = $('.info_click');
  var index_val = valu.index($(this));
  //alert(index_val);
  var last_updated_id = $(this).attr('data_val');
  //alert(last_updated_id);

  $.ajax({
    url:"<?php echo base_url('Home/graph_get_last_updated_by'); ?>",
    method:"POST",
    data:{last_updated_id:last_updated_id},
    dataType:"json",
    success:function(res){
      //console.log(res);
        $('.info_last_data').html(res[0]['first_name']+" "+res[0]['last_name']);
        $('.info_last_data').css("font-weight","bold");
    }
  });

});
</script>