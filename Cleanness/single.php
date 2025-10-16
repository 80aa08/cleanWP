<?php get_header(); ?>

<?php if(has_post_thumbnail()){
    $img = get_the_post_thumbnail_url(get_the_ID(), 'full');
}
else{
    $img = get_template_directory_uri() . "/logo/cleannessLogoBright.svg";
}?>

<div class="main-background" style="background-image:url(<?php echo $img?>);background-color: rgba(0, 0, 0, 0.9);">
    <h1><?php the_title();?></h1>
</div>
<div class="responsive-content">
    <div class="top-content">
        <div class="project-content">
            <div class="a-project-content">
                <h3>Szczegóły projektu</h3>
            </div>
            <div class="b-project-content">
                <p><span>Nazwa:</span><?php the_title() ?></p>
                <p><span>Data:</span><?php echo get_the_time('d.m.Y') ?></p>
                <p><span>Czas:</span><?php echo get_post_meta( get_the_ID(), '_time', true ); ?></p>
                <p><span>Cena:</span><?php echo get_post_meta( get_the_ID(), '_price', true ); ?>zł</p>
                <p><span>Usługa:</span><?php echo get_post_meta( get_the_ID(), '_service', true ); ?></p>
            </div>
        </div>
        <div class="description">
            <h1><?php the_title() ?></h1>
            <p>
                <?php
                    $content = get_the_content();
                    $content = preg_replace('/<img[^>]+>/', '', $content);
                    echo $content;
                ?>
            </p>
        </div>
    </div>
    <div class="pictures">
    <?php 
            $content = get_the_content();
            $content = preg_replace('/width=["\']([^"\']+)["\']/', '', $content);
            $content = preg_replace('/height=["\']([^"\']+)["\']/', '', $content);
            $content = preg_replace('/class=["\'][^"\']*["\']/', '', $content);
            preg_match_all('/<img[^>]+>/', $content, $matches);
            foreach ($matches[0] as $image) {
                echo $image;
            }
        ?>
    </div>


<?php get_footer();?>
