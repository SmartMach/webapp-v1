
<script>
    // $(document).load(function(){
        

//financial Metrics ajax part start//
    $.ajax({
        url: "<?php echo base_url('Home/getGoalsFinancialData'); ?>",
        type: "POST",
        dataType: "json",
        success:function(res){
            
            $('#OTEEP').html(
                        res[0].overall_teep
            );
            $('#OOOE').html(
                        res[0].overall_ooe
            );
            $('#OOEE').html(
                        res[0].overall_oee
            );
            $('#Performance').html(
                        res[0].availability
            );
            $('#Quality').html(
                        res[0].performance
            );
            $('#Availability').html(
                        res[0].quality
            );
            $('#OEE').html(
                        res[0].oee_target
            );

            $('#EOTEEP').val(res[0].overall_teep);
            $('#EOOOE').val(res[0].overall_ooe);
            $('#EOOEE').val(res[0].overall_oee);
            $('#EPerformance').val(res[0].performance);
            $('#EQuality').val(res[0].quality);
            $('#EAvailability').val(res[0].availability);
            $('#EOEE').val(res[0].oee_target);
        },
        error:function(res){
            alert("Sorry!Try Agian!!");
        }
    });
    // });
</script>