<?php
  /* ==============
     DEFAULT HEADER
     ============== */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<header id="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
			<div class="wrap">
				<a href="<?php echo get_home_url(); ?>">
					<img src="<?php ex_logo(); ?>" alt="Logo for <?php ex_brand(); ?>" class="logo-header" />
				</a>
				<?php
					function navData($type, $title = null, $url = null) {
						if($type == 'static') {
							$output = array('url' => $url, 'title' => $title);
						} elseif(gettype($type) == 'integer') {
							$output = array('url' => get_permalink($type), 'title' => get_the_title($type));
						} else {
							$output = array('url' => get_post_type_archive_link($type), 'title' => $title);
						}
						return $output;
					}
					function navActive($type) {
						$currentID = get_the_id();
						if(!is_404()) {
							$currentType = get_queried_object()->name;
						}
						if(gettype($type) == 'integer' && $currentID == $type) {
							echo 'nav-current';
						} elseif(gettype($type) == 'string' && is_post_type_archive($type)) {
							echo 'nav-current';
						} else {
							return false;
						}
					}
					function navMega($style, $parent) {
						$output = '<div class="nav-mega"><ul class="mega-content">';
						if($style == 'subsections') {
							if(have_rows('content_blocks', $parent)) {
								while(have_rows('content_blocks', $parent)) {
									the_row();
									if(get_row_layout() == 'sub_sections') {
										$display = get_sub_field('display')['details'];
										if(have_rows('sections')) {
											while(have_rows('sections')) {
												the_row();
												$images = get_sub_field('images');
												$link = get_sub_field('link');
												$heading = get_sub_field('heading');
												$description = get_sub_field('description');
												$output .= '<li class="mega-item">';
												$output .= '<a href="' . $link['url'] . '" target="' . $link['target'] . '">';
												$output .= '<div class="mega-item-image" style="background-image: url(' . $images['image']['sizes']['medium'] . ');">';
													if(in_array('Icon', $display)) { $output .= '<img src="' . $images['icon']['url'] . '" class="mega-item-icon" />'; }
												$output .= '</div>';
												$output .= '<div class="mega-item-data">';
													if(in_array('Heading', $display)) { $output .= '<h3>' . $heading . '</h3>'; }
													if(in_array('Description', $display)) { $output .= '<div class="mega-item-description">' . $description . '</div>'; }
													if(in_array('Button', $display)) { $output .= '<button class="mega-item-button">' . $link['title'] . '</button>'; }
												$output .= '</div>';
												$output .= '</a>';
												$output .= '</li>';
											}
										}
									}
								}
							}
						} elseif($style == 'sections') {
							if(have_rows('content_blocks', $parent)) {
								while(have_rows('content_blocks', $parent)) {
									the_row();
									$target = get_sub_field('module_name');
									$link = get_permalink($parent) . '#' . str_replace(' ', '-', strtolower($target));
									$output .= '<li class="mega-item mega-item-sections">';
									$output .= '<a href="' . $link . '" target="_self">' . $target . '</a>';
									$output .= '</li>';
								}
							}
						}
						$output .= '</ul></div>';
						echo $output;
					}
					$aboutID = 136;
					$clubID = '52club';
					$fallenID = 318;
					$resourcesID = 350;
					$eventsID = 'event';
					$contactID = 352;
					$shop = navData('static', 'Shop', 'https://give.wffoundation.org/products/merchandise');
					$about = navData($aboutID);
					$club = navData($clubID, '52 Club');
					$fallen = navData($fallenID);
					$resources = navData($resourcesID);
					$events = navData($eventsID, 'Fundraisers');
					$contact = navData($contactID);
				?>
				<ul class="nav-header">
					<li class="parent">
						<a href="<?php echo $shop['url']; ?>"><?php echo $shop['title']; ?></a>
					</li>
					<li class="parent">
						<a href="<?php echo $about['url']; ?>" class="<?php echo navActive($aboutID); ?>"><?php echo $about['title']; ?></a>
						<?php navMega('sections', $aboutID); ?>
					</li>
					<li class="parent">
						<a href="<?php echo $fallen['url']; ?>" class="<?php echo navActive($fallenID); ?>"><?php echo $fallen['title']; ?></a>
						<?php navMega('subsections', $fallenID); ?>
					</li>
					<li class="parent">
						<a href="<?php echo $resources['url']; ?>" class="<?php echo navActive($resourcesID); ?>"><?php echo $resources['title']; ?></a>
						<?php navMega('subsections', $resourcesID); ?>
					</li>
					<li class="parent">
						<a href="<?php echo $club['url']; ?>" class="<?php echo navActive($clubID); ?>"><?php echo $club['title']; ?></a>
					</li>
					<li class="parent">
						<a href="<?php echo $events['url']; ?>" class="<?php echo navActive($eventsID); ?>"><?php echo $events['title']; ?></a>
					</li>
					<li class="parent">
						<a href="<?php echo $contact['url']; ?>" class="<?php echo navActive($contactID); ?>"><?php echo $contact['title']; ?></a>
					</li>
				</ul>
				<?php ex_social(); ?>
				<a href="<?php echo exmod_donate('donate'); ?>" class="button">Donate</a>
				<a href="#" id="responsive-nav-toggle">
					<span class="line"></span>
					<span class="line"></span>
					<span class="line"></span>
				</a>
			</div>
		</header>
		<div id="container">
