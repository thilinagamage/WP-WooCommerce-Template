<?php get_header();?>

<div class=" content-area" >
    <main>

            <div class="container">
                <div class="row">
                <?php
                        if (have_posts()) : while (have_posts()) : the_post();
                        ?>
                            <article class="col">
                                <h1><?php the_title() ;?></h1>
                                <?php the_content();?>
                            </article>

                        <?php
                        endwhile;
                    else:?>
                                <p>Nothing to show</p>
                        <?php endif  ?>
                </div>
            </div>      
    </main>

</div>

<?php get_footer();?>