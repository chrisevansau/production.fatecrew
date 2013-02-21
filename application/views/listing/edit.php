<script type="text/javascript" src="/javascripts/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="/javascripts/jqplot.dateAxisRenderer.min.js"></script>
<link rel="stylesheet" type="text/css" hrf="/system/jquery.jqplot.min.css" />
<script>
$(document).ready(function(){
  var line1=[['2008-06-30 8:00AM',4], ['2008-7-14 8:00AM',6.5], ['2008-7-28 8:00AM',5.7], ['2008-8-11 8:00AM',9], ['2008-8-25 8:00AM',8.2]];
  var plot2 = $.jqplot('chart1', [line1], {
      title:'July results',
      axes:{
        xaxis:{
          renderer:$.jqplot.DateAxisRenderer,
          tickOptions:{formatString:'%b %#d'},
          min:'June 16, 2008 8:00AM',
          tickInterval:'2 weeks'
        }
      },
      series:[{lineWidth:4, markerOptions:{style:'square'}}]
  });
});

</script>

<div class="blue">
	<div class="contnet">
 		<div class="one_third">
 			<img src="../../../images/logo.png" width="232" height="225" />
 		</div>
 		<div class="two_third">
			<h3>
				Edit your listing
			</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In fermentum fermentum est, lacinia fermentum nibh commodo vel. Integer a est tellus. Integer eu libero tellus. Integer lobortis leo at dolor pharetra sit amet cursus mi fermentum. Praesent vel libero est. Ut dictum enim ut nulla adipiscing vitae faucibus lectus placerat. Mauris vel erat neque. Aliquam lacinia quam ac magna convallis porttitor. Curabitur odio quam, hendrerit et facilisis ut, adipiscing in lacus. Aenean lobortis massa iaculis justo consequat aliquet. Nunc id nisl lectus, et tempor est. Nullam volutpat viverra metus eu eleifend. Sed convallis rutrum tellus et consectetur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam id quam tellus. </p>
		</div>
	</div>
</div>
<div class="contnet">
<div class="two_third">
<h2>Edit - listing</h2>
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
<?php echo form_open('listing/update'); ?>
<input type="hidden" name="id" value=<?php echo $result["id"]?> />
	<p>
	<label for="bucket_list_name">Bucket list name:</label><br/>
	<input type="text" name="bucket_list_name" value="<?php echo $result["bucket_list_name"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for=" search_engine_name">Search Engine Name:</label><br/>
	<input type="text" name="search_engine_name" value="<?php echo $result["search_engine_name"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="company">Company:</label><br/>
	<input type="text" name="company" value="<?php echo $result["company"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="desc">Description:</label><br/>
    <textarea name="desc"><?php echo $result["desc"]?></textarea>
	
	</p>

	<p>
	<label for="cost">Cost:</label><br/>
    
	<input type="text" name="cost" value="<?php echo str_replace(".","",$result["cost"])?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="contact">Contact Email:</label><br/>
	<input type="text" name="contact" value="<?php echo $result["contact"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="image">Image:</label><br/>
	<input type="file" name="userfile" value=""  />	
	</p>

	<p>
	<label for="address">Address:</label><br/>
	<input type="text" name="address" value="<?php echo $result["address"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="date_live">Date live:</label><br/>
	<input type="text" name="date_live" value="<?php echo $result["date_live"]?>" maxlength="500" size="50"  />
	<script>
	$(function() {
		$( "#date_live" ).datepicker({ dateFormat: "yy-mm-dd" });
	});
	</script>
    </p>

	
	<input type="hidden" name="status" value="<?php echo $result["status"]?>" />
	

	<p>
	<label for="city_id">City_id</label><br/>
	<input type="text" name="city_id" value="<?php echo $result["city_id"]?>" maxlength="500" size="50" />
	</p>

	<p>
	<label for=" active">active</label><br/>
	<input type="checkbox" name="active" <?php if($result["active"]){?> checked="checked" <? } ?> />
	</p> 

	
	
	<input type="hidden" name="date_created" value="<?php echo $result["date_created"]?>" maxlength="500" size="50"  />
	

	
	
	<input type="hidden" name="date_modified" value="<?php echo date("Y-m-d H:i:s")?>" maxlength="500" size="50"  />
	


<p>
	<?php echo form_submit('submit', 'Update', 'class="button"'); ?>  <?php echo anchor("/dock", "Back", 'class="button"'); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
<div class="one_third">
  <div class="ad">
  <h1>your Results</h1>
  <div id="chart1" style="margin:20px;height:140px; width:280px;"></div>
  <?=var_dump($hits)?>
  
  </div>
</div>
<div class="clear">&nbsp;</div>
</div>