<?php get_header();?>
    <section id="realizationsAll">
        <h2>Nasze realizacje</h2>
        <div class="realizations">
            <?php if(have_posts()): while(have_posts() ): the_post(); ?>
                <a href="<?php the_permalink();?>" class="singleRealization">
                    <h3><?php the_title()?></h3>
                    <h4><?php echo get_the_time('d.m.Y') ?></h4>
                    <p>
                        <?php 
                            $content = get_the_content();
                            $content = preg_replace('/<img[^>]+>/', '', $content);
                            $content = preg_replace('/<br>/', '', $content);
                            echo mb_strimwidth($content, 0, 50, '...');;
                        ?>
                    </p>
                    <?php
                        if(has_post_thumbnail()){
                            echo "<img src='".get_the_post_thumbnail_url()."' loading='lazy' alt='Zdjęcie realizacji ".get_the_title()."'>";
                        }
                        else {
                            echo "<img src='" . get_template_directory_uri() . "/logo/cleannessLogoBright.svg' loading='lazy' alt='Zdjęcie logo Cleanness'>";
                        }
                    ?>
                </a>
            <?php endwhile; else: endif;?>
        </div>
    </section>
<?php get_footer();?>