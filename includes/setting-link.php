<?php
/**
 * Settings content.
 *
 * @package Booking Commerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( isset( $_POST['save_url'] ) ) {

	if( isset( $_POST['booking_link'] ) ){

		update_option('booking_link', $_POST['booking_link'] );

	}

}
?>
<div class="main">
	<p class="top"><?php echo __( 'Booking Widget Setting', 'wp_booking' ); ?></p>
	<hr>
	<p><?php echo __( 'Add direct to template : ', 'wp_booking' ); ?></p>
	<textarea  class="code" rows="2" cols="40" >&lt;?php echo Booking_Commerce::script();?&gt;</textarea>
	<p><?php echo __( ' Directly add from the widget section : ', 'wp_booking' ); ?></p>
	<h4 class="normal"><?php echo __( 'Appearence -> Widgets -> Booking Widget ', 'wp_booking' ); ?></h4>
	<p><?php echo __( 'Or use shortcodes inside your page/article : ', 'wp_booking' ); ?></p>
	<textarea  class="code" rows="2" cols="40" >[book_widget]</textarea>

	<form action="options.php" method="post">
		<?php $value = get_option(  "booking_link" ); ?>

		<?php settings_fields( 'booking-commerce-link' ); ?>

	  <?php do_settings_sections( 'booking-commerce-link' ); ?>

		<p>Booking commerce domain :</p>

		<input type='text' name='booking_link' placeholder="http://testcom.bookingcommerce.com" value="<?php echo $value?>" >

		 <?php
		 if( current_user_can( 'administrator' ) ) {
					echo '<input type="submit" class="button button-primary" name="save_url" value="Save Changes">';
		 }
		 else {
			 echo "<button class='button button-primary' disabled>Save Changes</button>";
		 }
		 ?>

	</form>
</div>
