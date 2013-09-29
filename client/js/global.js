	function getloction(id){
		$("#id").val(id);
		if(navigator.geolocation){
        	navigator.geolocation.getCurrentPosition(setloction, onError);
    		
	 	}
		
	}
	function setloction(event){
		$("#loctionX").val(event.coords.latitude);
		$("#loctionY").val(event.coords.longitude);
		document.myFrom.submit();
	  	
	}
	function onError(event)
	{
		alert("Error code " + event.code + ". " + event.message);
	}

								
				 
					 
		
	

