<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="/javascripts/jquery.min.js" type="text/javascript"></script> 
<title>Loading...</title>
<link href="/stylesheets/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '360920813983587', // App ID
      channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here
	
	 FB.login(function(response) {
   if (response.authResponse) {
     FB.api('/me?fields=username,first_name,last_name,email,gender,location ,birthday,id,picture', function(response) {
		 //console.log(response);
		 //alert(response.location.name);
		 //alert(response.id);
       	$.ajax({
  			url: "/user/fackbook_create",
  			type: "POST",
        	data: ({user_name: response.username,first_name: response.first_name, last_name: response.last_name, email:response.email, gender:response.gender, facebook_id:response.id, location:response.location.name, dob:response.birthday, pic:response.picture }),
			
			}).done(function(output) { 
  			console.log(output);
			
			window.location = "/dock"
		});
     });
   } else {
     console.log('User cancelled login or did not fully authorize.');
   }
 }, {scope: 'email,user_birthday'});
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));

</script>
<img class="loader" src="http://www.gseforsale.aero/images/ajax-loader.gif" />

</body>
</html>
