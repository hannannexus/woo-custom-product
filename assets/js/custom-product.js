jQuery(document).ready(function($){
    
    $("#quantity").on("change",function(){

        var main_block = "#main";
        var quantity = parseInt($(this).val());
        
        var p_one = $(".wrap").clone();
        $(p_one).removeAttr("class");
         $(main_block).empty();
        for( var i = 0; i < quantity; i++ ){
            let inner_html=$(p_one).html();
            console.log(inner_html);
            if(i==0){
                $(main_block).append(`<div class="wrap">${inner_html}</div>`);
            }else{
                $(main_block).append(`<div>${inner_html}</div>`);
            }
           
            // console.log(p_one[0]);
        }

        $( "#main" ).accordion( "refresh" );
       
    }); /* end onChange section */

      /* Jquery UI accordion */

      $( "#main" ).accordion({
        header: "h3",
        active: 2,
        collapsible: true
      });
});