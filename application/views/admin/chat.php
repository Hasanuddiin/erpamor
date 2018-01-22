<script>
$(function(){
    $('#textchat').html("LOADING CHAT...");
    function refreshDiv(){
        $.ajax({
            url: '<?php echo base_url();?>admin/chat/retrieve'
        }).done(function(result) {
			$('#textchat').html(result);
            window.setTimeout(refreshDiv, 3000);
        });
}
    window.setTimeout(refreshDiv, 3000);
});
function insertComment(){
	var chatme=$("#chatme").val();
	if(chatme==''){return alse;}
		$.ajax({
			url:'<?php echo base_url(); ?>admin/chat/actchat/',		 
			type:'POST',
			data:$('#chatme').serialize(),
			success:function(data){ 
			  	$('#textchat').html(data);
			 	$("#chatme").val('');
			 }
		});		
}
</script>
<div id="tabledata">
<div class="span12">
  <div class="well grey">
      <div class="well-header">
          <h5>CHAT ROOM 2</h5>
          </div>
          <div class="well-content">
          <div class="table_options top_options">
          </div>
		  <form id="frmchat" name="frmchat">
          <a style="float:left;margin-right:5px; margin-bottom:5px;margin-top:0px;width:10%" href="#" onclick="return insertComment();" class="dark_green btn"> Send           
          </a> &nbsp;<input type="text"  class="span12" name="chatme" style="width:80%;float:left" placeholder="Chat Here" id="chatme">
          </form>

          <div id="textchat" name="textchat" style="min-height:300px;width:100%;border:1px solid #999;overflow:auto">

          </div>
          <div class="table_options bottom_options">
          </div>
    </div>
  </div>
</div>