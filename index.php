<?php
include_once('./wordpress/wp-load.php');
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish'
);

$the_query = new WP_Query($args);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        (function(d) {
            var config = {
                    kitId: 'njy6bwl',
                    scriptTimeout: 3000,
                    async: true
                },
                h = d.documentElement,
                t = setTimeout(function() {
                    h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
                }, config.scriptTimeout),
                tk = d.createElement("script"),
                f = false,
                s = d.getElementsByTagName("script")[0],
                a;
            h.className += " wf-loading";
            tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
            tk.async = true;
            tk.onload = tk.onreadystatechange = function() {
                a = this.readyState;
                if (f || a && a != "complete" && a != "loaded") return;
                f = true;
                clearTimeout(t);
                try {
                    Typekit.load(config)
                } catch (e) {}
            };
            s.parentNode.insertBefore(tk, s)
        })(document);
    </script>
    <link rel="stylesheet" href="https://use.typekit.net/pfu4vms.css">
    <link rel="stylesheet" href="./css/top.css">
    <link rel="stylesheet" href="./css/foodmenu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/top.js"></script>
    <title>ONES HEART</title>
</head>

<body>
    <!-- fixed sidemenuここから -->
    <div id="SIDEMENU" class="sidemenu sidemenu_food">
        <?php include('./pages/foodmenu.php'); ?>
        <div id="MenuTitle" class="MenuTitle sidemenu_food_title">
            <p>◀ FOOD ◀</p>
        </div>
    </div>
    <div id="SIDEMENU" class="sidemenu sidemenu_drink">
        <div id="MenuTitle" class="MenuTitle sidemenu_drink_title">
            <p>◀ DRINK ◀</p>
        </div>
    </div>
    <!-- fixed sidemenuここまで -->
    <!-- navここから -->
    <?php include('./inc/nav.php'); ?>
    <!-- navここまで -->
    <!-- headerここから -->
    <header>
        <div class="header_image">
            <div class="header_image_cover"></div>
            <picture>
                <source srcset="./assets/images/counter.webp" class="webp">
                <img src="./assets/images/counter.JPG" class="counter">
            </picture>
        </div>
        <div class="header_logo">
            <h1>CAFE & Dining BAR</h1>
            <?php include('./pages/header_logo.php'); ?>
            <p>Since 2015</p>
            <h3>Welcome to ONESHEART.</h3>
            <h3>We hope you take a good time</h3>
            <h3>and your stomach and heart</h3>
            <h3>have a lot of happiness.</h3>
            <h3>Have a nice time.</h3>
        </div>
    </header>
    <!-- headerここまで -->
    <!-- mainここから -->
    <main>

        <div id="CONCEPT" class="concept">
            <div class="main_image">
                <div class="main_image_cover"></div>
                <picture>
                    <source srcset="./assets/images/aqua.webp" class="webp">
                    <img src="./assets/images/aqua.JPG" class="aqua">
                </picture>
            </div>
            <h1>- Concept -</h1>
            <h2>食を楽しむ</h2>
            <h2>酒を愉しむ</h2>
            <h2>華やかな時を</h2>
            <h3>
                私たちの仕事はお客様の<br>
                『お腹』 と 『心』<br>
                両方を満たすものでなければならない
            </h3>
            <h3>
                お一人様でも、大人数でも<br>
                お酒を飲む方も、お食事飲みの方も<br>
                皆さんに楽しんで頂けるような<br>
                そんなメニュー、お店作りを心がけています<br>
                ご来店お待ちしています
            </h3>
        </div>
        <div id="NEWS" class="news">
            <h1>- Notification -</h1>
            <div class="news_list">
                <?php
                if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) :
                        $the_query->the_post(); ?>
                        <div class="news_list_item">
                            <div class="item_data">
                                <div>
                                    <p><?php the_time('Y年'); ?></p>
                                    <p><?php the_time('n月j日'); ?></p>
                                </div>
                            </div>
                            <div class="item_content">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_content(); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="map">
            <h1>- Location -</h1>
            <div class="locationContainer">
                <p>Cafe & Dining ONESHEART</p>
                <p>371-0223</p>
                <p>550-5,Ogo,Maebashi,Gunma</p>
                <p>群馬県前橋市大胡町550-5</p>
                <picture>
                    <source srcset="./assets/images/gaikan.webp" class="webp">
                    <img src="./assets/images/gaikan.JPG" class="gaikan">
                </picture>
            </div>
            <div class="mapContainer">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d821.8569409796407!2d139.1586182905589!3d36.4091344010145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sja!2sjp!4v1643025902397!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="contact">
            <h1>- Contact -</h1>
        </div>
    </main>
    <!-- mainここまで -->
    <!-- footerここから -->
    <footer>

    </footer>
    <!-- footerここまで -->
</body>

</html>