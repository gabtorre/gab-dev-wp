<?php get_header(); 
    while(have_posts()){
        the_post();
?>

<h2 class="page-heading"><?php the_title(); ?></h2>
<div id="post-container">
    <section id="blogpost">
        <div class="card">
            <div class="card-meta-blogpost">
            Posted by <?php the_author(); ?> on <?php the_time('F j, Y') ?>

            <?php if(get_post_type() == 'post'){ ?>
                in <a href="#"><?php echo get_the_category_list(', ') ?></a>
            <?php } ?>
            </div>
            <div class="card-description">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <?php } ?>

    <aside id="sidebar">
            <?php dynamic_sidebar('main_sidebar'); ?>
    </aside>
</div>

<?php get_footer(); ?>