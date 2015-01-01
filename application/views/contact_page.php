
<div class="blue">
	<div class="contnet">
 		<div class="one_third">
 			<img src="../../../images/logo.png" width="232" height="225" />
 		</div>
 		<div class="two_third">
			<h3>
				we would love to hear from you.
			</h3>
			<p>Need to get in touch? Drop us a line below in the contact form and we’ll get back to you shortly. You can also try our FAQs page with many helpful tips and tricks.  </p>
			<p>Don’t forget to add us on your favourite social network. You can see the links to all our networks in the footer at the bottom of the page.</p>
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