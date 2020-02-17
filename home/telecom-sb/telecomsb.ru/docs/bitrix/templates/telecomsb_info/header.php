<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<head>
    <title><?=$APPLICATION->ShowTitle();?></title>
    <meta charset="utf-8" />
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/fav.ico" />
    <?$APPLICATION->ShowHead();?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>

    <link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/css/basics.css" />
    <link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/css/uikit.css" />
    <link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/css/app.css" />
    <link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/css/start.css" />
    <link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/css/about.css" />
    <link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/css/projects.css" />
    <link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/css/project.css" />
    <link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/css/contacts.css" />
    <link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/css/services.css" />
    <link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/css/nopage.css" />
    <link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/css/news.css" />
    <link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/css/article.css" />

    <script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/assets/js/jquery.js" ></script>
    <script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/assets/js/jquery.mask.js" ></script>
    <script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/assets/js/basics.js" ></script>
    <script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/assets/js/app.js" ></script>
    <script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/assets/js/start.js" ></script>
    <script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/assets/js/about.js" ></script>
    <script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/assets/js/projects.js" ></script>
    <script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/assets/js/project.js" ></script>
    <script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/assets/js/contacts.js" ></script>
    <script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/assets/js/services.js" ></script>
    <script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/assets/js/article.js" ></script>

<script src="https://api-maps.yandex.ru/2.1/?apikey=7eac357d-9894-4506-85eb-2c6239d0d0cc&lang=ru_RU" type="text/javascript"></script>

</head>
<?if ($USER->IsAdmin()){?><div id="panel"><?$APPLICATION->ShowPanel();?></div><?}?>
<body>
<div class="body">
    <header class="page-header padded"><div class="padded-inner">
            <a href="/info/" class="logo"></a>
            <?$APPLICATION->IncludeComponent("bitrix:menu","top_info",Array(
                    "ROOT_MENU_TYPE" => "topinfo",
                    "MAX_LEVEL" => "1",
                    "CHILD_MENU_TYPE" => "topinfo",
                    "USE_EXT" => "Y",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "Y",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => ""
                )
            );?>
            <?$APPLICATION->IncludeFile("/info/include/header_phone.php", Array(), Array(
                "MODE"      => "php",
                "NAME"      => "Редактирование включаемой области раздела",
                "TEMPLATE"  => "section_include_template.php"
            ));?>
            <div class="nav-button"><div></div><div></div><div></div></div>
        </div>
    </header>
    <script>
        (function(a,e,f,g,b,c,d){a.GoogleAnalyticsObject=b;a[b]=a[b]||function(){(a[b].q=a[b].q||[]).push(arguments)};a[b].l=1*new Date;c=e.createElement(f);d=e.getElementsByTagName(f)[0];c.async=1;c.src=g;d.parentNode.insertBefore(c,d)})(window,document,"script","//telecomsb.ru/bitrix/js/analytics.js","ga");ga("create","UA-55845441-1","auto");ga("send","pageview");
    </script>
    <div class="nav-overlay padded">
        <div class="padded-inner">
            <nav class="nav">
                <?$APPLICATION->IncludeComponent("bitrix:menu","top_info",Array(
                        "ROOT_MENU_TYPE" => "topinfo",
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "topinfo",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "Y",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => ""
                    )
                );?>
            </nav>
            <?$APPLICATION->IncludeFile("/info/include/header_phone.php", Array(), Array(
                "MODE"      => "php",
                "NAME"      => "Редактирование включаемой области раздела",
                "TEMPLATE"  => "section_include_template.php"
            ));?>
            <div class="socials">
                <a href="https://vk.com/" target="__blank" class="social vk"></a>
                <a href="https://www.facebook.com/" target="__blank" class="social facebook"></a>
            </div>
        </div>
    </div>
    <? if(CSite::InDir('/info/projects/') || $APPLICATION->GetCurPage(false) == '/info/about/'){
    }else{?>
        <div class="page-content-wrapper">
    <?}?>
