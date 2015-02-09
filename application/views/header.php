<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Summer Bucket List Ideas For Your Next Holiday| FateCrew.com</title>

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
        <meta name="description" content="Picture this, you and your crew on that lifetime experience you have on your bucket list, the same adventure they have also longed for. You’ll be admired by your crew for the laughs, the fun, the memories.">
        <meta name="keywords" content="Summer Bucket List Ideas">
        <meta name="author" content="Fate Crew">
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