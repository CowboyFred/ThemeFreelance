<?php
/**
 * Disputes admin settings.
 *
 * @package Components\Disputes\Admin
 * @since 1.0.0
 */

/**
 * Registers the payments escrow settings page.
 *
 * @since 1.0.0
 */
function _appthemes_register_disputes_settings() {
	if ( is_admin() ) {
		new APP_Dispute_Settings_Admin( appthemes_disputes_get_args( 'options' ) );
	}
}
add_action( 'init', '_appthemes_register_disputes_settings', 30 );

/**
 * Defines the escrow settings administration panel.
 *
 * @since 1.0.0
 */
class APP_Dispute_Settings_Admin extends APP_Conditional_Tabs_Page {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * 
	 * @param array $options Array of arguments.
	 */
	public function __construct( $options ) {

		$this->options = $options;

		parent::__construct( $options );
	}

	/**
	 * Sets up the page
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function setup() {
		$this->textdomain = APP_TD;

		$this->args = array(
			'page_slug'          => 'app-escrow-settings',
			'parent'             => 'app-payments-settings',
			'conditional_parent' => 'app-payments',
			'conditional_page'   => 'app-payments-settings',
		);
	}

	public function conditional_create_page() {
		return false;
	}

	/**
	 * Init the tabs
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init_tabs() {

		$gateways = $this->tab_sections['escrow']['gateways'];

		$labels = appthemes_disputes_get_args('labels');

		// temporarily unset the gateways to re-order the settings
		unset( $this->tab_sections['escrow']['gateways'] );

		$this->tab_sections['escrow']['disputes'] = array(
			'title'  => __( 'Disputes', APP_TD ),
			'fields' => array(
				array(
					'title' => __( 'Enable Disputes', APP_TD ),
					'desc'  => __( 'Yes', APP_TD ),
					'tip'   => sprintf( __( 'Enabling this option allows %1$s to open disputes on projects that have been completed but %2$s have canceled, or closed as incomplete. You will be able to arbitrate from the disputes page that will be available within the admin lefthand sidebar. Refund/payments are put in stand-by until your final decision is made.', APP_TD ), $labels['disputers'], $labels['disputees'] ),
					'type'  => 'checkbox',
					'name'  => array( 'disputes', 'enabled' ),
				),
				array(
					'title'   => __( 'Availability', APP_TD ),
					'desc'    => sprintf( __( 'days. Allow opening a dispute within this number of days after a project is closed/canceled by the %1$s.', APP_TD ), $labels['disputee'] ),
					'tip'     => sprintf( __( 'The number of days granted to %1$s to be able to open disputes. If a dispute is not opened within this period, the %2$s will be automatically refunded.', APP_TD ), $labels['disputers'], $labels['disputee'] ),
					'type'    => 'select',
					'name'    => array( 'disputes', 'max_days' ),
					'choices' => range( 1, 10 ),
				),
			),
		);

		$this->tab_sections['escrow']['gateways'] = $gateways;
	}
}
