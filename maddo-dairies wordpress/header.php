<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
  <a class="email" href="mailto:maddodairies@gmail.com">maddodairies@gmail.com<br>Tel. 0772-415233. WhatsApp. 0758-960428</a>
  <div class="container"><div class="logo-area"><div class="logo">
    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_theme_file_uri('/assets/images/MADDO LOGO.png')); ?>" alt="MADDO DAIRIES LIMITED Logo" width="150"></a>
    <div class="brand"><h1>MADDO DAIRIES LIMITED</h1><span class="tagline"><strong>"For Quality Milk Products"</strong></span></div>
  </div></div></div>
</header>
<nav class="main-nav" aria-label="Main navigation">
  <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="maddo-primary-menu">Menu ☰</button>
  <ul class="nav-links" id="maddo-primary-menu">
    <?php
    $maddo_links = array(
      'Home' => '', 'About Us' => 'about-us', 'Our Products' => 'our-products',
      'Partnership Logistics' => 'partnership-logistics', 'Contact Us & Feedback' => 'contact-us-feedback'
    );
    foreach ($maddo_links as $label => $slug) {
      $page = $slug ? get_page_by_path($slug) : null;
      $url = $page ? get_permalink($page) : ($slug === '' ? home_url('/') : maddo_page_url($slug));
      $active = ($slug === '' && is_front_page()) || ($slug !== '' && is_page($slug));
      echo '<li><a' . ($active ? ' class="active" aria-current="page"' : '') . ' href="' . esc_url($url) . '">' . esc_html($label) . '</a></li>';
    }
    ?>
    <li class="dropdown">
      <details class="maddo-signin-details">
        <summary aria-label="Show Sign in menu" title="Show Sign in menu"><strong>Sign in</strong></summary>
        <ul class="dropdown-content">
          <li><a href="<?php echo esc_url(maddo_page_url('login')); ?>">Login</a></li>
          <li><a href="<?php echo esc_url(maddo_page_url('send-suggestions')); ?>">Send Suggestions</a></li>
          <li><a href="<?php echo esc_url(maddo_page_url('order-products')); ?>">Order</a></li>
        </ul>
      </details>
    </li>
  </ul>
</nav>
<main class="site-main">
