<?php
/**
 * Main order summary page template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */

appthemes_load_template( 'order-summary-template.php', array(
	'template' => 'order-summary-content.php',
	'sidebar'  => str_replace( get_query_var('checkout'), 'chk-', '' ),
	'vars'     => _hrb_get_order_summary_template_vars(),
) );
