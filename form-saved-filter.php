<?php
/**
 * Project saved filter modal window form template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div id="save-filter-modal" class="reveal-modal small">

	<form id="save-filter-form" class="custom" method="post" action="#">

		<fieldset>

			<legend><?php _e( 'Save Filter', APP_TD ); ?></legend>
			<input type="text" name="saved-filter-name" class="required" placeholder="<?php echo esc_attr_x( 'Filter name', 'placeholder', APP_TD ); ?>" value="<?php echo esc_attr( $saved_filter['name'] ); ?>" />

			<div style='display: none'>
				<label for="email-digest"><?php _e( 'Notify me', APP_TD ); ?></label>
				<select id="saved-filter-digest" name="saved-filter-digest" class="small">
					<option value="daily" <?php selected ( 'daily' == $saved_filter['digest'] ); ?>><?php _e( 'Daily', APP_TD ); ?></option>
					<option value="weekly" <?php selected ( 'weekly' == $saved_filter['digest'] ); ?>><?php _e( 'Weekly', APP_TD ); ?></option>
				</select>
			</div>

			<div id="save-filter-container" class="save-filter-container">
				<a class="button" id="save-filter"><?php _e( 'Save', APP_TD ); ?></a>
				<a class="button secondary" id="cancel-save-filter"><?php _e( 'Cancel', APP_TD ); ?></a>
			</div>

		</fieldset>

		<?php wp_nonce_field( 'hrb-save-filter' ); ?>

		<input type="hidden" name="action" value="edit-saved-filter" />
		<input type="hidden" name="saved-filter-slug" value="<?php echo esc_attr( $saved_filter['slug'] ); ?>" />

	</form>

	<a class="close-reveal-modal">&#215;</a>

</div><!-- #save-filter-modal -->
