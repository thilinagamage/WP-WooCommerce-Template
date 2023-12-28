

<?php get_header(); ?>
<img src="<?php header_image();?>" height="<?php echo get_custom_header()->height;?>" width="<?php echo get_custom_header()->width;?>">

    <div class="page-content container">
    <div class="row">
    <section class="blog col-lg-8">
                       <?php

                       $args = array(
                            'post_type'     => 'post',
                            'posts_per_page' => 5,
                            'category__in'  =>array(),
                            'category__not_in'=> array(),

                       );

                       $postlist = new WP_Query($args);



                        if ($postlist->have_posts()) : while ($postlist->have_posts()) : $postlist->the_post();
                        ?>
                            <article>
                                <h2><a href="<?php the_permalink()?>"><?php the_title() ;?></a></h2>
                                <div class="post-thumbnail">
                                    <?php the_post_thumbnail();?>
                                </div>
                                <div class="meta-info">
                                    <p>Posted in <?php echo get_the_date()?> by <?php the_author_posts_link()?> </p>
                                    <p>Categories : <?php the_category( ' ' );?></p>
                                    <p>Tags: <?php the_tags('', ', ' );?></p>
                                </div>
                                <?php the_excerpt();?>
                            </article>

                        <?php
                        endwhile;
                     
                        wp_reset_postdata();
                    else:?>
                          <p>Nothing to show</p>
                        <?php endif  ?>
     </section>


    <section class="col-md-4">
    <?php get_sidebar();?>
    </section>
    </div>
               
    </div>
    </div>

<?php get_footer();?>