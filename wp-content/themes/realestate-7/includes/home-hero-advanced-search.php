<?php
/**
 * Header Advanced Search
 *
 * @package WP Pro Real Estate 7
 * @subpackage Include
 */
 
global $ct_options;

?>

<!-- Header Search -->
<div id="hero-search-wrap">
	<div class="container">
        <form id="advanced_search" class="col span_12 first header-search" name="search-listings" action="<?php echo home_url(); ?>">
	        <div id="hero-search-inner">
	            <div id="suggested-search" class="col span_6">
	            	<div id="keyword-wrap">
			            <i class="fa fa-search"></i>
		                <input type="text" id="ct_keyword" class="number header_keyword_search" name="ct_keyword" size="8" placeholder="<?php esc_html_e('Enter a street address or keyword', 'contempo'); ?>" />
		                <div class="listing-search" style="display: none"><i class="fa fa-spinner fa-spin fa-fw"></i><?php _e('Searching...', 'contempo'); ?></div>
						<div id="suggestion-box" style="display: none;"></div>
	                </div>
	            </div>

	            <div class="col span_2">
					<?php ct_search_form_select('city'); ?>
				</div>

				<div class="col span_2">
					<?php ct_search_form_select('state'); ?>
	            </div>

	            <input type="hidden" name="search-listings" value="true" />

	            <div class="col span_2">
		            <input id="submit" class="btn left" type="submit" value="<?php esc_html_e('Search', 'contempo'); ?>" />
	            </div>

		            <div class="clear"></div>
            </div>
        </form>
	        <div class="clear"></div>
    </div>
</div>
<!-- //Header Search -->

<script>
jQuery(".header_keyword_search").keyup(function($){
	var keyword_value = jQuery(this).val();
	
	var data = {
		action: 'street_keyword_search',
		keyword_value: keyword_value
	};
	
	jQuery(".listing-search").show();
	
	jQuery.ajax({
		type: "POST",
		url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",		
		data: data,	
		success: function(data){
			//console.log(data);
			jQuery(".listing-search").hide();
			jQuery("#suggestion-box").show();
			jQuery("#suggestion-box").html(data);
		}	
	}); 
});

jQuery(document).on("click",'.listing_media',function(){	
	var list_title = jQuery(this).attr('att_id');
	jQuery(".header_keyword_search").val(list_title);
	jQuery("#suggesstion-box").hide();
	
});
</script>