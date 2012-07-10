(function()
{
	if(window.DeviceOrientationEvent) 
	{
		var body = document.body,
			degrees;
        	
		window.addEventListener('deviceorientation', function(eventData)
		{		
        	degrees = (eventData.gamma * 0.05) * -1;
        	if(degrees < -1 || degrees > 1) rotate(degrees);
	        if(degrees > -1 && degrees < 1) rotate(0);
        }, false);
        
        var rotate = function(deg)
        {
	    	body.style.webkitTransform = "rotate("+ deg +"deg)";
	        body.style.transform = "rotate("+ deg +"deg)";
        }
    }
}());