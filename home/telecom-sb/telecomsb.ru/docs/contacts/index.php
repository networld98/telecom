<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Телекомсб | Контакты");
?>
    <div class="page-content contacts-page">
        <div class="info-section padded"><div class="padded-inner">
                <h1 class="header">Контакты</h1>
                <?$APPLICATION->IncludeFile("/info/include/contact_block.php", Array(), Array(
                    "MODE"      => "php",
                    "NAME"      => "Редактирование включаемой области раздела",
                    "TEMPLATE"  => "section_include_template.php"
                ));?>
                <div class="map"><div></div></div>
            </div>
        </div>

        <div class="form-section padded">
            <div class="padded-inner">
                <?$APPLICATION->IncludeComponent("bitrix:form.result.new","contacts",Array(
                        "SEF_MODE" => "Y",
                        "WEB_FORM_ID" => 1,
                        "AJAX_MODE" => "Y",
                        "SUCCESS_URL" => "",
                        "CHAIN_ITEM_TEXT" => "",
                        "CHAIN_ITEM_LINK" => "",
                        "IGNORE_CUSTOM_TEMPLATE" => "Y",
                        "USE_EXTENDED_ERRORS" => "Y",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "3600",
                        "SEF_FOLDER" => "/",
                        "VARIABLE_ALIASES" => Array(
                        )
                    )
                );?>
            </div>
        </div>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>