function getdate_time(last_updated_on){
	var currentdate = new Date(last_updated_on); 
        var datetime = currentdate.toLocaleString('en-us',{day:'2-digit'}) + " "
                + currentdate.toLocaleString('en-us', { month: 'long' })  + " " 
                + currentdate.getFullYear() + ", "  
                + currentdate.toLocaleString('en-us',{hour:'2-digit'}) + ":"  
                + currentdate.toLocaleString('en-us',{minute:'2-digit'})+":"
                +currentdate.toLocaleString('en-us',{second:'2-digit'})

         return datetime;
}


function getcurrent_date_time(){
	var currentdate = new Date(); 
        var datetime = currentdate.toLocaleString('en-us',{day:'2-digit'}) + " "
                + currentdate.toLocaleString('en-us', { month: 'long' })  + " " 
                + currentdate.getFullYear() + ", "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes()+":"
                +currentdate.getSeconds()


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