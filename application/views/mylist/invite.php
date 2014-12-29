  <? 
	$TIME = array();
$TIME[] = array(1=>"01", 2=>"1", 3=>"am");
$TIME[] = array(1=>"02", 2=>"2", 3=>"am");
$TIME[] = array(1=>"03", 2=>"3", 3=>"am");
$TIME[] = array(1=>"04", 2=>"4", 3=>"am");
$TIME[] = array(1=>"05", 2=>"5", 3=>"am");
$TIME[] = array(1=>"06", 2=>"6", 3=>"am");
$TIME[] = array(1=>"07", 2=>"7", 3=>"am");
$TIME[] = array(1=>"08", 2=>"8", 3=>"am");
$TIME[] = array(1=>"09", 2=>"9", 3=>"am");
$TIME[] = array(1=>"10", 2=>"10", 3=>"am");
$TIME[] = array(1=>"11", 2=>"11", 3=>"am");
$TIME[] = array(1=>"12", 2=>"12", 3=>"pm");
$TIME[] = array(1=>"13", 2=>"1", 3=>"pm");
$TIME[] = array(1=>"14", 2=>"2", 3=>"pm");
$TIME[] = array(1=>"15", 2=>"3", 3=>"pm");
$TIME[] = array(1=>"16", 2=>"4", 3=>"pm");
$TIME[] = array(1=>"17", 2=>"5", 3=>"pm");
$TIME[] = array(1=>"18", 2=>"6", 3=>"pm");
$TIME[] = array(1=>"19", 2=>"7", 3=>"pm");
$TIME[] = array(1=>"20", 2=>"8", 3=>"pm");
$TIME[] = array(1=>"21", 2=>"9", 3=>"pm");
$TIME[] = array(1=>"22", 2=>"10", 3=>"pm");
$TIME[] = array(1=>"23", 2=>"11", 3=>"pm");
$TIME[] = array(1=>"24", 2=>"12", 3=>"am");
	
	?>
<style>
#people_invited{
	margin-top:10px;
}
</style>
<div id="fb-root"></div>
<script>
list = Array();
exit = false;
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '360920813983587', // App ID
      channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here
	 $("#invite").submit(function(){
		 // location:"<?=$address?>", picture :"<?=$image ?>", "privacy":"OPEN", privacy:'SECRET' , start_time:$('#date').val()+"T01:00".substring(0, 4)
			 FB.login(function(response) {
				 console.log($('#date').val()+'T19:20+'+"01:00".substring(0, 4));
			FB.api('/me/events','post',{name:"<?=substr($listing_name,0,70)?>",privacy:'SECRET', location:"<?=$address?>" ,description:"<?=$desc?><a href='<?=$go_to_url?>'>See More</a>",cover:  {source:"<?=$image?>"} ,start_time:$('#date').val()+'T19:20+'+"01:00".substring(0, 4)},function(resp) {
				console.log(resp);
				eventId =resp.id;
				$("#event_id").val(eventId);
				 FB.api('/'+eventId+'/invited?users='+$("#peopleInvited").val()+", <?=$session['facebook_id']?>",'post',function(resp) {
        			console.log(resp+"--"); // should return true
					if(resp){
						
						// window.location = "/mylist/event_create"
						console.log('called');
						return true;
						
					}else{
						return false;	
					}
    			});
    		});
	
			
			}, {scope: 'create_event,rsvp_event'});
			 return false
		});
		
	$("#fb_login").click(function (){
		
	
	 FB.login(function(response) {
		 
		
   if (response.authResponse) {
     FB.api('/me/friends/?fields=name,id,picture', function(response) {
		
		$.each(response.data, function(key,val){
			people = val.name +" - "+ val.id;
			
			pic = '<img id="'+val.id+'" alt="'+val.name+'" src="'+val.picture.data.url+'" />';
			$("#people").append(pic);
			$("#"+val.id).click(function(){$("#people_invited").append('<img id="'+val.id+'"  src="'+val.picture.data.url+'" />'); list.push(val.id); $("#peopleInvited").val(list); });
			
		});		
     });
   } else {
     console.log('User cancelled login or did not fully authorize.');
   }
 }, {scope: 'email,user_birthday'});
  });
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
<div class="contnet">
<div class="two_third">
<?php echo form_open('mylist/event_create', 'id="invite"'); ?>

<h2>Invite your friends to: <i><?=$company_name?> - <?=$listing_name?></i></h2>
	<p>
	<label for="event_date_time">Date:</label><br/>
	<input type="text" name="event_date_time" id="date" value=""  />	</p>
    
    <p>
    
    <script>
	$(function() {
		$( "#date" ).datepicker({ dateFormat: "yy-mm-dd" });
	});
	</script>
  <input type="hidden" value="01:00:00" name="time" />
	<!-- label for="time">time</label><br/>
	<select name="time">
    <?  for($i=0;$i<count($TIME);$i++){?>
    <option value="<?=$TIME[$i][1]?>:00:00"><?=$TIME[$i][2]?>:00<?=$TIME[$i][3]?></option>
    <?  } ?>
    
    
    </select -->
    
    <input type="hidden" name="people" id="peopleInvited" value="" />
    <input type="hidden" name="event_id" id="event_id" value="" />
    <input type="hidden" name="listing_id"  value="<?=$listing_id;?>" />
    <input type="hidden" name="user_id"  value="<?=$session['user_id'];?>" />
    	</p>

	<p>
<h1>Choose Your friends</h1>
<div class='large secondary button strech' id='fb_login'><img src='../../images/facebook_login_icon.jpg' width='23' height='22' />     Mobilize your Facebook crew »</div>
<div id="people"></div>
<h1>your crew</h1>
<div id="people_invited"></div>

<p>
	<?php echo form_submit('submit', 'Create', "class='button' id='go'"); ?> <?php echo anchor("/dock", "Back"); ?>
</p>
<?php echo form_close(); ?>

</div>
<div class="one_third">
  <div class="ad"><a href="http://www.kqzyfj.com/click-7554568-11848784" target="_top">
<img src="http://www.ftjcfx.com/image-7554568-11848784" width="400" height="600" alt="" border="0"/></a></div>
</div>

</div>
<div class="clear">&nbsp;</div>