
<div class="blue">
	<div class="contnet">
 		<div class="one_third">
 			<img src="../../../images/logo.png" width="232" height="225" />
 		</div>
 		<div class="two_third">
			<h3>
				we would love to hear from you.
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
<?php echo form_open('contact/send'); ?>
<? if($this->session->userdata('active')){?>
<? $session_data = $this->session->userdata('loged_in');?>
<input type="hidden" name="user_id" value="<?=$session_data['user_id'] ?>" />
<? }else{?>
<p><label for="name">Full Name:</label>
<input name="name" value="" type="text" /></p>
<p><label for="email">Email:</label>
<input name="email" value="" type="text" /></p>
<? } ?>
<p><label for="subject">Subject:</label>
<input name="subject" value="" type="text" /></p>

<p><label for="message">Message:</label>
<textarea name="message" ></textarea></p>
<?php echo form_submit('submit', 'Send', 'class="button"'); ?>  <?php echo anchor("/home", "Back", 'class="button"'); ?>
<?php echo form_close(); ?>


</div>
<div class="one_third">
<div class="ad"><a href="http://www.kqzyfj.com/click-7554568-11848784" target="_top">
<img src="http://www.ftjcfx.com/image-7554568-11848784" width="400" height="600" alt="" border="0"/></a></div>
</div>
</div>