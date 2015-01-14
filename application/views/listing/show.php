<link href="/stylesheets/listing.css" rel="stylesheet" type="text/css" />
<div class="header_feat">
  <div class="listing_img_over">&nbsp;</div>
  
  <div class="header_img mar_top" style="background-image:url(<?=$result[0]['image']?>);background-size: 1000px;"></div>
 <div class="header_content">
  <div class="contnet">
 <div class="one_third">
  <a href="/dock"><img src="../../images/logo.png" width="232" height="225" /></a>
  </div>
  <div class="two_third">
  
  </div>
  </div>
  </div>
</div>

<div class="contnet">
<div class="two_third">
<h1><?=$result[0]['bucket_list_name']?></h1>
<span >By - <?=$result[0]['company']?></span>

<p><?=nl2br($result[0]['desc'])?></p>

<?=anchor( $result[0]['go_to_url'], "Buy Now", "class='button'")?>    <?=anchor( "/mylist/book/".$result[0]['id'], "Add to my bucket list")?><br /><br />
<iframe width="681" height="195" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.au/maps?hl=en&amp;client=firefox-a&amp;q=<?=$result[0]['company']?>&amp;output=embed"></iframe>
</div>
<div class="one_third">
  <h2 style="padding-left:160px; font-size: 46px;">ONLY: $<?=$result[0]['sales_cost']?></h2>
<? switch($status){
		default:?>
		<a href="/login/"><img src="/images/invite.jpg" class="add" width="233" height="358" border="0" /></a>
      <?  break; 
       case "not_in_list":?>
		<a href="/mylist/invite/<?=$result[0]['id']?>"><img src="/images/invite.jpg" class="add" width="233" height="358" border="0" /></a>
        <? break;?>
    <? case "in_list_with_friend":?>
		<a href="/mylist/book/<?=$result[0]['id']?>"><img src="/images/booknow.jpg" class="add" width="233" height="358" border="0" /></a>
        <? break;?>
    <? case "in_list_no_friends":?>
		<a href="/mylist/invite/<?=$result[0]['id']?>"><img src="/images/invite.jpg" class="add" width="233" height="358" border="0" /></a>
        <? break;?>
<? }?>
</div>
<div class="clear">&nbsp;</div>
</div>

