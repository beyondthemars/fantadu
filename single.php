<?php get_header(); ?>

<main>
    <h1 class="single-title"><?php the_title(); ?></h1>

    <div class="post-content">
        <?php the_content(); ?>
    </div>

    <?php if (comments_open() || get_comments_number()) : ?>
        <h3>Kommentare</h3>
        <?php comments_template(); ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
