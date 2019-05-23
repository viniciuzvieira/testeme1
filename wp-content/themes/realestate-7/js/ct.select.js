/**
 * CT Custom Select
 *
 * @package WP Pro Real Estate 7
 * @subpackage JavaScript
 */

jQuery.noConflict();

(function($) {
	$(document).ready(function(){

		/*-----------------------------------------------------------------------------------*/
		/* Add Custom Select */
		/*-----------------------------------------------------------------------------------*/
		
		jQuery('select').niceSelect();
		jQuery('select#ct_city, select#ct_state, select#ct_zipcode, select#ct_country').on('change', function() {
			jQuery('select').niceSelect('update');
		});
		
	});
	
})(jQuery);