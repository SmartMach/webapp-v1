// Open Sub Menu Bars
$(document).ready(function(){
    $(document).on("click", ".editOpt", function(event){
        event.preventDefault();
        event.stopPropagation();
        if($(this).parent().siblings(".element-hover-content").css('display').toLowerCase() == 'none'){
            $(this).parent().siblings(".element-hover-content").css("display","block");
        }
        else{
            $(this).parent().siblings(".element-hover-content").css("display","none");
        }
        $(document).mouseup(function(e){ 
            var container = $(".element-hover-content");
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                container.hide();
            }
        });
    });
});