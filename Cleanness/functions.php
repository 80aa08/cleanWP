<?php
// Załadowanie styli
function load_assets() {
    wp_enqueue_style("MainCss", get_template_directory_uri() . "/common/main.css", array(), '1', 'all');
    
    if(!is_page() && !is_single() && !is_archive()){
        wp_enqueue_script("Basic", get_template_directory_uri() . "/common/index.js", array('jquery'), '1', true);
    }
    wp_enqueue_script("AsideMenu", get_template_directory_uri() . "/common/asideMenu.js", array('jquery'), '1', true);

    if (is_page()) {
        wp_enqueue_script("GalleryJs", get_template_directory_uri() . "/common/gallery.js", array('jquery'), '1', true);
    }
}
add_action("wp_enqueue_scripts", "load_assets");

add_theme_support("post-thumbnails");

// Rejestracja menu
register_nav_menus(
    array(
        "top-menu" => "Menu główne"
    )
);

// Modyfikacja wyglądu menu
function add_additional_class_on_li($classes, $item, $args) {
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menu_link_class($atts, $item, $args) {
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

// Usuwanie kategorii ważne realizacje jeśli jest więcej niż 4
function remove_oldest_category() {
    $max_count = 4;
    $category_name = 'Ważne';

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'category_name' => $category_name,
        'orderby' => 'date',
        'order' => 'ASC',
    );

    $query = new WP_Query($args);
    $count = $query->found_posts;
    if ($count > $max_count) {
        $posts = $query->posts;
        $oldest_post = reset($posts);
        wp_remove_object_terms($oldest_post->ID, $category_name, 'category');
    }

    wp_reset_postdata();
}
add_action('save_post', 'remove_oldest_category');

// Dodanie widoczności kategorii na media library
function add_media_cats() {
    register_taxonomy_for_object_type('category', 'attachment');
}
add_action('init', 'add_media_cats');

// Zmiana footera
function change_admin_footer_text() {
    return 'Dziękujemy za współpracę InnovateIQ.';
}
add_filter('admin_footer_text', 'change_admin_footer_text');

// Dodawanie meta boxów do aktualizacji danych w pojedynczych realizacjach 
function add_custom_meta_boxes() {
    add_meta_box(
        'price_meta_box',
        'Cena',
        'render_price_meta_box',
        'post',
        'normal',
        'default'
    );

    add_meta_box(
        'service_meta_box',
        'Usługa',
        'render_service_meta_box',
        'post',
        'normal',
        'default'
    );

    add_meta_box(
        'time_meta_box',
        'Czas wykonania',
        'render_time_meta_box',
        'post',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_custom_meta_boxes');

function render_price_meta_box($post) {
    $price = get_post_meta($post->ID, '_price', true);
    echo '<input type="text" id="price" name="price" value="' . esc_attr($price) . '">';
}

function render_service_meta_box($post) {
    $service = get_post_meta($post->ID, '_service', true);
    echo '<input type="text" id="service" name="service" value="' . esc_attr($service) . '">';
}

function render_time_meta_box($post) {
    $time = get_post_meta($post->ID, '_time', true);
    echo '<input type="text" id="time" name="time" value="' . esc_attr($time) . '">';
}

function save_custom_meta_boxes($post_id) {
    if (isset($_POST['price'])) {
        $price = sanitize_text_field($_POST['price']);
        update_post_meta($post_id, '_price', $price);
    }

    if (isset($_POST['service'])) {
        $service = sanitize_text_field($_POST['service']);
        update_post_meta($post_id, '_service', $service);
    }

    if (isset($_POST['time'])) {
        $time = sanitize_text_field($_POST['time']);
        update_post_meta($post_id, '_time', $time);
    }
}
add_action('save_post', 'save_custom_meta_boxes');

// Dodawanie meta boxów do aktualizacji danych aktualny email etc 

function render_custom_dashboard_meta_box() {
    $email = get_option('custom_dashboard_email');
    $phone = get_option('custom_dashboard_phone');
    $location = get_option('custom_dashboard_location');
    $locationRoad = get_option('custom_dashboard_location_road');
    $locationCity = get_option('custom_dashboard_location_city');
    ?>
    <p>
        <label for="custom_dashboard_email">Email:</label><br>
        <input type="email" id="custom_dashboard_email" name="custom_dashboard_email" value="<?php echo esc_attr($email); ?>">
    </p>
    <p>
        <label for="custom_dashboard_phone">Telefon kontaktowy:</label><br>
        <input type="tel" id="custom_dashboard_phone" name="custom_dashboard_phone" value="<?php echo esc_attr($phone); ?>">
    </p>
    <p>
        <label for="custom_dashboard_location">Lokalizacja Link do przeniesienia:</label><br>
        <input type="text" id="custom_dashboard_location" name="custom_dashboard_location" value="<?php echo esc_attr($location); ?>">
    </p>
    <p>
        <label for="custom_dashboard_location_road">Lokalizacja Droga:</label><br>
        <input type="text" id="custom_dashboard_location_road" name="custom_dashboard_location_road" value="<?php echo esc_attr($locationRoad); ?>">
    </p>
    <p>
        <label for="custom_dashboard_location_city">Lokalizacja Miasto:</label><br>
        <input type="text" id="custom_dashboard_location_city" name="custom_dashboard_location_city" value="<?php echo esc_attr($locationCity); ?>">
    </p>
    <p>
        <input type="button" class="button button-primary" value="Save" id="custom_dashboard_save_button">
    </p>
    <script>
        jQuery(document).ready(function($) {
            $('#custom_dashboard_save_button').click(function(e) {
                e.preventDefault();
                var email = $('#custom_dashboard_email').val();
                var phone = $('#custom_dashboard_phone').val();
                var location = $('#custom_dashboard_location').val();
                var locationRoad = $('#custom_dashboard_location_road').val();
                var locationCity = $('#custom_dashboard_location_city').val();
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'save_custom_dashboard_data',
                        email: email,
                        phone: phone,
                        location: location,
                        locationRoad: locationRoad,
                        locationCity: locationCity,
                    },
                    success: function(response) {
                        alert('Data saved successfully!');
                    },
                    error: function(error) {
                        alert('Error saving data!');
                    }
                });
            });
        });
    </script>
    <?php
}

function save_custom_dashboard_meta_box() {
    if (isset($_POST['email'])) {
        $email = sanitize_email($_POST['email']);
        update_option('custom_dashboard_email', $email);
    }

    if (isset($_POST['phone'])) {
        $phone = sanitize_text_field($_POST['phone']);
        update_option('custom_dashboard_phone', $phone);
    }

    if (isset($_POST['location'])) {
        $location = sanitize_text_field($_POST['location']);
        update_option('custom_dashboard_location', $location);
    }

    if (isset($_POST['locationRoad'])) {
        $locationRoad = sanitize_text_field($_POST['locationRoad']);
        update_option('custom_dashboard_location_road', $locationRoad);
    }

    if (isset($_POST['locationCity'])) {
        $locationCity = sanitize_text_field($_POST['locationCity']);
        update_option('custom_dashboard_location_city', $locationCity);
    }
}
add_action('wp_ajax_save_custom_dashboard_data', 'save_custom_dashboard_meta_box');


function add_custom_dashboard_meta_box() {
    wp_add_dashboard_widget(
        'custom_dashboard_meta_box',
        'Wprowadź dane aby wyświetlić i automatycznie podlinkować na stronie',
        'render_custom_dashboard_meta_box'
    );
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_meta_box');

?>
