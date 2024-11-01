<?php
/**
 * Ajax Request
 *
 * @package Haruncpi\WpCf
 * @author Harun<harun.cox@gmail.com>
 * @link https://learn24bd.com
 * @since 1.1.3
 */

namespace Haruncpi\WpCf;

/**
 * Ajax Class
 *
 * @since 1.1.3
 */
class Ajax {
	/**
	 * Register hooks.
	 *
	 * @since 1.1.3
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'wp_ajax_nopriv_wpcf_ajax', array( $this, 'handle_contact_form' ) );
		add_action( 'wp_ajax_wpcf_ajax', array( $this, 'handle_contact_form' ) );
	}

	/**
	 * A helper function to get input text from post with sanitization.
	 *
	 * @param string $key key.
	 * @param mixed  $default default value.
	 *
	 * @return mixed
	 */
	private function input_text( $key, $default = null ) {
		if ( ! isset( $_POST[ $key ] ) ) {
			return $default;
		}

		return sanitize_text_field( wp_unslash( $_POST[ $key ] ) );
	}

	/**
	 * Handle Contact Form
	 *
	 * @since 1.1.3
	 *
	 * @return void
	 */
	public function handle_contact_form() {
		$nonce  = $this->input_text( 'wpcf-nonce' );
		$verify = wp_verify_nonce( $nonce, 'wpcf-nonce' );
		if ( ! $verify ) {
			wp_send_json_error( __( 'Invalid nonce', 'wpcf' ) );
		}

		$name    = $this->input_text( 'txtName' );
		$email   = $this->input_text( 'txtEmail' );
		$subject = $this->input_text( 'txtSubject' );
		$message = sanitize_textarea_field( wp_unslash( $_POST['txtMsg'] ) );

		$answer          = $this->input_text( 'txtAnswer' );
		$answerInSession = $this->input_text( 'txtSessionAnswer' );

		if ( empty( $name ) || empty( $email ) || empty( $subject ) || empty( $message ) ) {
			wp_send_json_error( __( 'All field required', 'wpcf' ) );
		}

		if ( empty( $answer ) || $answerInSession !== md5( $answer ) ) {
			wp_send_json_error( __( 'Wrong Captcha', 'wpcf' ) );
		}

		/**
		 * Here $a is set to global from shortcode callback.
		 */
		$mail_to = $a['to'] ?? null;
		if ( $mail_to == null ) {
			$mail_to = get_option( 'admin_email' );
		}

		$site_name = get_bloginfo( 'name' );

		$headers  = 'From: ' . $site_name . '<' . $email . ">\n";
		$headers .= 'Return-Path: <' . $email . ">\n";
		$headers .= 'Reply-To: <' . $email . ">\n";
		$body     = 'Sender : ' . $name . "\n";
		$body     = 'Sender Email : ' . $email . "\n";
		$body     = 'Subject : ' . $subject . "\n";
		$body    .= 'Message :' . $message . "\n";

		wp_mail( $mail_to, $subject, $body, $headers );

		wp_send_json_success( __( 'Thanks for contacting us', 'wpcf' ) );
	}

}
