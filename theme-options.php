<?php


add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'sample_options', 'cOptn', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'sampletheme' ), __( 'Theme Options', 'sampletheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Zero', 'sampletheme' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'One', 'sampletheme' )
	),
	'2' => array(
		'value' => '2',
		'label' => __( 'Two', 'sampletheme' )
	),
	'3' => array(
		'value' => '3',
		'label' => __( 'Three', 'sampletheme' )
	),
	'4' => array(
		'value' => '4',
		'label' => __( 'Four', 'sampletheme' )
	),
	'5' => array(
		'value' => '3',
		'label' => __( 'Five', 'sampletheme' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'sampletheme' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'sampletheme' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe', 'sampletheme' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Options', 'sampletheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'sampletheme' ); ?></strong></p></div>
		<?php endif; ?>
		<?php // echo $_SERVER['REQUEST_URI']; ?>
		<form id="file-form" enctype="multipart/form-data" action=" <?php bloginfo('siteurl'); ?>/wp-admin/themes.php?page=theme_options" method="POST">
            <table class="form-table">
    
                    <tr valign="top"><th scope="row"><?php _e( 'Logo Path', 'sampletheme' ); ?></th>
                        <td>
                            <p id="async-upload-wrap">
                            <label for="async-upload">Upload</label>
                            <input type="file" id="async-upload" name="async-upload"> <input type="submit" value="Upload" name="html-upload">
                            </p>
                        
                            <p>
                            <input type="hidden" name="post_id" id="post_id" value="1199" />
                            <?php wp_nonce_field('client-file-upload'); ?>
                            <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                            </p>
                        
                            <p>
                            <input type="submit" value="Save all changes" name="save" style="display: none;">
                            </p>
                        </td>
        </tr></table>
        </form>
    
    <?php 
	if ( isset( $_POST['html-upload'] ) && !empty( $_FILES ) ) {
	require_once(ABSPATH . 'wp-admin/includes/admin.php');
	$id = media_handle_upload('async-upload', 1199); //post id of Client Files page
	unset($_FILES);
	if ( is_wp_error($id) ) {
		$errors['upload_error'] = $id;
		$id = false;
	}

	if ($errors) {
		echo "<p>There was an error uploading your file.</p>";
	} else {
		echo "<p>Your file has been uploaded.</p>";
		//echo $id;
		//echo $_FILES['image']['name'][0];
		echo wp_get_attachment_image($options['logo'],'100');
	}
	
}
echo wp_get_attachment_image($options['logo'],'100');
	?>
    
        
        
        <form method="post" action="options.php" >
			<?php settings_fields( 'sample_options' ); ?>
			<?php $options = get_option( 'cOptn' ); ?>

			<table class="form-table">

				<tr valign="top"><th scope="row"><?php _e( 'Preview', 'sampletheme' ); ?></th>
					<td>
                    	<?php 
							$options = get_option('cOptn');
							$oldId = $options['logo'];
							if( $id == NULL){
								$id = $oldId;	
							}
							echo wp_get_attachment_image($id,'100');
						 ?>
                        
						<input id="cOptn[logo]" class="regular-text" type="text" name="cOptn[logo]" value="<?php esc_attr_e( $id ); ?>" style=" width:1px"  />
						<label class="description" for="cOptn[logo]"><?php _e( 'Uploaded media Path', 'sampletheme' ); ?></label>
                        
					</td>
				</tr>
				
				<?php
				/**
				 * A sample textarea option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Copyright', 'sampletheme' ); ?></th>
					<td>
						<textarea id="cOptn[copyright]" class="large-text" cols="50" rows="10" name="cOptn[copyright]"><?php echo esc_textarea( $options['copyright'] ); ?></textarea>
						<label class="description" for="cOptn[copyright]"><?php _e( 'Footer Copyright Text', 'sampletheme' ); ?></label>
					</td>
				</tr>
                
                <tr valign="top"><th scope="row"><?php _e( 'twitter_link', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[twitter_link]" class="large-text" type="text" name="cOptn[twitter_link]" value="<?php echo esc_textarea( $options['twitter_link'] ); ?>">
                        <label class="description" for="cOptn[twitter_link]"><?php _e( 'Please Enter Twitter profile link', 'sampletheme' ); ?></label>
					</td>
				</tr>
                
                <tr valign="top"><th scope="row"><?php _e( 'facebook_link', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[facebook_link]" class="large-text" type="text" name="cOptn[facebook_link]" value="<?php echo esc_textarea( $options['facebook_link'] ); ?>">
                        <label class="description" for="cOptn[facebook_link]"><?php _e( 'Please Enter Facebook profile link', 'sampletheme' ); ?></label>
					</td>
				</tr>
                
                <tr valign="top"><th scope="row"><?php _e( 'googleplus_link', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[linkedin_link]" class="large-text" type="text" name="cOptn[googleplus_link]" value="<?php echo esc_textarea( $options['googleplus_link'] ); ?>">
                        <label class="description" for="cOptn[googleplus_link]"><?php _e( 'Please Enter Google Plus link', 'sampletheme' ); ?></label>
					</td>
				</tr>
                
                <tr valign="top"><th scope="row"><?php _e( 'rss_link', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[rss_link]" class="large-text" type="text" name="cOptn[rss_link]" value="<?php echo esc_textarea( $options['rss_link'] ); ?>">
                        <label class="description" for="cOptn[rss_link]"><?php _e( 'Please Enter Rss link', 'sampletheme' ); ?></label>
					</td>
				</tr>


                <tr valign="top"><th scope="row"><?php _e( 'email_link', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[email_link]" class="large-text" type="text" name="cOptn[email_link]" value="<?php echo esc_textarea( $options['email_link'] ); ?>">
                        <label class="description" for="cOptn[email_link]"><?php _e( 'Please Enter Email profile link', 'sampletheme' ); ?></label>
					</td>
				</tr>                
                
                
                     <tr valign="top"><th scope="row"><?php _e( 'header_caption', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[header_caption]" class="large-text" type="text" name="cOptn[header_caption]" value="<?php echo esc_textarea( $options['header_caption'] ); ?>">
                        <label class="description" for="cOptn[header_caption]"><?php _e( 'Please Enter Your Header Caption', 'sampletheme' ); ?></label>
					</td>
				</tr>
                
                 <tr valign="top"><th scope="row"><?php _e( 'flicker_link', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[flicker_link]" class="large-text" type="text" name="cOptn[flicker_link]" value="<?php echo esc_textarea( $options['flicker_link'] ); ?>">
                        <label class="description" for="cOptn[flicker_link]"><?php _e( 'Please Enter Your Flicker Link', 'sampletheme' ); ?></label>
					</td>
				</tr>
                
                <tr valign="top"><th scope="row"><?php _e( 'phone_num', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[phone_num]" class="large-text" type="text" name="cOptn[phone_num]" value="<?php echo esc_textarea( $options['phone_num'] ); ?>">
                        <label class="description" for="cOptn[phone_num]"><?php _e( 'Please Enter Phone Number', 'sampletheme' ); ?></label>
					</td>
				</tr>
                
                <tr valign="top"><th scope="row"><?php _e( 'fax_num', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[fax_num]" class="large-text" type="text" name="cOptn[fax_num]" value="<?php echo esc_textarea( $options['fax_num'] ); ?>">
                        <label class="description" for="cOptn[fax_num]"><?php _e( 'Please Enter Fax', 'sampletheme' ); ?></label>
					</td>
				</tr>
                
                <tr valign="top"><th scope="row"><?php _e( 'email', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[email]" class="large-text" type="text" name="cOptn[email]" value="<?php echo esc_textarea( $options['email'] ); ?>">
                        <label class="description" for="cOptn[email]"><?php _e( 'Please Enter Your Email Address', 'sampletheme' ); ?></label>
					</td>
				</tr>
                        <tr valign="top"><th scope="row"><?php _e( 'youtube', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[youtube]" class="large-text" type="text" name="cOptn[youtube]" value="<?php echo esc_textarea( $options['youtube'] ); ?>">
                        <label class="description" for="cOptn[youtube]"><?php _e( 'Please Enter Your youtube', 'sampletheme' ); ?></label>
					</td>
				</tr>
            
                
                
                <tr valign="top"><th scope="row"><?php _e( 'Call_us', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[Call_us]" class="large-text" type="text" name="cOptn[Call_us]" value="<?php echo esc_textarea( $options['Call_us'] ); ?>">
                        <label class="description" for="cOptn[Call_us]"><?php _e( 'Please Enter Your Call us', 'sampletheme' ); ?></label>
					</td>
				</tr>
                
           
                
                
                <tr valign="top"><th scope="row"><?php _e( 'Chat_with_us', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[Chat_with_us]" class="large-text" type="text" name="cOptn[Chat_with_us]" value="<?php echo esc_textarea( $options['Chat_with_us'] ); ?>">
                        <label class="description" for="cOptn[Chat_with_us]"><?php _e( 'Please Enter Your Chat with us', 'sampletheme' ); ?></label>
					</td>
				</tr>
                
                
            
                  <tr valign="top"><th scope="row"><?php _e( 'linkedin', 'sampletheme' ); ?></th>
					<td>
						<input id="cOptn[linkedin]" class="large-text" type="text" name="cOptn[linkedin]" value="<?php echo esc_textarea( $options['linkedin'] ); ?>">
                        <label class="description" for="cOptn[linkedin]"><?php _e( 'Please Enter Your Linkedin', 'sampletheme' ); ?></label>
					</td>
				</tr>
                
                
                
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'sampletheme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}
