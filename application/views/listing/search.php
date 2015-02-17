
<div class="contnet">
  <h1>Search Results:</h1>
   <div class="row">
  <div class="six columns">
    <div class="panel">
  <p>Add <b><?=urldecode($word)?></b> to your list? <?=anchor('/item/add_item/'.$word,'+','class="button success"' )?></p>
  <br />
  </div>
  </div>
</div>
<? $count =0;?>
<? for($i=0;$i<count($listings);$i++){?>


    <a class="full_row_listing" href="/deal/<?=$listings[$i]['slug']?>" style="display:block;">
      <img src="<?=$listings[$i]['image']?>" width="66" />
      <div class="title"><h2><?=substr($listings[$i]['bucket_list_name'],0,50)?></h2></div>
      <div class="desc"><?=substr($listings[$i]['desc'],0,200)?>...</div>
    </a>
  
  
  <? $count++;?>
  <? }?>
  
  <p><?=$count?>:Items found</p>
  
</div>
