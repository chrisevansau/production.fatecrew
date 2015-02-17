<div class="contnet">
<h2>my list</h2>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
<? foreach($items as $item){?>
<tr>
	<td><img src="http://encircle.io/images/event_icon.png" width="100" /></td>
    <td><?=$item['name']?></td>
    <td><? if(isset($item['total'])){?>
    	<?=anchor("search/".$item['name'], $item['total']." Offer", "class='button'");?>
    	<? }else{ ?>
    	<?=anchor("item/invite/".$item['id'],"invite friends", "class='button'");?>
    	<?}?>
    </td>
    <td><?=anchor( "item/delete/".$item['id'], "remove", "class='button'");?></td>
    <td><? if($item['status'] == 0){?>Mark as Done <?=anchor('item/done/'.$item['id'],"&#10003;", "class='button success'");?><?}else{?>Adventure complete<? } ?></td>
  </tr>

<? } ?>
<? foreach($list as $list_item){?>
<tr>
	<td><img src="<?=$list_item['image']?>" width="100" /></td>
    <td><?=$list_item['bucket_list_name']?></td>
    <td><?=anchor("mylist/invite/".$list_item['listing_id'],"invite friends", "class='button'");?></td>
    <td><?=anchor( "mylist/remove/".$list_item['listing_id'], "remove", "class='button'");?></td>
    <td><?=anchor($list_item['go_to_url'],"book", "class='button'");?></td>
  </tr>

<? } ?>

</table>


</div>