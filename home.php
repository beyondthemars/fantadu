<?php get_header(); ?>

<main>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article class="blog-post">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                <?php endif; ?>

                <h2 class="blog-post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>">Weiterlesen →</a>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p>Keine Beiträge gefunden.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
