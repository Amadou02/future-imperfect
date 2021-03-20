<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html <?php get_language_attributes(); ?>>

<head>
	<title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="single is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<h1><a href="index.html"><?php bloginfo('title'); ?></a></h1>
			<nav class="links">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main',
						'container' => 'ul',
						'menu_class' => ''
					)
				);
				?>
			</nav>
			<nav class="main">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main',
						'container' => 'ul',
						'menu_class' => ''
					)
				);
				?>
			</nav>
		</header>

		<!-- Menu -->
		<section id="menu">

			<!-- Search -->
			<section>
				<?php get_search_form(); ?>
			</section>

			<!-- Links -->
			<section>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main',
						'container' => 'ul',
						'menu_class' => 'links'
					)
				);
				?>
			</section>

			<!-- Actions -->
			<section>
				<ul class="actions stacked">
					<li><a href="#" class="button large fit">Log In</a></li>
				</ul>
			</section>

		</section>

		<!-- Main -->
		<div id="main">

			<!-- Post -->
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<article class="post">
						<header>
							<div class="title">
								<h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
								<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
							</div>
							<div class="meta">
								<time class="published" datetime="<?php the_time('Y-m-j H:s'); ?>"><?php the_time('l j F Y'); ?></time>
								<a href="#" class="author"><span class="name"><?php the_author(); ?></span><?php echo get_avatar(get_the_author_meta('ID')); ?></a>
							</div>
						</header>
						<span class="image featured"><?php the_post_thumbnail(); ?></span>
						<?php the_content(); ?>
						<footer>
							<ul class="stats">
								<li><a href="#"><?php the_category(' '); ?></a></li>
								<li><a href="#" class="icon solid fa-heart">28</a></li>
								<li><a href="#" class="icon solid fa-comment"><?php echo get_comments_number(); ?></a></li>
							</ul>
						</footer>
					</article>

				<?php endwhile; ?>
			<?php endif; ?>

		</div>
		<!-- Post -->

		<!-- Footer -->
		<section id="footer">
			<ul class="icons">
				<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
				<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
			</ul>
			<p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
		</section>

	</div>
	<!-- Scripts -->
	<?php wp_footer(); ?>

</body>

</html>