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
    <meta name="description" content="大胡にあるカフェダイニング、ランチ・ディナー">
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
    <link rel="icon" type="image/png" href="./assets/images/ONESHEARTlogo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/ONESHEARTlogo.png">
    <link rel="stylesheet" href="https://use.typekit.net/pfu4vms.css">
    <link rel="stylesheet" href="./css/top.css">
    <link rel="stylesheet" href="./css/foodmenu.css">
    <link rel="stylesheet" href="./css/rightslide.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/top.js"></script>
    <title>【公式】ONESHEART-cafe&dining-</title>
</head>

<body>
    <!-- fixed sidemenuここから -->
    <div id="SIDEMENU" class="sidemenu sidemenu_food">
        <?php include('./inc/foodmenu.php'); ?>
        <div id="MenuTitle" class="MenuTitle sidemenu_food_title">
            <p>◀ OPEN HOUR ◀</p>
        </div>
    </div>
    <div id="SIDEMENU" class="sidemenu sidemenu_drink">
        <?php include('./inc/rightslide.php'); ?>
        <div id="MenuTitle" class="MenuTitle sidemenu_drink_title">
            <p>◀ GALLERY ◀</p>
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
            <?php include('./inc/header_logo.php'); ?>
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
        <div class="notes">
            <h3>ご利用にあたって</h3>
            <p>少人数で営業しているお店ですので、料理のご提供には多少のお時間を頂いております。</p>
            <p>お急ぎの方やお待ち頂くのが苦手な方はご遠慮下さいますようお願い致します。</p>
            <p>また、ご利用中のお客様にごゆっくり過ごして頂くため、満席時にお待ち頂くことは出来ません。</p>
            <p>ご理解とご協力をお願い致します。</p>
        </div>
        <div id="CONCEPT" class="concept">
            <!-- <div class="main_image">
                <div class="main_image_cover"></div>
                 <picture>
                    <source srcset="./assets/images/aqua.webp" class="webp">
                    <img src="./assets/images/aqua.JPG" class="aqua">
                </picture>
            </div> -->
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
                                    <p><?php the_author(); ?></p>
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
                <img src="./assets/images/gaikan.png" class="gaikan">
                <p class="alignCenter">Cafe & Dining ONESHEART</p>
                <p>〒371-0223</p>
                <p>550-5,Ogo,Maebashi,Gunma</p>
                <p>群馬県前橋市大胡町550-5</p>
            </div>
            <p class="tel_info">お問合せ・ご予約はこちらから</p>
            <p class="tel">
                <a href="tel:050-1402-6358">TEL 050-1402-6358</a>
            </p>

        </div>
        <!-- <div class="contact">
            <h1>- Contact -</h1>
        </div> -->
    </main>
    <!-- mainここまで -->
    <!-- footerここから -->
    <?php include('./inc/footer.php') ?>
    <!-- footerここまで -->
</body>

</html>