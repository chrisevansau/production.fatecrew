
<div class="blue">
	<div class="contnet">
 		<div class="one_third">
 			<img src="../../../images/logo.png" width="232" height="225" />
 		</div>
 		<div class="two_third">
			<h3>
				want to add a listing?
			</h3>
			<p>copy on whats in it for the customer Lorem ipsum dolor sit amet, consectetur adipiscing elit. In fermentum fermentum est, lacinia fermentum nibh commodo vel. Integer a est tellus. Integer eu libero tellus. Integer lobortis leo at dolor pharetra sit amet cursus mi fermentum. Praesent vel libero est. Ut dictum enim ut nulla adipiscing vitae faucibus lectus placerat. Mauris vel erat neque. Aliquam lacinia quam ac magna convallis porttitor. Curabitur odio quam, hendrerit et facilisis ut, adipiscing in lacus. Aenean lobortis massa iaculis justo consequat aliquet. Nunc id nisl lectus, et tempor est. Nullam volutpat viverra metus eu eleifend. Sed convallis rutrum tellus et consectetur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam id quam tellus. </p>
		</div>
	</div>
</div>

  
  <div class="contnet">
  <div class="two_third">
    
  <? for($i=0;$i<count($listings);$i++){?>

<div class="full_row_listing">
<img src="/listing_images/<?=$listings[$i]['image']?>" width="66" />
<div class="title"><h2><?=substr($listings[$i]['bucket_list_name'],0,50)?></h2></div>
<div class="desc"><?=substr($listings[$i]['desc'],0,200)?>...</div>

<?=anchor("/deal/".str_replace( " ","-", $listings[$i]['search_engine_name']), "view", "class='button'")?> 
</div>

<? }?>
    
  </div>
  <div class="one_third">
    <div class="ad">Content for  class "one_third" Goes Here</div>
  </div>
  <div class="clear">&nbsp;</div>
  </div>
