<?php
/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/
add_action('admin_menu', 'display_custom_options_link');

function display_custom_options_link() {
    add_theme_page('Theme Reyes Marinos Options', 'Theme Reyes Marinos Options', 'edit_theme_options', 'customize.php');
}

/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/
add_action('customize_register', 'reyesmarinos_customize_register');

function reyesmarinos_customize_register($wp_customize) {
  // Links Social Media
  $wp_customize->add_section('reyesmarinos_social', [
    'title' => __('Links Redes Sociales', THEMEDOMAIN),
    'description' => __('Mostrar links a redes sociales', THEMEDOMAIN),
    'priority' => 35
  ]);

  $wp_customize->add_setting('reyesmarinos_custom_settings[display_social_link]', [
    'default' => 0,
    'type' => 'option'
  ]);

  $wp_customize->add_control('reyesmarinos_custom_settings[display_social_link]', [
    'label' => __('¿Mostrar links?', THEMEDOMAIN),
    'section' => 'reyesmarinos_social',
    'settings' => 'reyesmarinos_custom_settings[display_social_link]',
    'type' => 'checkbox'
  ]);

  // Facebook
  $wp_customize->add_setting('reyesmarinos_custom_settings[facebook]', [
    'default' => '',
    'type' => 'option'
  ]);

  $wp_customize->add_control('reyesmarinos_custom_settings[facebook]', [
    'label' => __('Facebook', THEMEDOMAIN),
    'section' => 'reyesmarinos_social',
    'settings' => 'reyesmarinos_custom_settings[facebook]',
    'type' => 'text'
  ]);

  // Twitter
  $wp_customize->add_setting('reyesmarinos_custom_settings[twitter]', [
    'default' => '',
    'type' => 'option'
  ]);

  $wp_customize->add_control('reyesmarinos_custom_settings[twitter]', [
    'label' => __('Twitter', THEMEDOMAIN),
    'section' => 'reyesmarinos_social',
    'settings' => 'reyesmarinos_custom_settings[twitter]',
    'type' => 'text'
  ]);

  // Instagram
  $wp_customize->add_setting('reyesmarinos_custom_settings[instagram]', [
    'default' => '',
    'type' => 'option'
  ]);

  $wp_customize->add_control('reyesmarinos_custom_settings[instagram]', [
    'label' => __('Instagram', THEMEDOMAIN),
    'section' => 'reyesmarinos_social',
    'settings' => 'reyesmarinos_custom_settings[instagram]',
    'type' => 'text'
  ]);

  // Information
  $wp_customize->add_section('reyesmarinos_info', [
    'title' => __('Datos de la Empresa', THEMEDOMAIN),
    'description' => __('Configuración acerca de información relevante de la Empresa', THEMEDOMAIN),
    'priority' => 36
  ]);

  // Email
  $wp_customize->add_setting('reyesmarinos_custom_settings[email]', [
    'default' => '',
    'type' => 'option'
  ]);

  $wp_customize->add_control('reyesmarinos_custom_settings[email]', [
    'label' => __('Email de contacto', THEMEDOMAIN),
    'section' => 'reyesmarinos_info',
    'settings' => 'reyesmarinos_custom_settings[email]',
    'type' => 'text'
  ]);

  // Address
  $wp_customize->add_setting('reyesmarinos_custom_settings[address]', [
    'default' => '',
    'type' => 'option'
  ]);

  $wp_customize->add_control('reyesmarinos_custom_settings[address]', [
    'label' => __('Dirección', THEMEDOMAIN),
    'section' => 'reyesmarinos_info',
    'settings' => 'reyesmarinos_custom_settings[address]',
    'type' => 'text'
  ]);

  // Google Map Latitud
  $wp_customize->add_setting('reyesmarinos_custom_settings[lat]', [
    'default' => '',
    'type' => 'option'
  ]);

  $wp_customize->add_control('reyesmarinos_custom_settings[lat]', [
    'label' => __('Google Map Latitud', THEMEDOMAIN),
    'section' => 'reyesmarinos_info',
    'settings' => 'reyesmarinos_custom_settings[lat]',
    'type' => 'text'
  ]);

  // Google Map Longitud
  $wp_customize->add_setting('reyesmarinos_custom_settings[long]', [
    'default' => '',
    'type' => 'option'
  ]);

  $wp_customize->add_control('reyesmarinos_custom_settings[long]', [
    'label' => __('Google Map Longitud', THEMEDOMAIN),
    'section' => 'reyesmarinos_info',
    'settings' => 'reyesmarinos_custom_settings[long]',
    'type' => 'text'
  ]);
}
