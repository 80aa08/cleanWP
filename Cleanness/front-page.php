<?php get_header();?>


<main id="main" style="background-image: url(<?php echo get_template_directory_uri();?>/img/mainBackgroundBig.png);">
    <h6>cleanness</h6>
    <h2>Zawsze na wysokości zadania!</h2>
    <h5>Specjalizujemy się w profesjonalnym doczyszczaniu powierzchni trudno dostępnych</h5>
    <div class="mainButtons">
        <a class="button buttonBlue" href="#realizations">Zobacz realizacje</a>
        <a class="button buttonGreen" href="#services">Nasze usługi</a>
    </div>
</main>


<section id="aboutUs">
    <div class="aboutUsText">
        <h5>Poznaj nas</h5>
        <h4>Najlepsza firma sprzątająca na wysokościach w twojej okolicy</h4>
        <p>
            Zajmujemy się profesjonalnym doczyszczaniem powierzchni trudno dostępnych, które wymagają odpowiedniego wyposażenia. Posiadamy swój własny sprzęt, pracujemy na wysokościach z użyciem technik alpinistycznych lub specjalnych podnośników. Między innymi myjemy elewacje za pomocą ciśnieniowych urządzeń, odkurzamy sufity i wentylacje z wykorzystaniem specjalistycznych odkurzaczy do pracy z ziemi na wysokości, myjemy przeszklenia z podnośników za wykorzystaniem wody demineralizowanej, odkurzamy ściany oraz myjemy panele akustyczne.
        </p>
        <div class="aboutUsList">
            <ul>
                <li>
                    <img src="<?php echo get_template_directory_uri()."/img/icons/check.svg"?>" alt="Ikona listy">
                    <h5>Doświadczenie i profesjonalizm</h5>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri()."/img/icons/check.svg"?>" alt="Ikona listy">
                    <h5>Konkurencyjne ceny</h5>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri()."/img/icons/check.svg"?>" alt="Ikona listy">
                    <h5>Elastyczność</h5>
                </li>
            </ul>
            <ul>
                <li>
                    <img src="<?php echo get_template_directory_uri()."/img/icons/check.svg"?>" alt="Ikona listy">
                    <h5>Terminowość</h5>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri()."/img/icons/check.svg"?>" alt="Ikona listy">
                    <h5>Satysfakcja klienta</h5>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri()."/img/icons/check.svg"?>" alt="Ikona listy">
                    <h5>Najnowocześniejszy sprzęt</h5>
                </li>
            </ul>
        </div>
    </div>
    <div class="aboutUsPhotos">
        <img class="smallImg" src="<?php echo get_template_directory_uri()."/img/aboutUs1.png"?>" alt="Zdjecie osoby koszącej trawe">
        <img class="bigImg"   src="<?php echo get_template_directory_uri()."/img/aboutUs2.png"?>" alt="Zdjęcie osoby myjącej okna na wysokościach">
    </div>
</section>


<section id="realizations">
    <h2>Nasze najlepsze realizacje</h2>
    <h6>Odkąd rozpoczęliśmy naszą działalność, nasza firma sprzątająca zawsze dążyła do zapewnienia najwyższej jakości usług dla naszych klientów. Prezentujemy więc nasze najważniejsze realizacje, które pokazują nasze umiejętności i zaangażowanie w każdym zadaniu, jakie nam powierzono.</h6>
    <div class="realizationsItems">
        <?php

        $allPostsWPQuery = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>4,'category_name' => 'Ważne')); ?>

        <?php if ( $allPostsWPQuery->have_posts() ) : ?>

            <?php while ( $allPostsWPQuery->have_posts() ) : $allPostsWPQuery->the_post(); ?>
                
                <?php if (has_post_thumbnail()){?>
                    <div class="realizationItem" onclick="location.href='<?php the_permalink();?>'">
                        <?php 
                            echo '<img src="' . esc_url(get_the_post_thumbnail_url()) . '" alt="Zdjęcie realizacji ' . esc_attr(get_the_title()) . '">';
                        ?>
                        <div class="realizationItemText">
                            <h3><?php the_title();?></h3>
                            <?php 
                                $content = get_the_content();
                                $content = preg_replace('/<img[^>]+>/', '', $content);
                                $content = preg_replace('/<br>/', '', $content);
                            ?>
                            <p><?php echo mb_strimwidth($content, 0, 50, '...');?></p>
                            <p><?php echo get_the_date("d M Y");?></p>
                        </div>
                    </div>
                <?php
                    }
            endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e( 'Brak postów do wyświetlenia' ); ?></p>
        <?php endif; ?>

    </div>
    <?php
        $categoryID = get_cat_ID( 'Realizacje' );
        $categoryLink = get_category_link( $categoryID );
    ?>
    <a class="button buttonGreen" href="<?php echo $categoryLink ?>">Zobacz nasze wszystkie realizacje</a>
</section>


<section id="services">
    <h2>Dostępne usługi dla naszych klientów</h2>
    <h5>Nasza firma sprzątająca oferuje szeroki zakres usług, które są dostępne dla naszych klientów. Oferujemy kompleksowe rozwiązania, które dostosowujemy do indywidualnych potrzeb każdego klienta.</h5>
    <div class="servicesHolder">
        <div class="servicesList">
            <div class="servicesListItem active">
                <img src="<?php echo get_template_directory_uri()."/img/icons/vacuum.svg"?>" alt="Ikona Odkurzanie sufitów i ścian">
                <h5>Odkurzanie sufitów i ścian</h5>
                <div class="circle">1</div>
            </div>
            <div class="servicesListItem">
                <img src="<?php echo get_template_directory_uri()."/img/icons/window-cleaning.svg"?>" alt="Ikona Mycie przeszkleń">
                <h5>Mycie przeszkleń</h5>
                <div class="circle">2</div>
            </div>
            <div class="servicesListItem">
                <img src="<?php echo get_template_directory_uri()."/img/icons/scissor-lift.svg"?>" alt="Ikona Czyszczenie elewacji">
                <h5>Czyszczenie elewacji</h5>
                <div class="circle">3</div>
            </div>
            <div class="servicesListItem">
                <img src="<?php echo get_template_directory_uri()."/img/icons/lawn-mower.svg"?>" alt="Ikona Koszenie traw">
                <h5>Koszenie traw</h5>
                <div class="circle">4</div>
            </div>
        </div>
        <div class="serviceDisplay">
            <div class="serviceDescription active">
                <h6>Odkurzanie sufitów i ścian</h6>
                <h4>Odkurzanie ścian, sufitów i wentylacji z wykorzystaniem odkurzaczy do pracy z ziemi na wysokość 12m</h4>
                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue.</h5>
                <img src="<?php echo get_template_directory_uri()."/img/odkurzanieBg.png"?>" alt="Zdjecie">
            </div>
            <div class="serviceDescription">
                <h6>123</h6>
                <h4>Odkurzanie ścian, sufitów i wentylacji z wykorzystaniem odkurzaczy do pracy z ziemi na wysokość 12m</h4>
                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue.</h5>
                <img src="<?php echo get_template_directory_uri()."/img/odkurzanieBg.png"?>" alt="Zdjecie">
            </div>
            <div class="serviceDescription">
                <h6>456</h6>
                <h4>Odkurzanie ścian, sufitów i wentylacji z wykorzystaniem odkurzaczy do pracy z ziemi na wysokość 12m</h4>
                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue.</h5>
                <img src="<?php echo get_template_directory_uri()."/img/odkurzanieBg.png"?>" alt="Zdjecie">
            </div>
            <div class="serviceDescription">
                <h6>789</h6>
                <h4>Odkurzanie ścian, sufitów i wentylacji z wykorzystaniem odkurzaczy do pracy z ziemi na wysokość 12m</h4>
                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue.</h5>
                <img src="<?php echo get_template_directory_uri()."/img/odkurzanieBg.png"?>" alt="Zdjecie">
            </div>
        </div>
    </div>
</section>

<?php 
    $email = get_option('custom_dashboard_email');
    $phone = get_option('custom_dashboard_phone');
    $location = get_option('custom_dashboard_location');
    $locationRoad = get_option('custom_dashboard_location_road');
    $locationCity = get_option('custom_dashboard_location_city');
?>
<section id="contact">
    <div class="contactInfo">
        <h4>Skontaktuj się z nami</h4>
        <h6>Dziękujemy za zainteresowanie zatrudnieniem firmy Cleanness.</h6>
        <a href="mailto:<?php echo $email ?>" class="contactInfoElement">
            <img src="<?php echo get_template_directory_uri()."/img/icons/emailGreen.svg"?>" alt="Ikona emaila">
            <div class="contactInfoElementText">
                <h6>Napisz do nas</h6>
                <h5><?php echo $email ?></h5>
            </div>
        </a>
        <a href="tel:+48<?php echo $phone ?>" class="contactInfoElement">
            <img src="<?php echo get_template_directory_uri()."/img/icons/phoneGreen.svg"?>" alt="Ikona telefonu">
            <div class="contactInfoElementText">
                <h6>Zadzwoń do nas</h6>
                <h5><?php echo $phone ?></h5>
            </div>
        </a>
        <a href="<?php echo $location ?>" class="contactInfoElement">
            <img src="<?php echo get_template_directory_uri()."/img/icons/locationGreen.svg"?>" alt="Ikona Lokalizacji">
            <div class="contactInfoElementText">
                <h6><?php echo $locationCity ?></h6>
                <h5><?php echo $locationRoad ?></h5>
            </div>
        </a>
    </div>
    <?php
        
    ?>
    <form action="/" method="POST">
        <div class="formFirstRow">
            <div class="formFRL">
                <label class="labelName" for="Name">Imię i nazwisko</label>
                <input class="inputName" type="text" name="name" id="Name">
            </div>
            <div class="formFRR">
                <label class="labelEmail" for="email">Email</label>
                <input class="inputEmail" type="email" name="email" id="email">
            </div>

        </div>
        <div class="formSecondRow">
            <div class="formSRL">
                <label for="telephone">Telefon</label>
                <input type="tel" id="telephone" name="telephone" pattern="[0-9]{3} [0-9]{3} [0-9]{3}">
            </div>
            <div class="formSRR">
                <label for="service">Usługa</label>
                <select id="service" name="service" required>
                    <option value=""></option>
                    <option value="">Odkurzanie sufitów i ścian</option>
                    <option value="">Mycie przeszkleń</option>
                    <option value="">Czyszczenie elewacji</option>
                    <option value="Koszenie traw">Koszenie traw</option>
                </select>
            </div>
        </div>
        <label for="message">Wiadomość</label>
        <textarea id="message" name="message"></textarea>
        <input type="submit" value="Zamów teraz" class="button buttonBlue" name="submit" id="formSubmitBtn">
    </form>
</section>

<?php get_footer();?>

