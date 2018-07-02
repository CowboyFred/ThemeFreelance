<?php
/**
 * Comments content template.
 *
 * @package HireBee\Templates
 * @since 1.4.0
 */

// If comments are open or there's at least one comment.
if ( comments_open() || get_comments_number() ) :
?>

<div class="comments-wrap content-wrap">

	<?php comments_template(); ?>

</div> <!-- .comments-wrap -->

<?php
endif;
