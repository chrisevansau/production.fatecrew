<p>Booking Page</p>
<p>&nbsp;</p>
<p><?=$event_id?></p>
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
				
				 FB.api('/<?=$event_id?>/attending','post',function(resp) {
        			console.log(resp); // should return true
    			});			
			}, {scope: 'create_event'});
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