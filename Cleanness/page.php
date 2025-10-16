<?php get_header();?>
    <section id="gallery">
        <h2>Galeria zdjęć</h2>

        <?php $args = array(
            'post_type' => 'attachment',
            'post_status' => 'any',
            'orderby' => 'date',
            'order' => 'DESC',
            'category__not_in' => array(get_cat_ID('Wykluczone'))
        );

        $query = new WP_Query($args);
        $galleries = array();
        $media_library = array();

        foreach ($query->posts as $media) {
            $media_date = get_the_time('F Y', $media->ID);
            $media_library[$media_date][] = $media;

        }
        $idx = 0;
        foreach ($media_library as $date => $media_items) {
            echo '<h3>' . ucfirst($date) . '</h3>';
            echo '<section class="gallery-img">'; 
            foreach ($media_items as $media) {
                $image_url = wp_get_attachment_url($media->ID);
                $image_html = '';
                $image_html = '<img src="' . $image_url . '" loading="lazy" onclick="showModal(\'' . $image_url . '\')">';
                echo $image_html;
                $idx++;
            }
            echo '</section>';
            
        }
        wp_reset_postdata();
        ?>
        <dialog id="imageModal">
            <button id="prevButton" onclick="showPrevImage()">&#8249</button>
            <img id="modalImage">
            <button id="nextButton" onclick="showNextImage()">&#8250</button>
            <button id="closeButton" onclick="closeModal()">&#215</button>
        </dialog>
    </section>

<?php get_footer();?>