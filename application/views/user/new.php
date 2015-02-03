
<div class="blue">
	<div class="contnet">
 		<div class="one_third">
 			<img src="../../../images/logo.png" width="232" height="225" />
 		</div>
 		<div class="two_third">
			<h3>
				Regisration
			</h3>
			<p>Welcome to Fate Crew! Sign up today to start living and enjoying life with your friends. </p>

<p>We want you to start living all the adventures that  you always dreamed about. Live the adventures with your friends and family and cross them off together. 
</p>
<p>Join us and lets make some memories! </p>
			</p>
		</div>
	</div>
</div>

  
  <div class="contnet">
  <div class="two_third">
    
  <h1>New - user</h1>
    <script>
$(document).ready(function() {
	
	$("#reg").submit(function (){
		$('input, textarea').focus(function(){ p = $(this).parent(); p.removeClass("error");});
		val = 0;
		
		if($('input[name="user_name"]').val() == ""){p = $('input[name="user_name"]').parent(); p.addClass("error"); val++;}
		if($('input[name="first_name"]').val() == ""){p = $('input[name="first_name"]').parent(); p.addClass("error"); val++;}
		if($('input[name="last_name"]').val() == ""){p = $('input[name="last_name"]').parent(); p.addClass("error"); val++;}
		if($('input[name="password"]').val() == ""){p = $('input[name="password"]').parent(); p.addClass("error"); val++;}
		if($('input[name="dob"]').val() == ""){p = $('input[name="dob"]').parent(); p.addClass("error"); val++;}
		//if($('input[name="gender"]').val() != "f" ||$('input[name="gender"]').val() != "m" ){$("#pick_gender").show();}else{$("#pick_gender").hide();}
		
		if($('select[name="city_id"]').val() == ""){$("#pick_city").show();}else{$("#pick_city").hide();}
		
		if($('input[name="confirm"]').val() == ""){p = $('input[name="confirm"]').parent(); p.addClass("error"); val++;}else{ 
		
			if($('input[name="password"]').val() != $('input[name="confirm"]').val()){
				$("#pwd_wrong").show();
			}else{
				$("#pwd_wrong").hide();	
			}
		}
		
		
		if($('input[name="email"]').val() == ""){p = $('input[name="email"]').parent(); p.addClass("error"); val++;} else if(!(/^[A-Z0-9._-]+@[A-Z0-9-]+(\.[A-Z0-9-]{2,})*(\.[A-Z0-9]{2,4}){1,2}$/i).test( $('input[name="email"]').val())){p = $('input[name="email"]').parent(); p.addClass("error"); val++;}
		
		
		
		// validate price 
		
		// validate email 
		
		
		
		if(val<1){ 
			return true;
		}else{
			return false;	
		}
	});
	
	
});
	</script>
  <?php echo form_open('user/create', 'id="reg"'); ?>
  <input type="hidden" name="id" value="" />
    <p>
      <label for="user_name">User name:</label><br/>
      <input type="text" name="user_name" value=""  /><small>Please choose a user name</small>	</p>
    
    <p>
      <label for="first_name">First name:</label><br/>
      <input type="text" name="first_name" value=""  />	<small>Please enter your first name</small></p>
    
    <p>
      <label for="last_name">Last name:</label><br/>
      <input type="text" name="last_name" value=""  /><small>Please enter your last name</small>	</p>
    
    <p>
      <label for="email">Email:</label><br/>
      <input type="text" name="email" value=""  /><small>Please enter a contact email, and be sure it is valid</small>	</p>
    
    <p>
      <label for="password">Password:</label><br/>
      <input type="password" name="password" value=""  />	<small>Please enter your email</small></p>
    
    <p>
    <p>
      <label for="confirm">Password confirm:</label><br/>
      <input type="password" name="confirm" value=""  />	<small>Please confirm your email</small></p>
    <div class="error" style="display:none;" id="pwd_wrong"><small>Your password does not match</small></div>
    <p>
      
      <?=$city;?>
      <div class="error" style="display:none;" id="pick_city"><small>Please pick a city</small>	</div>
      </p>
    
    <p>
      <label for="gender">Gender:</label><br/>
      Male:<input type="radio" name="gender" checked="checked" value="m" />Female:<input type="radio" name="gender" value="f" />
      <div class="error" style="display:none;" id="pick_gender"><small>Please tell us your gender</small>	</div>
    
    <p>
    	<p>
      <label for="gender">Newsletter:</label><br/>
      Sure:<input type="radio" name="newsletter" checked="checked" value="1" />No Thanks:<input type="radio" name="newsletter" value="0" />
     
    
    <p>
      <label for="dob">Birthday:</label><br/>
      <input type="text" name="dob" id="dob" value=""  /><small>Please tell us your birthday</small>	</p>
    <script>
	$(function() {
		$( "#dob" ).datepicker({ dateFormat: "yy-mm-dd",
			changeMonth: true,
			changeYear: true,
			yearRange: "1960"
		});
	});
	</script>
    
    <input type="hidden" name="active" value=""  />	
    
    
    
    <input type="hidden" name="date_created" value="<?php echo date("Y-m-d H:i:s"); ?>" maxlength="500" size="50"  />	
    
    
    
    <input type="hidden" name="date_modified" value="<?php echo date("Y-m-d H:i:s"); ?>" maxlength="500" size="50"  />	
    
  <p>
    <?php echo form_submit('submit', 'Create', 'class="button"'); ?>  <?php echo anchor("/login", "Back"); ?>
  </p>
  <?php echo form_close(); ?>
    
    
  </div>
  <div class="one_third">
    <div class="ad"><a href="http://www.kqzyfj.com/click-7554568-11848784" target="_top">
<img src="http://www.ftjcfx.com/image-7554568-11848784" width="400" height="600" alt="" border="0"/></a></div>
  </div>
  <div class="clear">&nbsp;</div>
  </div>

