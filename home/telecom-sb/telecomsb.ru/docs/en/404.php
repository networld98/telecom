<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("title", "404 Not Found");
$APPLICATION->SetTitle("Page not found (404 Not Found)");
?>
<div class="top-section padded"><div class="padded-inner">
        <div class="info">
            <div class="header">404</div>
            <div class="text">Sory, but such a page does not exist. Try to return to<a href="/" class="blue-underlined-href">the main</a></div>
        </div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
