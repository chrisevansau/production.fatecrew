
<div class="contnet">
<? $count =0;?>
<? for($i=0;$i<count($listings);$i++){?>


    <a class="full_row_listing" href="/deal/<?=$listings[$i]['slug']?>" style="display:block;">
      <img src="<?=$listings[$i]['image']?>" width="66" />
      <div class="title"><h2><?=substr($listings[$i]['bucket_list_name'],0,50)?></h2></div>
      <div class="desc"><?=substr($listings[$i]['desc'],0,200)?>...</div>
    </a>
  
  
  <? $count++;?>
  <? }?>
  
  <? if($i==0){?>
  <p>No serch results found</p>
  <? } ?>
</div>
