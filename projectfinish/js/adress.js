  $(function(){
    
     $("#Shop_adress")
	  .geocomplete()
	  .bind("geocode:result", function(event, result){
	    //console.log(result.geometry.location.jb);
	    //console.log(result.geometry.location.lat());
	    //console.log(result.geometry.location.lng());

	    $("#Shop_lat").val(result.geometry.location.lat());
	    $("#Shop_lng").val(result.geometry.location.lng());
	  });
	
  
	/*$("#Shop_adress").geocomplete({
         	details: "form",
          	detailsAttribute: "data-geo"
          
        });*/

        
   });


 

 