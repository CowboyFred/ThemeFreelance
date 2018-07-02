<?php
/**
 * Dispute a project form template
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<form id="raise-dispute-form" class="raise-dispute <?php echo ( ! empty( $dispute_error ) ? 'dispute-error' : '' ); ?>" action="<?php echo esc_url( add_query_arg( array( 'dispute' => 1, 'suberror' => '1' ), $_SERVER['REQUEST_URI'] ) ); ?>" method="post">

	<div class="row">
		<div class="large-12 columns">
			<label><?php _e( 'Reason', APP_TD ); ?></label>
			<textarea name="reason" id="reason" class="required"></textarea>
		</div>
	</div>

	<input type="submit" class="button small right" value="<?php esc_attr_e( 'Open Dispute', APP_TD ); ?>" />

	<?php
		wp_comment_form_unfiltered_html_nonce();

		hrb_hidden_input_fields(
			array(
				'action'       => 'open_dispute',
				'project_id'   => esc_attr( $project->ID ),
				'workspace_id' => get_queried_object_id(),
				'url_referer'  => esc_url( $_SERVER['REQUEST_URI'] ),
			)
		);
	?>
</form>

<div class="row">
	<div class="large-12 columns disputes-note">
		<p><strong><?php _e( 'About Disputes:', APP_TD ); ?></strong></p>
		<p>
			<?php _e( "If you do not agree with the employer's decision for this project you can open a dispute.", APP_TD ); ?>
			<?php _e( "A new communication channel will be opened here for both participants and our team to be able to discuss the employer's decision.", APP_TD ); ?>
		</p>

		<p>
			<?php _e( 'We will aim to make a resolution decision on behalf of both parties.', APP_TD ); ?>
			<?php _e( 'In the meantime, if a mutual resolution is agreed between both parties, please inform us and we will close the dispute in line with the mutual agreement.', APP_TD ); ?>
		</p>
	</div>
</div>
