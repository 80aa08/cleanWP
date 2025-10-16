<?php 
    $email = get_option('custom_dashboard_email');
    $phone = get_option('custom_dashboard_phone');
    $location = get_option('custom_dashboard_location');
    $locationRoad = get_option('custom_dashboard_location_road');
?>
<footer>
    <img src="<?php echo get_template_directory_uri()."/logo/cleannessLogoDark.svg"?>" alt="Logo" class="footerLogo1">
    <div class="footerInfo">
        <img src="<?php echo get_template_directory_uri()."/logo/cleannessLogoDark.svg"?>" alt="Logo" class="footerLogo2">
        <a href="mailto:<?php echo $email ?>" class="footerInfoElement">
            <img src="<?php echo get_template_directory_uri()."/img/icons/emailBlue.svg"?>" alt="Ikona emaila">
            <h5><?php echo $email ?></h5>
        </a>
        <a href="tel:+48<?php echo $phone ?>" class="footerInfoElement">
            <img src="<?php echo get_template_directory_uri()."/img/icons/phoneBlue.svg"?>" alt="Ikona telefonu">
            <h5><?php echo $phone ?></h5>
        </a>
        <a href="<?php echo $location ?>" class="footerInfoElement">
            <img src="<?php echo get_template_directory_uri()."/img/icons/locationBlue.svg"?>" alt="Ikona Lokalizacji">
            <h5><?php echo $locationRoad ?></h5>
        </a>
    </div>
    <div class="footerSocialMedia">
        <img src="<?php echo get_template_directory_uri()."/img/icons/facebook.svg"?>" alt="Facebook">
        <img src="<?php echo get_template_directory_uri()."/img/icons/facebook.svg"?>" alt="Facebook">
        <img src="<?php echo get_template_directory_uri()."/img/icons/facebook.svg"?>" alt="Facebook">
        <img src="<?php echo get_template_directory_uri()."/img/icons/facebook.svg"?>" alt="Facebook">
    </div>
    <hr class="line">
    <h5>Copyright © <?php echo date("Y");?> • InnovateIQ</h5>
</footer>
<?php wp_footer(); ?>
</body>
</html>