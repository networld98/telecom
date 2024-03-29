<!DOCTYPE html>
<?if(CSite::InDir('/en/')){?>
    <html lang="en">
<?}else{?>
    <html lang="<?=LANGUAGE_ID?>">
<?}?>
<head>
    <title><?=$APPLICATION->ShowTitle();?></title>
    <meta charset="utf-8" />
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="format-detection" content="telephone=no" />	
	
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/apple-touch-icon-152x152.png" />    
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/apple-touch-icon-180x180.png" />
	<link rel="icon" type="image/png" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/favicon-128x128.png" sizes="128x128" />
    <link rel="icon" type="image/png" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/favicon-160x160.png" sizes="160x160" />	
	<link rel="icon" type="image/png" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/favicon-192x192.png" sizes="192x192" />
	<link rel="icon" type="image/png" href="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/favicon-196x196.png" sizes="196x196" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/mstile-150x150.png" />
	<meta name="msapplication-square310x310logo" content="<?php echo SITE_TEMPLATE_PATH ?>/assets/img/favicon/mstile-310x310.png" />
	
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

<script src="https://api-maps.yandex.ru/2.1/?apikey=7eac357d-9894-4506-85eb-2c6239d0d0cc&lang=<?if(CSite::InDir('/en/')){?>en_US<?}else{?>ru_RU<?}?>" type="text/javascript"></script>

</head>
<?if ($USER->IsAdmin()){?><div id="panel"><?$APPLICATION->ShowPanel();?></div><?}?>
<body>
<div class="body">
    <header class="page-header padded"><div class="padded-inner">
            <?if(CSite::InDir('/en/')){?>
                <a href="/en/" class="logo" style="	background: url(<?php echo SITE_TEMPLATE_PATH ?>/assets/img/logo_en.svg) no-repeat center center/contain;"></a>
            <?}else{?>
                <a href="/" class="logo" style="background: url(<?php echo SITE_TEMPLATE_PATH ?>/assets/img/logo.svg) no-repeat center center/contain;"></a>
            <?}?>
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
            <? if(CSite::InDir('/en/')) {?>
                <?$APPLICATION->IncludeFile("/en/include/header_phone.php", Array(), Array(
                    "MODE"      => "php",
                    "NAME"      => "Редактирование включаемой области раздела",
                    "TEMPLATE"  => "section_include_template.php"
                ));?>
            <?}else{?>
                <?$APPLICATION->IncludeFile("/include/header_phone.php", Array(), Array(
                    "MODE"      => "php",
                    "NAME"      => "Редактирование включаемой области раздела",
                    "TEMPLATE"  => "section_include_template.php"
                ));?>
            <?}?>
            <div class="lang">
                <a class="yellow-underlined-href <?if(CSite::InDir('/en/')){?>current noLink<?}?>" href="/en/">Eng</a>
                <a class="yellow-underlined-href <?if(CSite::InDir('/en/')){}else{?>current noLink<?}?>" href="/">Rus</a>
            </div>
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

            <? if(CSite::InDir('/en/')){?>
                <?$APPLICATION->IncludeFile("/en/include/header_phone.php", Array(), Array(
                    "MODE"      => "php",
                    "NAME"      => "Редактирование включаемой области раздела",
                    "TEMPLATE"  => "section_include_template.php"
                ));?>
            <?}else{?>
                <?$APPLICATION->IncludeFile("/include/header_phone.php", Array(), Array(
                    "MODE"      => "php",
                    "NAME"      => "Редактирование включаемой области раздела",
                    "TEMPLATE"  => "section_include_template.php"
                ));?>
            <?}?>
            <div class="lang">
                <a class="yellow-underlined-href <?if(CSite::InDir('/en/')){?>current noLink<?}?>" href="/en/">Eng</a>
                <a class="yellow-underlined-href <?if(CSite::InDir('/en/')){}else{?>current noLink<?}?>" href="/">Rus</a>
            </div>
            <div class="socials">
                <? if(CSite::InDir('/en/')){?>
                    <?$APPLICATION->IncludeFile("/en/include/social.php", Array(), Array(
                        "MODE"      => "php",
                        "NAME"      => "Редактирование включаемой области раздела",
                        "TEMPLATE"  => "section_include_template.php"
                    ));?>
                <?}else{?>
                    <?$APPLICATION->IncludeFile("/include/social.php", Array(), Array(
                        "MODE"      => "php",
                        "NAME"      => "Редактирование включаемой области раздела",
                        "TEMPLATE"  => "section_include_template.php"
                    ));?>
                <?}?>
            </div>
        </div>
    </div>
   <? if(CSite::InDir('/en/')){?>
		<?$APPLICATION->IncludeFile("/en/include/alarm.php", Array(), Array(
			"MODE"      => "php",
			"NAME"      => "Редактирование включаемой области раздела",
			"TEMPLATE"  => "section_include_template.php"
		));?>
	<?}else{?>
		<?$APPLICATION->IncludeFile("/include/alarm.php", Array(), Array(
        "MODE"      => "php",
        "NAME"      => "Редактирование включаемой области раздела",
        "TEMPLATE"  => "section_include_template.php"
   		 ));?>
	<?}?>

    <? if(CSite::InDir('/projects/') || $APPLICATION->GetCurPage(false) == '/about/' || CSite::InDir('/en/projects/') || $APPLICATION->GetCurPage(false) == '/en/about/'){
    }else{?>
        <div class="page-content-wrapper">
    <?}?>
