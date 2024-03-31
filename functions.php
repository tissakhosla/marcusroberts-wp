<?php

// Theme Supports - Custom Logo
function mre2024_theme_setup()
{

    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'mre2024_theme_setup');


// Menus
function mre2024_menus()
{
    $locations = array(
        'Main Navigation' => __('Main Navigation', 'text_domain') ,
        'Footer Navigation' => __('Footnote Navigation', 'text_domain') ,
    );

    register_nav_menus($locations);
}
add_action('init', 'mre2024_menus');

// Enqueue Style
function mre2024_register_styles()
{
    wp_enqueue_style('mre2024-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mre2024_register_styles');


// CMS Login Header
function mre2024_login_logo() { ?>
    <h1>Marcus Roberts Enterprises</h1>
<?php }
add_action( 'login_enqueue_scripts', 'mre2024_login_logo' );


// Hide Admin bar on front end when signed in
show_admin_bar( false );

// Handle Contact Form
function submit_contact_form() {
    // Check if the form was submitted
    if ( isset($_POST['action']) && $_POST['action'] === 'submit_contact_form' ) {
        // Sanitize and validate user input
        $name = sanitize_text_field( $_POST['name'] );
        $email = sanitize_email( $_POST['email'] );
        $message = sanitize_textarea_field( $_POST['message'] );

        // Create email headers
        $headers = 'From: ' . $name . ' <' . $email . '>';

        // Send email
        $to = 'mjgcharts@gmail.com'; // Replace with your email address
        $subject = 'New Contact Form Submission';
        $body = "Name: $name\n\nEmail: $email\n\nMessage: $message";
        $sent = wp_mail( $to, $subject, $body, $headers );

        // Check if the email was sent successfully
        if ( $sent ) {
            // Redirect to a success page or display a success message
            wp_redirect( home_url( '/thank-you/' ) );
            exit;
        } else {
            // Redirect to an error page or display an error message
            wp_redirect( home_url( '/error/' ) );
            exit;
        }
    }
}
add_action( 'admin_post_submit_contact_form', 'submit_contact_form' );
add_action( 'admin_post_nopriv_submit_contact_form', 'submit_contact_form' );
?>
