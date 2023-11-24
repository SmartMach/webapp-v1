function getdate_time(last_updated_on){
	var currentdate = new Date(last_updated_on); 
        var hour = currentdate.getHours();
        var minute = currentdate.getMinutes();
        var second = currentdate.getSeconds();

        hour = hour <=9 ? '0'+hour : hour;
        minute = minute <=9 ? '0'+minute:minute;
        second = second <=9 ? '0'+second:second;
        var datetime = currentdate.toLocaleString('en-us',{day:'2-digit'}) + " "
                + currentdate.toLocaleString('en-us', { month: 'short' })  + " " 
                + currentdate.getFullYear() + ", "  
                + hour+ ":"  
                + minute
                // + second

         return datetime;

}


function getcurrent_date_time(){
	var currentdate = new Date(); 
        var datetime = currentdate.toLocaleString('en-us',{day:'2-digit'}) + " "
                + currentdate.toLocaleString('en-us', { month: 'short' })  + " " 
                + currentdate.getFullYear() + ", "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes()
                // +currentdate.getSeconds()


      return datetime;

}


function deserialize(last_updated_on){
	var currentdate = new Date(last_updated_on);
	var datetime = currentdate.getFullYear() + "-"
	       +currentdate.toLocaleString('en-us',{month:'2-digit'}) + "-"
		+currentdate.toLocaleString('en-us',{day:'2-digit'})+ " "
		+currentdate.getHours() + ":"
		+currentdate.getMinutes() + ":"
		+currentdate.getSeconds()


	return datetime;

}


// user account registeron
function getdate(date){

        var currentdate = new Date(date);

        var date_only = currentdate.getFullYear() + "-"
                        +currentdate.toLocaleString('en-us',{month:'2-digit'})+"-"
                        +currentdate.toLocaleString('en-us',{day:'2-digit'})

                return date_only;
}



// last updated by get user name
function getlast_updated_username(){
               // var username = " ";

                // if (user_name == " ") {

                // }else{
                        user_id = "UM1001";
                        $.ajax({
                                url : "<?php echo base_url('User_Controller/getlast_updated_username'); ?>",
                                method:"POST",
                                data:{user_id:user_id},
                                dataType:"json",
                                success:function(res){
                                        alert(res);

                                }
                        });
                //}
        }

        // register on date format
function register_date(register_on){
        var currentdate = new Date(register_on); 
        // var hour = currentdate.getHours();
        // var minute = currentdate.getMinutes();
        // var second = currentdate.getSeconds();
        
                // hour = hour <=9 ? '0'+hour : hour;
                // minute = minute <=9 ? '0'+minute:minute;
                // second = second <=9 ? '0'+second:second;
        var datetime =  currentdate.getFullYear()+"-"
                + currentdate.toLocaleString('en-us', { month: 'short' })  + "-" 
                +currentdate.toLocaleString('en-us',{day:'2-digit'});             
        
        return datetime;
        
        }    