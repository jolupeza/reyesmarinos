<?php
/****************************************/
/* Define Constants */
/****************************************/
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT . '/images');
define('THEMEDOMAIN', 'reyesmarinos-framework');

/****************************************/
/* Load JS Files */
/****************************************/
function load_custom_scripts() {
  wp_enqueue_script('vendor_script', THEMEROOT . '/js/vendor.min.js', array('jquery'), false, true);
  wp_enqueue_script('main_script', THEMEROOT . '/js/main.js', array('jquery'), false, true);
  wp_localize_script('main_script', 'ReyesMarinosAjax', array('url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('reyesmarinosajax-nonce')));
}

add_action('wp_enqueue_scripts', 'load_custom_scripts');

/****************************************/
/* Add Theme Support */
/****************************************/
if ( function_exists('add_theme_support') ) {
  add_theme_support('post-thumbnails', array('post', 'page', 'sliders'));

  add_theme_support('post-formats', ['gallery', 'video']);

  add_image_size('event-thumb', 290, 160, [
    'x_crop_position' => 'center',
    'y_crop_position' => 'center'
  ]);
}

/****************************************/
/* Add Logo Theme */
/****************************************/
function my_theme_setup() {
  add_theme_support('custom-logo', [
    'height'  => 128,
    'width' => 117,
    'flex-height' => true
  ]);
}

add_action('after_setup_theme', 'my_theme_setup');

/****************************************/
/* Add Menus */
/****************************************/
function register_my_menus() {
  register_nav_menus([
    'main-menu' => __('Main Menu', THEMEDOMAIN),
  ]);
}

add_action('init', 'register_my_menus');

/****************************************/
/* Add Sidebar Support */
/****************************************/
/*if (function_exists('register_sidebar')) {
  $args = array(
    'name'          => __('Main Sidebar', THEMEDOMAIN),
    'id'            => 'main-sidebar',
    'description'   => __('Área sidebar buscador en Vida Escolar', THEMEDOMAIN),
    // 'class'         => '',
    'before_widget' => '<div class="Sidebar-widget">',
    'after_widget'  => '</div>',
    // 'before_title'  => '<h2 class="widgettitle">',
    // 'after_title'   => '</h2>'
  );

  register_sidebar($args);
}*/

/****************************************/
/* Add Excerpt to Page */
/****************************************/
function reyesmarinos_add_excerpts_to_pages() {
  add_post_type_support('page', 'excerpt');
}

add_action('init', 'reyesmarinos_add_excerpts_to_pages');

/****************************************/
/* Get attachment ID */
/****************************************/
function segurix_get_image_id($imageUrl) {
  global $wpdb;
  $attachment = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE guid='$imageUrl';");
  return count($attachment) ? (int)$attachment[0] : 0;
}

/****************************************/
/* Search only Posts */
/****************************************/
/*function cbb_search_only_posts($query) {
  if ($query->is_search()) {
    $query->set('post_type', 'post');
  }

  return $query;
}

add_filter('pre_get_posts', 'cbb_search_only_posts');*/

/****************************************/
/* Setting Mailtrap */
/****************************************/
function mailtrap($phpmailer) {
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = 'e6e50f29dbe2dd';
  $phpmailer->Password = 'f1ea173da928d9';
}

add_action('phpmailer_init', 'mailtrap');

// Bugs send emails WP 4.6.1
add_filter('wp_mail_from', function() {
  return 'no-reply@reyesmarinos.com.pe';
});

/***********************************************************/
/* Register subscriptor via ajax */
/***********************************************************/
add_action('wp_ajax_register_contact', 'register_contact_callback');
add_action('wp_ajax_nopriv_register_contact', 'register_contact_callback');

function register_contact_callback()
{
  $nonce = $_POST['nonce'];
  $result = array(
    'result' => false,
    'error' => ''
  );

  if (!wp_verify_nonce($nonce, 'reyesmarinosajax-nonce')) {
      die('¡Acceso denegado!');
  }

  $name = trim($_POST['contact_name']);
  $email = trim($_POST['contact_email']);
  $message = trim($_POST['contact_message']);

  if (!empty($name) && !empty($name) && is_email($email) && !empty($message)) {
    $options = get_option('reyesmarinos_custom_settings');

    $name = sanitize_text_field($name);
    $email = sanitize_email($email);
    $message = sanitize_text_field($message);

    $receiverEmail = $options['email'];

    if (!isset($receiverEmail) || empty($receiverEmail)) {
      $receiverEmail = get_option('admin_email');
    }

    $subjectEmail = "Consulta Web Reyes Marinos";

    ob_start();
    $filename = TEMPLATEPATH . '/templates/email-contact.php';
    if (file_exists($filename)) {
      include $filename;

      $content = ob_get_contents();
      ob_get_clean();

      $headers[] = 'From: Reyes Marinos';
      //$headers[] = 'Reply-To: jolupeza@icloud.com';
      $headers[] = 'Content-type: text/html; charset=utf-8';

      if (wp_mail($receiverEmail, $subjectEmail, $content, $headers)) {
        // Send email to customer
        $subjectEmail = "Consulta enviada a Reyes Marinos";

        ob_start();
        $filename = TEMPLATEPATH . '/templates/email-gratitude.php';
        if (file_exists($filename)) {
          $textEmail = 'Ya tenemos su consulta. En breve nos pondremos en contacto con usted.';

          include $filename;

          $content = ob_get_contents();
          ob_get_clean();

          $headers[] = 'From: Reyes Marinos';
          //$headers[] = 'Reply-To: jolupeza@icloud.com';
          $headers[] = 'Content-type: text/html; charset=utf-8';

          wp_mail($email, $subjectEmail, $content, $headers);

          $post_id = wp_insert_post(array(
              'post_author' => 1,
              'post_status' => 'publish',
              'post_type' => 'contacts',
          ));
          update_post_meta($post_id, 'mb_name', $name);
          update_post_meta($post_id, 'mb_email', $email);
          update_post_meta($post_id, 'mb_message', $message);

          $result['result'] = true;
        } else {
          $result['error'] = 'Plantilla email no encontrada.';
          ob_get_clean();
        }
      } else {
        $result['error'] = 'No se puedo enviar el email.';
      }
    } else {
      $result['error'] = 'Plantilla email no encontrada.';
      ob_get_clean();
    }
  } else {
    $result['error'] = 'Verifique que ha ingresado los datos correctamente.';
  }

  echo json_encode($result);
  die();
}

/**********************************************/
/* Load Theme Options Page and Custom Widgets */
/**********************************************/
require_once(TEMPLATEPATH . '/functions/reyesmarinos-theme-customizer.php');
// require_once(TEMPLATEPATH . '/functions/widget-ad-320.php');

/*
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
  function dump($var, $label = 'Dump', $echo = true) {
    // Store dump in variable
    ob_start();
    var_dump($var);
    $output = ob_get_clean();

    // Add formatting
    $output = preg_replace("/\]\=\>\n(\s+)/m", '] => ', $output);
    $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">'.$label.' => '.$output.'</pre>';

    // Output
    if ($echo == true) {
      echo $output;
    } else {
      return $output;
    }
  }
}

if (!function_exists('dump_exit')) {
  function dump_exit($var, $label = 'Dump', $echo = true) {
    dump($var, $label, $echo);
    exit;
  }
}
