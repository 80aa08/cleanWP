<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleanness</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Icons -->



    <!-- Style -->
    <?php wp_head();?>

</head>
<body>
<header>
    <!-- Mobile -->

    <img src="<?php echo get_template_directory_uri()."/logo/cleannessLogoBright.svg"?>" alt="Logo Cleanness" id="logoImg">
    <img src="<?php echo get_template_directory_uri()."/img/icons/hamburger.svg"?>" alt="Ikona otwierająca menu" id="hamburgerMenu">
    <?php 
        $email = get_option('custom_dashboard_email');
        $phone = get_option('custom_dashboard_phone');
        $location = get_option('custom_dashboard_location');
        $locationRoad = get_option('custom_dashboard_location_road');
        $locationCity = get_option('custom_dashboard_location_city');
    ?>
    <!-- Desktop -->
    <div class="headerInfo">
        <a href="mailto:<?php echo $email ?>" class="headerItem">
            <img src="<?php echo get_template_directory_uri()."/img/icons/emailBlue.svg"?>" alt="Email">
            <div class="headerItemText">
                <h6>Napisz do nas</h6>
                <h5><?php echo $email ?></h5>
            </div>
        </a>
        <a href="tel:+48<?php echo $phone ?>" class="headerItem">
            <img src="<?php echo get_template_directory_uri()."/img/icons/phoneBlue.svg"?>" alt="Telefon">
            <div class="headerItemText">
                <h6>Zadzwoń do nas</h6>
                <h5><?php echo $phone ?></h5>
            </div>
        </a>
        <div class="headerItem">
            <img src="<?php echo get_template_directory_uri()."/img/icons/clock.svg"?>" alt="Godziny otwarcia">
            <div class="headerItemText">
                <h6>Jesteśmy otwarci</h6>
                <h5>8:00 - 22:00</h5>
            </div>
        </div>
        <a href="<?php echo $location ?>" class="headerItem">
            <img src="<?php echo get_template_directory_uri()."/img/icons/locationBlue.svg"?>" alt="Lokalizacja">
            <div class="headerItemText">
                <h6><?php echo $locationRoad ?></h6>
                <h5><?php echo $locationCity ?></h5>
            </div>
        </a>
    </div>
</header>
<aside>
    <?php

    $menu_items = wp_get_nav_menu_items('Menu główne');

    if($menu_items)
    {
        foreach ($menu_items as $item)
        {
            echo '<a href="' . $item->url . '">' . $item->title . '</a>';
        }
    }
    wp_reset_postdata();
    ?>
    <button id="closeMenuBtn">&#215</button>
</aside>
<nav>
    <?php

    $menu_items = wp_get_nav_menu_items('Menu główne');

    if($menu_items)
    {
        echo '<div class="navItems">';
        foreach ($menu_items as $item)
        {
            if (is_page() && $item->title == "Galeria"){
                echo '<a class="active" href="' . $item->url . '">' . $item->title . '</a>';
            }
            elseif((is_single() || is_archive()) && $item->title == "Realizacje"){
                echo '<a class="active" href="' . $item->url . '">' . $item->title . '</a>';
            }
            else{
                echo '<a href="' . $item->url . '">' . $item->title . '</a>';
            }
        }
        echo '</div>';
    }

    ?>
    <div class="navSocials">
        <img src="<?php echo get_template_directory_uri()."/img/icons/facebook.svg"?>" alt="Ikona">
        <img src="<?php echo get_template_directory_uri()."/img/icons/facebook.svg"?>" alt="Ikona">
        <img src="<?php echo get_template_directory_uri()."/img/icons/facebook.svg"?>" alt="Ikona">
        <img src="<?php echo get_template_directory_uri()."/img/icons/facebook.svg"?>" alt="Ikona">
    </div>
</nav>