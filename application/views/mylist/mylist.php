<div class="contnet">
<h2>my list</h2>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  

<? foreach($list as $list_item){?>
<tr>
	<td><img src="/listing_images/<?=$list_item['image']?>" width="100" /></td>
    <td><?=$list_item['bucket_list_name']?></td>
    <td><?=anchor("mylist/invite/".$list_item['listing_id'],"invite friends", "class='button'");?></td>
    <td><?=anchor( "mylist/remove/".$list_item['listing_id'], "remove", "class='button'");?></td>
    <td><?=anchor("mylist/book/".$list_item['listing_id'],"book", "class='button'");?></td>
  </tr>

<? } ?>

</table>


</div>