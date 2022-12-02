<script src="<?php echo base_url() ?>/bootstrap_5.1.3/dist/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    // validation code for startegy

      // role selection validation
     //  $('#inputRoleAdd').on('blur',function(){
     //    var sname = document.getElementById("inputRoleAdd").value;
     //    var smsg = document.getElementById("validate_role");
     //    if (sname == "") {
     //        //alert("not selected please select");
     //        smsg.classList.replace("d-none","d-inline");
     //        smsg.innerHTML = "Please Select site name";
            
     //    }
     //    else{
     //        smsg.classList.replace("d-inline","d-none");
     //        smsg.innerHTML = "";
     //    }
     // });
    // role selection validation


    // email validation start
    $(document).on('blur','#inputUserEMail',function(){
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        var email = document.getElementById("inputUserEMail").value;
        var emsg = document.getElementById("email_err");
       // var chcount = document.getElementById("")

        if (email == "") {
            emsg.classList.replace("d-none","d-inline");
            emsg.innerHTML = "Empty Email";
        }
        else if(mailformat.test(email)){
            emsg.classList.replace("d-inline","d-none");
            emsg.innerHTML = " ";

        }
        else{
            emsg.classList.replace("d-none","d-inline");
            emsg.innerHTML = "Invalid Email Id";
        }
    });



    // email validation end

    // first name validation
    $('#inputUserFirstName').on('blur',function(){
        //alert("changing");
        var fname = document.getElementById("inputUserFirstName").value.trim();
        var fname_err = document.getElementById("fname_err");
        var fname_count = document.getElementById("fname_count");
        // this hidding pattern is white space not allowed
        // var letters = /^[a-zA-Z]+$/;
        //    this pattern is white space allowed
        var letters = /^[a-z][a-z\s]*$/;
        var err_show = "";
        var character_count = "";
        fname = fname.toLowerCase();
        if (fname == "") {
            fname_err.classList.replace("d-none","d-inline");
            err_show = "Invalid Name";
        }
        else if((letters.test(fname)) && (fname.length<=25)){
           // alert("valid character");
                character_count = fname.length+"/25";
                fname_err.classList.replace("d-inline","d-none");
                err_show ="";
        }
        else{
            fname_err.classList.replace("d-none","d-inline");
            err_show = "Alphabets only and limit 25";
        }
        fname_err.innerHTML = err_show;
        fname_count.innerHTML = character_count;
    });
    // first name validation end

    // last name validation
    $('#inputUserLastName').on('blur',function(){
        //alert("changing");
        var lname = document.getElementById("inputUserLastName").value.trim();
        var lname_err = document.getElementById("lname_err");
        var lname_count = document.getElementById("lname_count");
        // this hidding pattern is white space not allowed
        // var letters = /^[a-zA-Z]+$/;
        //    this pattern is white space allowed
        var letter = /^[a-z][a-z\s]*$/;
        var msg_show = "";
        var character_count_lname = "";
        lname = lname.toLowerCase();
        if (lname == "") {
            lname_err.classList.replace("d-none","d-inline");
            msg_show = "Invalid Name";
        }
        else if((letter.test(lname)) && (lname.length<=25)){
           // alert("valid character");
                character_count_lname = lname.length+"/25";
                lname_err.classList.replace("d-inline","d-none");
                msg_show ="";
        }
        else{
            lname_err.classList.replace("d-none","d-inline");
            msg_show = "Alphabets only and limit 25";
        }
        lname_err.innerHTML = msg_show;
        lname_count.innerHTML = character_count_lname;
    });

    // last name validation end

    // mobile number validation start
    $(document).on("blur",'#inputUserPhone',function(){
        var err = document.getElementById("mobile_err");
        var mobile = document.getElementById("inputUserPhone").value;
        var msg = "";
        // waiting list the code correction checking
        // var pattern = '^([0|\+[0-9]{1,5})?([7-9][0-9]{10})$';
        // var regmob = new RegExp(pattern);
        var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;


        if (mobile == "") {
            msg = "Empty Field";
            err.classList.replace("d-none","d-inline");
        }
        else if(phoneno.test(mobile)){
            msg = "";
            err.classList.replace("d-inline","d-none");
        }
        else{
            msg = "valid mobile number";
            err.classList.replace("d-none","d-inline");
        }
        err.innerHTML = msg;

       
    });


    // mobile number validation end


    // designation validation
    $(document).on("blur","#inputUserDesignation",function(){
        var design = document.getElementById("inputUserDesignation").value.trim();
        var design_err = document.getElementById("designation_err");
        var design_count = document.getElementById("designation_count");
        // this hidding pattern is white space not allowed
        // var letters = /^[a-zA-Z]+$/;
        //    this pattern is white space allowed
        var pat_design = /^[a-z][a-z\s]*$/;
        var msg_s = "";
        var character_count_design = "";
        design = design.toLowerCase();
        if (design == "") {
            design_err.classList.replace("d-none","d-inline");
            msg_s = "Invalid Name";
        }
        else if((pat_design.test(design)) && (design.length<=25)){
           // alert("valid character");
            character_count_design = design.length+"/25";
           design_err.classList.replace("d-inline","d-none");
           msg_s ="";
        }
        else{
            design_err.classList.replace("d-none","d-inline");
            msg_s = "Alphabets only and limit 25";
        }
        design_err.innerHTML = msg_s;
        design_count.innerHTML = character_count_design;
    });

    // validation end for designation

     // sitename selection validation
     $('#inputUserSiteName').on('blur',function(){
        var sname = document.getElementById("inputUserSiteName").value;
        var smsg = document.getElementById("sname_error");
        if (sname == "") {
            //alert("not selected please select");
            smsg.classList.replace("d-none","d-inline");
            smsg.innerHTML = "Please Select site name";
            
        }
        else{
            smsg.classList.replace("d-inline","d-none");
            smsg.innerHTML = "";
        }
     });
    // sitename selection validation

    // department validation
    $("#inputUserSiteDepartment").on('blur',function(){
        var dname = document.getElementById("inputUserSiteDepartment").value;
        var dmsg = document.getElementById("dept_err");
        if (dname == "") {
            //alert("not selected please select");
            dmsg.classList.replace("d-none","d-inline");
            dmsg.innerHTML = "Please Select deparment";
            
        }
        else{
            dmsg.classList.replace("d-inline","d-none");
            dmsg.innerHTML = "";
        }
    });

    // department validation end


    // submit check all values in validation
    $(document).on("click",'#add_user_submit',function(){
        var sfname = document.getElementById("fname_user").value;
        var slname = document.getElementById("lname_user").value;
        var srole = document.getElementById("role_user").value;
        var sdept  = document.getElementById("dept").value;
        var  ssname = document.getElementById("sname_user").value;
        var smobile = document.getElementById("mobile_user").value;
        var sdesign = document.getElementById("designation_user").value;


        if (sfname !== "") {

            if (slname !== "") {
                
                if (srole !== "") {
                    
                    if (sdept !== "") {
                        
                        if(ssname !== ""){

                            if (smobile !== "") {

                                if (sdesign !== "") {
                                
                                   //document.getElementById("add_user_submit").classList.replace("d-none","d-inline"); 
                                    alert("demo");
                                }                                
                            }
                        }
                    }
                }
            }
            
        }
    });








    // validaiton code end for strategy



</script>