
<div class="blue">
	<div class="contnet">
 		<div class="one_third">
 			<img src="../../../images/logo.png" width="232" height="225" />
 		</div>
 		<div class="two_third">
			<h3>
				Regisration
			</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In fermentum fermentum est, lacinia fermentum nibh commodo vel. Integer a est tellus. Integer eu libero tellus. Integer lobortis leo at dolor pharetra sit amet cursus mi fermentum. Praesent vel libero est. Ut dictum enim ut nulla adipiscing vitae faucibus lectus placerat. Mauris vel erat neque. Aliquam lacinia quam ac magna convallis porttitor. Curabitur odio quam, hendrerit et facilisis ut, adipiscing in lacus. Aenean lobortis massa iaculis justo consequat aliquet. Nunc id nisl lectus, et tempor est. Nullam volutpat viverra metus eu eleifend. Sed convallis rutrum tellus et consectetur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam id quam tellus. </p>
		</div>
	</div>
</div>

  
  <div class="contnet">
  <div class="two_third">
    
  <h1>New - user</h1>
    
  <?php echo form_open('user/create'); ?>
  <input type="hidden" name="id" value="" />
    <p>
      <label for="user_name">User name:</label><br/>
      <input type="text" name="user_name" value=""  />	</p>
    
    <p>
      <label for="first_name">First name:</label><br/>
      <input type="text" name="first_name" value=""  />	</p>
    
    <p>
      <label for="last_name">Last name:</label><br/>
      <input type="text" name="last_name" value=""  />	</p>
    
    <p>
      <label for="email">Email:</label><br/>
      <input type="text" name="email" value=""  />	</p>
    
    <p>
      <label for="password">Password:</label><br/>
      <input type="password" name="password" value=""  />	</p>
    
    <p>
      
      <?=$city;?>
      </p>
    
    <p>
      <label for="gender">Gender:</label><br/>
      Male:<input type="radio" name="gender" value="m" />Female:<input type="radio" name="gender" value="f" />	</p>
    
    <p>
      <label for="dob">Birthday:</label><br/>
      <input type="text" name="dob" id="dob" value=""  />	</p>
    <script>
	$(function() {
		$( "#dob" ).datepicker({ dateFormat: "yy-mm-dd",
			changeMonth: true,
			changeYear: true,
			yearRange: "1985"
		});
	});
	</script>
    
    <input type="hidden" name="active" value=""  />	
    
    
    
    <input type="hidden" name="date_created" value="<?php echo date("Y-m-d H:i:s"); ?>" maxlength="500" size="50"  />	
    
    
    
    <input type="hidden" name="date_modified" value="<?php echo date("Y-m-d H:i:s"); ?>" maxlength="500" size="50"  />	
    
  <p>
    <?php echo form_submit('submit', 'Create', 'class="button"'); ?>  <?php echo anchor("/login", "Back", 'class="button"'); ?>
  </p>
  <?php echo form_close(); ?>
    
    
  </div>
  <div class="one_third">
    <div class="ad">Content for  class "one_third" Goes Here</div>
  </div>
  <div class="clear">&nbsp;</div>
  </div>

