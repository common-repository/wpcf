<?php
/**
 * View file for wpcf shortcode.
 *
 * @package Haruncpi\WpCf
 * @author Harun<harun.cox@gmail.com>
 * @link https://learn24bd.com
 * @since 1.1.3
 */

use Haruncpi\WpCf\Mc;
?>

<div class="wpcf-status-msg">
		
</div>

<div class="wpcf-form-wrapper">
	<form id="wpcf" action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="POST">
		<input type="hidden" name="action" value="wpcf_ajax">
		<?php wp_nonce_field( 'wpcf-nonce',  'wpcf-nonce' ); ?>
		
		<div class="wpcf-input">
			<label for="txtName"><?php esc_html_e( 'Your Name', 'wpcf' ); ?></label>
			<input type="text" name="txtName" required>
		</div>
		
		<div class="wpcf-input">
			<label for="txtEmail"><?php esc_html_e( 'Your Email', 'wpcf' ); ?></label>
			<input type="email" name="txtEmail" required>
		</div>

		<div class="wpcf-input">
			<label for="txtSubject"><?php esc_html_e( 'Subject', 'wpcf' ); ?></label>
			<input type="text" name="txtSubject" required>
		</div>
		
		<div class="wpcf-input">
			<label for="txtMsg"><?php esc_html_e( 'Message', 'wpcf' ); ?></label>
			<textarea name="txtMsg" cols="30" rows="8" required></textarea>
		</div>

		<?php Mc::generate(); ?>
		<div class="wpcf-input">
			<label for="txtAnswer"><?php echo esc_html( Mc::get_question() ); ?></label>
			<input type="number" name="txtAnswer" required style="width:50px;">
		</div>
		
		<input type="hidden" name="txtSessionAnswer" value="<?php echo esc_html( md5( Mc::get_answer() ) ); ?>"/>
		
		<div class="wpcf-submit">
			<button type="reset"><?php esc_html_e( 'Reset', 'wpcf' ); ?></button>
			<button type="submit"><?php esc_html_e( 'Send', 'wpcf' ); ?></button>
		</div>
		
	</form>
</div>

