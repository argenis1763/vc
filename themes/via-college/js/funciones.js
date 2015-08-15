$(document).ready(function(){
    
   function requerimientoHide(id_contenedor)
   {   
        //$("#ocultar").click(function(event){
            //event.preventDefault();
            $(id_contenedor).hide("slow");
            $("#ocultar").hide();
            $("#mostrar").show();
        //});

   };
   
   function requerimientoShow(id_contenedor)
   {   
        //$("#mostrar").click(function(event){
          //  event.preventDefault();
            $(id_contenedor).show(3000);
            $("#mostrar").hide();
            $("#ocultar").show(); 
        //});
   };   
   
});

