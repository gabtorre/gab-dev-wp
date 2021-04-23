<?php get_header(); ?>

        <h2 class="page-heading"><?php the_archive_title(); ?></h2>

        <section>

            <?php
                while(have_posts()){
                   the_post();
            ?>

            <div class="card card-home">
                <a href="<?php the_permalink() ?>">
                    <h3><?php the_title(); ?></h3>
                </a>
                <?php 
                    $cats = get_the_category(get_the_ID());
                    foreach ( $cats as $cat ) { ?>
                        <a href="<?php echo get_category_link( $cat ); ?> " rel="tag"
                            <?php 
                            if($cat->name == 'Easy'){
                                echo 'class="easy"';
                            } elseif ($cat->name == 'Medium'){
                                echo 'class="medium"';
                            } else {
                                echo 'class="hard"';
                            }
                            ?>
                        >
                        <?php echo $cat->name; ?></a>
                    <?php } ?>


                <?php $tags = get_the_tags(); 
                if($tags) { ?>
                <div class="tags">
                <?php foreach ( $tags as $tag ) { ?>
                    <a href="<?php echo get_tag_link( $tag->term_id ); ?> " rel="tag">
                    <?php echo $tag->name; ?></a>
                    <?php } ?>
                </div>
                <?php } ?>
                <a href="<?php the_permalink(); ?>" class="btn-readmore">Read More</a>
            </div>
            
            <?php }
                wp_reset_query(); 
            ?>

        </section>

        <div class="pagination">
            <?php echo paginate_links(); ?>
        </div>
   
<?php get_footer(); ?>