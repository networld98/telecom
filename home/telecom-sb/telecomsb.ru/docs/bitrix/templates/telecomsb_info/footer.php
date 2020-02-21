<? if(CSite::InDir('/info/projects/') || $APPLICATION->GetCurPage(false) == '/info/about/'){
}else{?>
</div>
<?}?>
    <footer class="page-footer padded"><div class="padded-inner">
        <div class="info">
            <?$APPLICATION->IncludeFile("/info/include/copyright.php", Array(), Array(
                "MODE"      => "php",
                "NAME"      => "Редактирование включаемой области раздела",
                "TEMPLATE"  => "section_include_template.php"
            ));?>
        </div>

        <?$APPLICATION->IncludeFile("/info/include/footer_contacts.php", Array(), Array(
                "MODE"      => "php",
                "NAME"      => "Редактирование включаемой области раздела",
                "TEMPLATE"  => "section_include_template.php"
            ));?>
            <?$APPLICATION->IncludeComponent("bitrix:menu","footer_info",Array(
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
    </div>
</footer>
</div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function(b,c,a){(c[a]=c[a]||[]).push(function(){try{c.yaCounter14934898=new Ya.Metrika({id:14934898,webvisor:!0,clickmap:!0,trackLinks:!0,accurateTrackBounce:!0})}catch(a){}});var e=b.getElementsByTagName("script")[0],d=b.createElement("script");a=function(){e.parentNode.insertBefore(d,e)};d.type="text/javascript";d.async=!0;d.src=("https:"==b.location.protocol?"https:":"http:")+"//telecomsb.ru/js/watch.js";"[object Opera]"==c.opera?b.addEventListener("DOMContentLoaded",a,!1):a()})(document,
        window,"yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/14934898" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>