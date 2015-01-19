<style type="text/css">
.my_list {
	width: 100%;
	background-image: url(/images/gray.png);
	margin-top: -145px;
	padding-top: 5px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	min-height: 382px;
	position: relative;
}
.my_row {
	background-color: #CCC;
	width: 100%;
	padding: 5px;
	overflow: auto;
	margin-bottom: 5px;
}
.my_list h1 {
	color: #FFF;
}
.my_list .big{
	bottom: 10px;
    position: absolute;
    width: 92%;
}
.my_row img, .my_row h3 {
	float: left;
}
 .my_row h3 {
	width:48%;
	margin-top: 0px;
	margin-left: 0px;
	padding-top: 0px;
	padding-right: 5px;
	padding-bottom: 0px;
	padding-left: 5px;
}
</style>
<script>
$(document).ready(function(evt){
$("#first_time").reveal('animation:fadeAndPop');
$("#find").click(function() {
	
     window.location = "/search/"+$("#value").val();
    
});

});
</script>
<div id="first_time" class="reveal-modal medium">
  <h2>Welcome to Fatecrew</h2>
  <p>Tell us one place you want to go to before you kick the bucket?</p>
  <div class="row collapse">
  <div class="nine mobile-three columns">
    <input type="text" id="value" />
  </div>
  <div class="two mobile-one columns">
     <div class="button expand postfix" id='find'>Search</div>
    
  </div>
</div>

   <a class="close-reveal-modal">&#215;</a>
</div>
<div class="blue">
	<div class="contnet">    
    <? if($this->session->flashdata('msg')){?>
<div class="alert-box"><?php echo $this->session->flashdata('msg'); ?></div>
<? } ?>
		<div class="two_third">
		  <img src="/images/logo_small.png" />
        </div>
 		<div class="two_third">
			<?=$feat; ?>
		</div>
        <div class="one_third">
          <div class="my_list">
		  <h1>My BUCKET List</h1>
          <? $count =0;?>
          <? foreach($my_list as $row){?>
		  <div class="my_row">
          <img src="<?=$row['image']?>" width="50" />
          <h3><?=substr($row['bucket_list_name'],0,26)?></h3>
          	<?=anchor("/deal/".$row['slug'], "view", "class='button secondary'")?> 
          </div>
		  <? $count ++;
		  if($count >= 4){
		  		break;
				break;
		  }
		  ?>
          
		  <? }?>
          <?=anchor("/mylist/", "View My List", "class='button big secondary'")?> 
          </div>
 			
 		</div>
	</div>
</div>
<div class="contnet">
<h2>Search Items for your bucket list</h2>
<? for($i=$start;$i<$close;$i++){?>

<a class="full_row_listing" href="/deal/<?=$listings[$i]["slug"]?>">
<img src="<?=$listings[$i]['image']?>" width="66" />
<div class="title"><h2><?=substr($listings[$i]['bucket_list_name'],0,50)?></h2></div>
<div class="desc"><?=$listings[$i]['desc']?></div>
</a>

<? }?>
<? if((int)($page) > 1){ echo anchor("/dock/page/".($page - 1), "Last", "class='button secondary'"); }?> 
<?=anchor("/dock/page/".($page + 1) , "Next", "class='button secondary'")?> 
<br />
</div>