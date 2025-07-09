<?php get_header(); ?>
<?php //get_sidebar(); ?>

<main>
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div>
        <?php 
        if (have_posts()) : 
            while (have_posts()) : the_post(); 
                the_content(); 
            endwhile; 
        endif; 
        ?>
    </div>
</main>

<?php get_footer(); ?>
