<?php
/*	@ lois Includes Function
*/
function lois_includes($type, $data = '', $add = 'true')
{
    switch ($type) :
        case "post-thumbnail":
            // echo lois_post_thubmnail($data, $add);
            echo wp_kses( lois_post_thubmnail($data, $add) , allowed_tags() );
            break;
        case "related-post":
            // echo lois_related_post();
            echo wp_kses( lois_related_post() , allowed_tags() );
            break;
        case "post-navigation":
            echo wp_kses( lois_post_navigation() , allowed_tags() );
            break;
    endswitch;

} ?>