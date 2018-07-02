<?php
/**
 * Post a project custom field content
 *
 * @package HireBee\Templates
 * @since 1.0.0
 */
?>

<div class="row">
	<div class="large-12 columns">

		<fieldset class="custom-fields">

			<legend><?php echo $legend; ?></legend>

			<?php foreach ( $fields as $field ) : ?>
				<div class="form-custom-field">
					<?php echo $field ?>
				</div>
			<?php endforeach; ?>

		</fieldset>

	</div><!-- .columns -->
</div><!-- .row -->
