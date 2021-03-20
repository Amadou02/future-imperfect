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
                <a href="<?php the_permalink(); ?>" class="image featured"><?php the_post_thumbnail(); ?></a>
                <?php the_excerpt(); ?>
                <footer>
                    <ul class="actions">
                        <li><a href="<?php the_permalink(); ?>" class="button large">Lire ...</a></li>
                    </ul>
                    <ul class="stats">
                        <li><a href="#"><?php the_category(' '); ?></a></li>
                        <li><a href="#" class="icon solid fa-heart">28</a></li>
                        <li><a href="#" class="icon solid fa-comment"><?php echo get_comments_number(); ?></a></li>
                    </ul>
                </footer>
            </article>

        <?php endwhile; ?>
    <?php endif; ?>

    <!-- Pagination -->
    <ul class="actions pagination">
        <?php if (get_previous_posts_link()) : ?>
            <li>
                <div class="button large previous"><?php previous_posts_link('Page précédente'); ?></div>
            </li>
        <?php endif; ?>
        <?php if (get_next_posts_link()) : ?>
            <li>
                <div class="button large next"><?php next_posts_link('Page suivante'); ?></div>
            </li>
        <?php endif; ?>
    </ul>
</div>