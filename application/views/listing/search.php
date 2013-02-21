
<div class="contnet">
<? $count =0;?>
<? for($i=0;$i<count($listings);$i++){?>

  <div class="contnet">
    <div class="full_row_listing">
      <img src="/listing_images/<?=$listings[$i]['image']?>" width="66" />
      <div class="title"><h2><?=substr($listings[$i]['bucket_list_name'],0,50)?></h2></div>
      <div class="desc"><?=substr($listings[$i]['desc'],0,200)?>...</div>
      
      <?=anchor("/deal/".str_replace( " ","-", $listings[$i]['search_engine_name']), "view", "class='button'")?> 
    </div>
  </div>
  
  <? $count++;?>
  <? }?>
  
  <? if($i==0){?>
  <p>No serch results found</p>
  <? } ?>
</div>
