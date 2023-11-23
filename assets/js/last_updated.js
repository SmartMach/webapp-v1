function getlast_updated_username(user_id){
               var username4 = new Array();
               var user = " ";
               var user1 = " ";
               var example = new Array();

               // alert(user_id);
                if (user_id == " ") {
                     username4.push("Empty");
                     user = "empty";
                }else{
                       //var user_demo = null;
                    $.ajax({
                        url : "<?php echo base_url('User_Controller/getlast_updated_username');?>",
                        method:"POST",
                        data:{user_id:user_id},
                       dataType:"JSON",
                        success:function(res){
                            // username4.push(res[0].first_name);
                            // username4.push(res[0].last_name);
                            //user = res[0].first_name;
                          // user_demo = res.last_name;
                            // return username;
                            //console.log(res[0].first_name);
                            alert("res");

                        },
                        error:function(err){
                            alert("err");
                            // console.log(err);
                        }

                    });  
                    //return user_demo;     
                }
                //console.log(user);
                //sleep(2000);
                alert("Not Rereturn");
            
        }