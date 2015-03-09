<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$result[0]['bucket_list_name']?>| FateCrew.com</title>

<script src="/javascripts/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/stylesheets/redmond/jquery-ui-1.8.20.custom.css">
     
    <script src="/javascripts/ui/jquery.ui.core.js"></script>
    <script src="/javascripts/ui/jquery.ui.widget.js"></script>
        <script src="/javascripts/ui/jquery.ui.position.js"></script>
    <script src="/javascripts/ui/jquery.ui.tooltip.js"></script>
    <script src="/javascripts/ui/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="http://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>
        <link rel="stylesheet" href="http://view.jqueryui.com/master/themes/base/jquery.ui.all.css">
        
          <script src="javascripts/modernizr.foundation.js"></script>
    <!-- Included CSS Files -->
      <link rel="stylesheet" href="/stylesheets/foundation.css">
    <link rel="stylesheet" href="/stylesheets/app.css">
        <link rel="stylesheet" href="/stylesheets/presentation.css">
        <link href="/stylesheets/style.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" /> 
        <meta name="robots" content="INDEX, FOLLOW">
</head>

<body>

<div class="nav">
 
  <? if(!$this->session->userdata('active')){?>
  
    <div class="contnet"><?=anchor("/", "home", "class='nav_link'")?>   |   <?=anchor("/how-to-add-a-listing", "add a listinG", "class='nav_link'")?>   |   <?=anchor("/listings", "search listing", "class='nav_link'")?>    |   <?=anchor("/faqs", "faqs", "class='nav_link'")?>   |    <?=anchor("/contact", "contact", "class='nav_link'")?> 
      <div style="float:right;">
        <?=anchor("/login", "Login", "class='button tiny'")?> 
        <?=anchor("/login", "Register", "class='button tiny'")?>
      </div>
      
      <? }else{ ?>
      <div class="contnet">
        <div class="left"><!-- img id="<? //$facebook_id?>" src="<?=var_dump($pic["data"]["url"])?>"  / --> Hi, <?=$name ?> 
        </div>
<input name="search" type="text" value="Search" id="search" />
<div style="float:right;">
  <?=anchor("/dock", "dashboard", "class='nav_link'")?>   |     <?=anchor("/mylist", "my bucket list", "class='nav_link'")?>   |   <?=anchor("/listing/new_entry", "add a listinG", "class='nav_link'")?>  | <?=anchor("/accountupdate", "update my account", "class='nav_link'")?>  | <?=anchor("/contact", "contact", "class='nav_link'")?> 


        
      <?=anchor("/logout", "logout", "class='button tiny'")?>
      </div>
      <script type="text/javascript" >
      $(document).ready(function() {
      $("#search").focus(function() {
      $("#search").val(""); 
      });
      
       $("#search").blur(function() {
      $("#search").val("Search");  
      });
      
      $('#search').bind('keypress', function(e) {
        if(e.keyCode==13){
        window.location="/search/"+$("#search").val();
                //alert($('#search').val());
        }
});

      
      
    });
    </script>
      
      <? } ?>
    
  </div>
</div> 
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
<div class="two_third" itemscope itemtype="http://data-vocabulary.org/Product">
<h1 itemprop="name"><?=$result[0]['bucket_list_name']?></h1>
<span itemprop="brand">By - <?=$result[0]['company']?></span> 
<img src="<?=$result[0]['image']?>" itemprop="image" style="display:none;" />
<span itemprop="price" style="display:none;"><?=$result[0]['sales_cost']?></span>

<p itemprop="description"><?=nl2br($result[0]['desc'])?></p>

<?=anchor( $result[0]['go_to_url'], "Buy Now", "class='button success round' target='_blank'")?>   
<? switch($status){
    default:?>
    <?=anchor( "/login", "Or add to my bucket list","class='button round'")?>

<?  break; 
       case "not_in_list":
       case "in_list_with_friend":
       case "in_list_no_friends":
?>
    <?=anchor( "/mylist/add/".$result[0]['id'], "Or add to my bucket list","class='button round'")?>
        <? break;?>
  <? }?>

<br /><br />
<iframe width="681" height="195" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.au/maps?hl=en&amp;client=firefox-a&amp;q=<?=$result[0]['company']?>&amp;output=embed"></iframe>
</div>
<div class="one_third">
  <h3 style="padding-left:160px; font-size: 18px !important; margin-bottom:-16px !important;">Was: $<?=$result[0]['cost']?></h3>
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

