<?php
	
	if(is_home() || is_single() || is_category()) {
		$post_id = 8;
	} else {
		$post_id = $post->ID;
	}
	$img = wp_get_attachment_image_src(get_post_thumbnail_id($post_id),'inner_hero');
	$menu = wp_get_nav_menu_items(3);

	if(is_page_template('page-about.php')) {
		$class = 'about';
	} elseif(is_page_template('page-clients.php')) {
		$class = 'clients';
	}	else {
		$class = 'news';
	}

?>
<div class="fix_this">
	<div class="header-bottom <?php echo $class; ?>" <?php if($img): ?>style="background-image: url(<?php echo $img[0]; ?>);" <?php endif; ?>>
	
		<?php if($menu): ?>
		<nav id="main-nav">
			<ul>
				<?php 
					$count = 0; 
					foreach($menu as $item): 
					$count++; 
	
					$id = $item->object_id;
					
					$this_page = $post->ID;
					
	
					if($id == $this_page) {
						echo '<li class="active">';
					} else {
						echo '<li>';
					}
	 
				?>
					<a data-id="<?php echo $id; ?>" href="<?php echo $item->url; ?>">
						<img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-00<?php echo $count; ?>.png" alt="image" width="46" height="46" >
						<span><?php echo $item->title; ?></span>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
		</nav><!--nav-->
		<?php endif; ?>
	
		<h1><?php echo get_the_title($post_id); ?></h1>
		<?php if(is_page_template('page-about.php')): ?>
		<div class="pages-holder has-child">
			<a href="#" class="open">open</a>
			<?php
				wp_nav_menu (array(
					'theme_location' => 'about_menu',
					'menu_id' => 'pages-nav',
					'container' => false,
					'container_class' => '',
					'menu_class' => 'pages-nav',
					'depth' => 1
				));
			?>
			<!-- <ul class="pages-nav">
				<li><a href="#">Overview</a></li>
				<li><a href="#planning">Planning / Buying</a></li>
				<li><a href="#team">Leadership</a></li>
				<li><a href="#PRINCIPLES">Principles</a></li>
				<li><a href="#eEFFECTIVE"><span>e</span>effective</a></li>
			</ul> -->
		</div>
		<?php endif; ?>
	
		<?php if(is_page_template('page-clients.php')): ?>
		<div class="pages-holder has-child">
			<a href="#" class="open">open</a>
			<?php
				wp_nav_menu (array(
					'theme_location' => 'client_menu',
					'menu_id' => 'pages-nav',
					'container' => false,
					'container_class' => '',
					'menu_class' => 'pages-nav',
					'depth' => 1
				));
			?>
			<!-- <ul class="pages-nav">
				<li><a href="#clients">CLIENTS</a></li>
				<li><a href="#case">CASE STUDIES</a></li>
			</ul> -->
		</div>
		<?php endif; ?>
	</div><!-- / header-bottom -->
</div><!-- / fix_this -->