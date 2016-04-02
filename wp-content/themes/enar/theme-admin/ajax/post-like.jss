jQuery(document).ready(function() {
	jQuery('body').on('click','.hm_like_post',function(event){
		event.preventDefault();
		heart = jQuery(this);
		post_id = heart.data("post_id");
		//heart.html("");
		jQuery.ajax({
			type: "post",
			url: ajax_var.url,
			data: "action=idealtheme-post-like&nonce="+ajax_var.nonce+"&idealtheme_post_like=&post_id="+post_id,
			success: function(count){
				if( count.indexOf( "already" ) !== -1 )
				{
					var lecount = count.replace("already","");
					if (lecount === "0")
					{
						lecount = "0";
					}
					heart.prop('title', 'Like');
					heart.removeClass("liked");
					heart.html("<i class='ico-heart2'></i>"+lecount);
				}
				else
				{
					heart.prop('title', 'Unlike');
					heart.addClass("liked");
					heart.html("<i class='ico-heart2'></i>"+count);
				}
			}
		});
	});
});