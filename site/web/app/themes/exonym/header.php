<?php
  /* ==============
     DEFAULT HEADER
     ============== */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<div id="container">
      <header id="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
        <div class="wrap">
          <a href="<?php echo get_home_url(); ?>">
						<img src="<?php ex_logo(); ?>" alt="Logo for <?php ex_brand(); ?>" class="logo-header" />
					</a>
					<?php
						
					?>
					<ul class="nav-header">
						<li>
							<a href="<?php echo get_permalink(136); ?>"><?php echo get_the_title(136); ?></a>
							<div class="nav-mega">

							</div>
						</li>
					</ul>
          <?php ex_social(); ?>
					<a href="#" id="responsive-nav-toggle">
	          <span class="line"></span>
	          <span class="line"></span>
	          <span class="line"></span>
					</a>
        </div>
      </header>
