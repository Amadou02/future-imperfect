<?php get_header(); ?>
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="index.html"><?php bloginfo('name'); ?></a></h1>
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
            <ul>
                <li class="search">
                    <a class="fa-search" href="#search">Search</a>
                    <?php get_search_form(); ?>
                </li>
                <li class="menu">
                    <a class="fa-bars" href="#menu">Menu</a>
                </li>
            </ul>
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
    <?php get_template_part('archive'); ?>
    <!-- Main -->

    <!-- Sidebar -->
    <section id="sidebar">

        <!-- Intro -->
        <section id="intro">
            <a href="#" class="logo"><img src="images/logo.jpg" alt="" /></a>
            <header>
                <h2><?php bloginfo('name'); ?></h2>
                <p><?php bloginfo('decription'); ?></a></p>
            </header>
        </section>

        <!-- Mini Posts -->
        <section>
            <div class="mini-posts">
                <!-- Mini Post -->
                <?php
                $mini_posts = carbon_get_theme_option('crb_mini_posts');
                ?>
                <?php foreach ($mini_posts as $post) : ?>
                    <article class="mini-post">
                        <header>
                            <h3><a href="<?php echo  get_the_permalink($post['id']); ?>"> <?php echo  get_the_title($post['id']); ?></a></h3>
                            <time class="published" datetime="<?php echo get_the_date('Y-m-j H:s', $post['id']);  ?>"><?php echo get_the_date('l j F Y', $post['id']); ?></time>
                            <a href="#" class="author"><span class="name"><?php echo  get_the_author(); ?></span><?php echo get_avatar(get_the_author_meta('ID')); ?></a>
                        </header>
                        <a href="<?php echo  get_the_permalink(); ?>" class="image featured"><?php echo  get_the_post_thumbnail($post['id']); ?></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Posts List -->
        <section>
            <?php
            $mini_posts_list = carbon_get_theme_option('crb_mini_posts_list');
            ?>
            <ul class="posts">
            <?php foreach($mini_posts_list as $mini_posts) : ?>
                <li>
                    <article>
                        <header>
                            <h3><a href="<?php echo get_permalink($mini_posts['id']) ?>"><?php echo get_the_title($mini_posts['id']) ?></a></h3>
                            <time class="published" datetime="<?php echo get_the_date('Y-m-d H:s',$mini_posts['id']) ?>"><?php echo get_the_date('l j F Y',$mini_posts['id']) ?></time>
                        </header>
                        <a href="#" class="image"><?php echo get_avatar(get_the_author_meta('ID')); ?></a>
                    </article>
                </li>
                <?php endforeach; ?>
               
                <li>
                    <article>
                        <header>
                            <h3><a href="single.html">Congue ullam corper lorem ipsum dolor</a></h3>
                            <time class="published" datetime="2015-10-06">October 7, 2015</time>
                        </header>
                        <a href="single.html" class="image"><img src="images/pic12.jpg" alt="" /></a>
                    </article>
                </li>
            </ul>
        </section>

        <!-- About -->
        <section class="blurb">
            <?php
            // get the field value
            $crb_title = carbon_get_theme_option('crb_label');
            // get the field value
            $crb_description = carbon_get_theme_option('crb_description');

            // output the field value

            ?>
            <h2><?php echo $crb_title ?></h2>
            <p><?php echo $crb_description ?></p>
            <ul class="actions">
                <li><a href="#" class="button">Learn More</a></li>
            </ul>
        </section>

        <!-- Footer -->
        <section id="footer">
            <?php
            $fb = carbon_get_theme_option('crb_facebook');
            $tw = carbon_get_theme_option('crb_twitter');
            $ig = carbon_get_theme_option('crb_instagram');
            $rss = carbon_get_theme_option('crb_rss');
            $email = carbon_get_theme_option('crb_email');
            ?>
            <ul class="icons">
                <li><a href="<?php echo $tw['url'] ?>" title="<?php echo $tw['anchor'] ?>" class="icon brands fa-twitter"><span class="label"><?php echo $tw['anchor'] ?></span></a></li>
                <li><a href="<?php echo $fb['url'] ?>" title="<?php echo $fb['anchor'] ?>" class="icon brands fa-facebook-f"><span class="label"><?php echo $fb['anchor'] ?></span></a></li>
                <li><a href="<?php echo $ig['url'] ?>" title="<?php echo $ig['anchor'] ?>" class="icon brands fa-instagram"><span class="label"><?php echo $ig['anchor'] ?></span></a></li>
                <li><a href="<?php echo $rss['url'] ?>" title="<?php echo $rss['anchor'] ?>" class="icon solid fa-rss"><span class="label"><?php echo $rss['anchor'] ?></span></a></li>
                <li><a href="<?php echo $email['url'] ?>" title="<?php echo $email['anchor'] ?>" class="icon solid fa-envelope"><span class="label"><?php echo $email['anchor'] ?></span></a></li>
            </ul>
            <p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
        </section>

    </section>

</div>
<?php get_footer(); ?>