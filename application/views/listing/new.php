<style type="text/css">
.edit_bttn div{
	padding-left:5px;	
}
.edit_bttn h3{
	margin-top:0px;
}

.edit_bttn {
	background-color: #CCC;
	margin: 5px;
	padding: 10px;
	width: 97%;
}
</style>

<div class="blue">
	<div class="contnet">
 		<div class="one_third">
 			<img src="../../../images/logo.png" width="232" height="225" />
 		</div>
 		<div class="two_third">
			<h3>
				add a listing
			</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In fermentum fermentum est, lacinia fermentum nibh commodo vel. Integer a est tellus. Integer eu libero tellus. Integer lobortis leo at dolor pharetra sit amet cursus mi fermentum. Praesent vel libero est. Ut dictum enim ut nulla adipiscing vitae faucibus lectus placerat. Mauris vel erat neque. Aliquam lacinia quam ac magna convallis porttitor. Curabitur odio quam, hendrerit et facilisis ut, adipiscing in lacus. Aenean lobortis massa iaculis justo consequat aliquet. Nunc id nisl lectus, et tempor est. Nullam volutpat viverra metus eu eleifend. Sed convallis rutrum tellus et consectetur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam id quam tellus. </p>
		</div>
	</div>
</div>
<div class="contnet">
<div class="two_third">
<h2>New - listing</h2>
<script>
$(document).ready(function() {
	

	$(function() {
		$( "#tooltip" ).tooltip();
	});
	$('input, textarea').focus(function(){ p = $(this).parent(); p.removeClass("error");});
	
	$("#reg").submit(function (){
		val = 0;
		
		
		if($('input[name="bucket_list_name"]').val() == ""){p = $('input[name="bucket_list_name"]').parent(); p.addClass("error"); val++;}
		if($('input[name="search_engine_name"]').val() == ""){p = $('input[name="search_engine_name"]').parent(); p.addClass("error"); val++;}
		if($('input[name="company"]').val() == ""){p = $('input[name="company"]').parent(); p.addClass("error"); val++;}
		if($('textarea[name="desc"]').val() == ""){p = $('textarea[name="desc"]').parent(); p.addClass("error"); val++;}
		if($('input[name="cost"]').val() == ""){p = $('input[name="cost"]').parent(); p.addClass("error"); val++;}
		if($('input[name="contact"]').val() == ""){p = $('input[name="contact"]').parent(); p.addClass("error"); val++;} else if(!(/^[A-Z0-9._-]+@[A-Z0-9-]+(\.[A-Z0-9-]{2,})*(\.[A-Z0-9]{2,4}){1,2}$/i).test( $('input[name="contact"]').val())){p = $('input[name="contact"]').parent(); p.addClass("error"); val++;}
		if($('input[name="userfile"]').val() == ""){p = $('input[name="userfile"]').parent(); p.addClass("error"); val++;}
		if($('input[name="address"]').val() == ""){p = $('input[name="address"]').parent(); p.addClass("error"); val++;}
		if($('input[name="date_live"]').val() == ""){p = $('input[name="date_live"]').parent(); p.addClass("error"); val++;}
		
		// validate price 
		
		// validate email 
		
		
		
		if(val<1){
			return true;
		}else{
			return false;	
		}
	});
	
	jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
            return (
                key == 8 || 
                key == 9 ||
                key == 46 ||
                (key >= 37 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};
$('input[name="cost"]').ForceNumericOnly();
});
	</script>
<div id="tooltip">


<?php echo form_open_multipart('listing/create', 'id="reg"'); ?>
<input type="hidden" name="id" value="" /><input type="hidden" name="user_id" value="<?=$session["user_id"]?>" />
	<p>
	<label for="bucket_list_name">Bucket list name:</label><br/>
	<input type="text" name="bucket_list_name" value="" title="Enter the name you search if you where adding this to your bucket list" /><small>Please enter a name</small>	</p>

	<p>
	<label for=" search_engine_name">Search engine name:</label><br/>
	<input type="text" name="search_engine_name" value="" title="Enter the name you search for this listing on google"  /><small>Please enter a name</small>	</p>

	<p>
	<label for="company">Company:</label><br/>
	<input type="text" name="company" value=""  /><small>Please enter a name</small>	</p>

	<p>
	<label for="desc">Description:</label><br/>
    <textarea name="desc"></textarea><small>Please enter a Description</small>
	</p>

	<p>
	<label for="cost">Cost:</label><br/>
	<input type="text" name="cost" value="" title="Enter the whole number without decimal places for for example $299.95 would be 29995" />	<small>Please enter a cost, and be sure it is valid</small></p>

	<p>
	<label for="contact">Contact Email:</label><br/>
	<input type="text" name="contact" value=""  />	<small>Please enter a contact email, and be sure it is valid</small></p>

	<p>
	<label for="userfile">Image:</label><br/>
	<input type="file" name="userfile" value=""  />	<small>Please enter a image</small></p>

	<p>
	<label for="address">Address:</label><br/>
	<input type="text" name="address" value=""  />	<small>Please enter a address</small></p>

	<p>
	<label for="date_live">Go Live Date:</label><br/>
	<input type="text" name="date_live" id="date_live" value=""  />	<small>Please enter a Go Live Date</small></p>
	<script>
	$(function() {
		$( "#date_live" ).datepicker({ dateFormat: "yy-mm-dd" });
	});
	</script>
	<p>
	

	<p>
    <?=$city;?>
	
	</p>

	

<p>
	<?php echo form_submit('submit', 'Create', 'class="button"'); ?>  <?php echo anchor("/dock", "Back", 'class="button"'); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
<div class="one_third">
  <div class="ad">
  <h1>your listing</h1>
  <? // var_dump($myListings);?>
  <? for($i=0;$i<count($myListings);$i++){?>
  <a href="/listing/edit/<?=$myListings[$i]['id']?>"><div class="edit_bttn">
  <img src="/listing_images/<?=$myListings[$i]['image']?>" width="75px" style="float:left;" />
  <div style="float:left;">
    <h3><?=$myListings[$i]["bucket_list_name"]?></h3>
    <p><?=substr($myListings[$i]["desc"],0,50)?>...</p>
  </div>
  <div class="clear">&nbsp;</div>
  </div></a>
  <? } ?>
  </div>
</div>
<div class="clear">&nbsp;</div>
</div>