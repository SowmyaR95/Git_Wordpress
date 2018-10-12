/**
 * Customizer custom js
 */

jQuery(document).ready(function() {
   jQuery('.wp-full-overlay-sidebar-content').prepend('<div class="lois-ads"><a href="https://www.sanyog.in/lois-free-wordpress-themes/" class="button" target="_blank">{pro}</a></div>'.replace('{pro}',lois_customizer_pro_js_obj.pro));
});