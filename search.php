 <?php get_header(); ?>
<img src="<?php header_image();?>" height="<?php echo get_custom_header()->height;?>" width="<?php echo get_custom_header()->width;?>">

    <div id="content" class="site-content">
        <div id="primary" class="content-area container">
            <main id="main" class="site-main">
                <section class="hero">
                    Hero
                </section>
                <section class="services">
                        services
                </section>
                <section class="blog">
                       <?php
                        if (have_posts()) : while (have_posts()) : the_post();
                        ?>
                            <article>
                                <h2><?php the_title() ;?></h2>
                                <div class="meta-info">
                                    <p>Posted in <?php echo get_the_date()?> by <?php the_author_posts_link()?> </p>
                                    <p>Categories : <?php the_category( ' ' );?></p>
                                    <p>Tags: <?php the_tags('', ', ' );?></p>
                                </div>
                                <?php the_content();?>
                            </article>

                        <?php
                        endwhile;
                        the_posts_pagination();
                    else:?>
                                <p>Nothing to show</p>
                        <?php endif  ?>
                </section>

                <?php get_sidebar();?>
            </main>
        </div>
    </div>

<?php get_footer();?>  