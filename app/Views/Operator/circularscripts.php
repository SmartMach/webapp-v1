<script src="<?php echo base_url(); ?>/assets/js/"></script>
<script>
      let number=document.getElementById("number");
        let counter=0;
        setInterval(() => {
            if (counter==65){
                clearInterval();

            }
            else{
                counter+=1;
                number.innerHTML=counter+"%";

               
            }
            
        },30);

        $(document).ready(function(){
            var btn_group = document.getElementsByClassName("btng");

            
        });
       
</script>