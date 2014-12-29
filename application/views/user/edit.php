
<script>
$(document).ready(function() {
	$("#details").submit(function (){
		val = 0;
		
		
		if($('input[name="user_name"]').val() == ""){p = $('input[name="user_name"]').parent(); p.addClass("error"); val++;}
		if($('input[name="first_name"]').val() == ""){p = $('input[name="first_name"]').parent(); p.addClass("error"); val++;}
		if($('input[name="last_name"]').val() == ""){p = $('input[name="last_name"]').parent(); p.addClass("error"); val++;}
		if($('input[name="email"]').val() == ""){p = $('input[name="email"]').parent(); p.addClass("error"); val++;}
		if($('input[name="dob"]').val() == ""){p = $('input[name="dob"]').parent(); p.addClass("error"); val++;}
		
		if(val<1){
			return true;
		}else{
			return false;	
		}
	});
});
</script>
<div class="blue">
	<div class="contnet">
 		<div class="one_third">
 			<img src="../../../images/logo.png" width="232" height="225" />
 		</div>
 		<div class="two_third">
			<h3>
				update you account settings
			</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In fermentum fermentum est, lacinia fermentum nibh commodo vel. Integer a est tellus. Integer eu libero tellus. Integer lobortis leo at dolor pharetra sit amet cursus mi fermentum. Praesent vel libero est. Ut dictum enim ut nulla adipiscing vitae faucibus lectus placerat. Mauris vel erat neque. Aliquam lacinia quam ac magna convallis porttitor. Curabitur odio quam, hendrerit et facilisis ut, adipiscing in lacus. Aenean lobortis massa iaculis justo consequat aliquet. Nunc id nisl lectus, et tempor est. Nullam volutpat viverra metus eu eleifend. Sed convallis rutrum tellus et consectetur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam id quam tellus. </p>
		</div>
	</div>
</div>

  
  <div class="contnet">
  <div class="two_third">
<? if($this->session->flashdata('msg')){?>
<div class="alert-box"><?php echo $this->session->flashdata('msg'); ?></div>
<? } ?>
<h1>Edit - user</h1>
<p><a href="#" class="secondary button" data-reveal-id="updatePas">Update Password</a></p>
<div id="updatePas" class="reveal-modal">
    <h2>Update Password.</h2>
    
      <?php echo form_open('user/updatePWD'); ?>
      <p><input type="hidden" name="id" value=<?php echo $result["id"]?> />
	<label for="password1">Password</label><br/>
	<input type="password" name="password" maxlength="500" size="50"  />
    <p>
	<label for="password2">Confirm Password</label><br/>
	<input type="password" name="password2" maxlength="500" size="50"  />
	</p>
	</p>
      <p>
	<?php echo form_submit('submit', 'Update', 'class="button"'); ?> 
</p>
<?php echo form_close(); ?>
    </p>
    <a class="close-reveal-modal">×</a>
  </div>
<?php echo form_open('user/update', 'id="details"'); ?>
<input type="hidden" name="id" value=<?php echo $result["id"]?> />
	<p>
	<label for="user_name">User Name</label><br/>
	<input type="text" name="user_name" value="<?php echo $result["user_name"]?>" maxlength="500" size="50"  /><small>PLease enter a user name</small>
	</p>

	<p>
	<label for="first_name">First Name</label><br/>
	<input type="text" name="first_name" value="<?php echo $result["first_name"]?>" maxlength="500" size="50"  /><small>Please enter your first name</small>
	</p>

	<p>
	<label for="last_name">Last Name</label><br/>
	<input type="text" name="last_name" value="<?php echo $result["last_name"]?>" maxlength="500" size="50"  /><small>Please enter your last name</small>
	</p>

	<p>
	<label for="email">Email</label><br/>
	<input type="text" name="email" value="<?php echo $result["email"]?>" maxlength="500" size="50"  /><small>Please enter your email address</small>
	</p>

	
	<input type="hidden" name="password" value="<?php echo $result["password"]?>" maxlength="500" size="50"  />
	

	<?=$city ?>
    

	<p>
	<label for="gender">Gender</label><br/>
    
    Male: <input name="gender" type="radio" value="m" <? if($result["gender"] == "m"){?>checked="checked"<? }?> />Female:<input name="gender" type="radio" value="f" <? if($result["gender"] == "f"){?>checked="checked"<? }?> />
    
	
	</p>

	<p>
	<label for="dob">Date of birth:</label><br/>
	<input type="text" name="dob" value="<?php echo $result["dob"]?>" maxlength="500" size="50" class="datepicker" id="dob"  /><small>Please enter your date of birth.</small>
    <script>
	$(function() {
		$( "#dob" ).datepicker({ dateFormat: "yy-mm-dd" });
	});
	</script>
	</p>

	
	<input type="hidden" name="active" value="<?php echo $result["active"]?>" maxlength="500" size="50" />
	

	
	<input type="hidden" name="date_created" value="<?php echo $result["date_created"]?>" maxlength="500" size="50"  />
	

	
	<input type="hidden" name="date_modified" value="<?php echo date("Y-m-d H:i:s"); ?>" maxlength="500" size="50"  />
	

<p>
	<?php echo form_submit('submit', 'Update', 'class="button"'); ?> <?php echo anchor("user/show_list", "Back",'class="button"'); ?>
</p>
<?php echo form_close(); ?>


    
  </div>
  <div class="one_third">
    <div class="ad"><a href="http://www.kqzyfj.com/click-7554568-11848784" target="_top">
<img src="http://www.ftjcfx.com/image-7554568-11848784" width="400" height="600" alt="" border="0"/></a></div>
  </div>
  <div class="clear">&nbsp;</div>
  </div>
