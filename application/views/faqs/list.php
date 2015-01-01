
<div class="blue">
	<div class="contnet">
 		<div class="one_third">
 			<img src="../../../images/logo.png" width="232" height="225" />
 		</div>
 		<div class="two_third">
			<h3>
				Having an issue?
			</h3>
			<p>Need help? Try some of the helpful hints below to resolve your issue. If the info is not in the below please contact us via the contact page.   </p>
		</div>
	</div>
</div>
<div class="contnet">
<div class="two_third">
<p style="color: green"><?php echo $this->session->flashdata('msg'); ?></p>

<h1>List - faqs</h1>

<?php if (!empty($results)): ?>


<?php forEach ($results as $row): ?>
	<h3><?=$row['title']?></h3>
	<p><?=$row['desc']?></p>
<?php endforeach; ?>

<?php endIf; ?>

<?=anchor("/contact" , "Can't Find What your looking for? Contact Us...", "class='button secondary'")?> 

</div>
<div class="one_third">
  <div class="ad"><a href="http://www.kqzyfj.com/click-7554568-11848784" target="_top">
<img src="http://www.ftjcfx.com/image-7554568-11848784" width="400" height="600" alt="" border="0"/></a></div>
</div>
<div class="clear">&nbsp;</div>
</div>