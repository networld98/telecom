<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Телекомсб | О компании");
?><?
CModule::IncludeModule('iblock');
$arFilter = Array("IBLOCK_ID"=>"76");
$arSelect = Array("ID","NAME");
$res = CIBlockElement::GetList(Array("NAME"=>"ASC"), $arFilter,false,false, $arSelect);
while($ob = $res->GetNextElement()){
    $arFields = $ob->GetFields();
}?>

<div class="page-content-wrapper">
    <div class="page-content about-page">
        <div class="top-bg-section padded">
            <div class="padded-inner"></div>
        </div>
        <div class="bottom-bg-section"></div>
        <div class="top-section padded">
            <div class="padded-inner">
                <div class="left">
                    <h1 class="header">О компании</h1>
                    <div class="text">
                        <?$APPLICATION->IncludeFile("/info/include/company_text.php", Array(), Array(
                            "MODE"      => "php",
                            "NAME"      => "Редактирование включаемой области раздела",
                            "TEMPLATE"  => "section_include_template.php"
                        ));?>
                    </div>
                </div>
                <div class="right">
                    <?/*$APPLICATION->IncludeFile("/info/include/presentation.php", Array(), Array(
                        "MODE"      => "php",
                        "NAME"      => "Редактирование включаемой области раздела",
                        "TEMPLATE"  => "section_include_template.php"
                    ));*/?>
                </div>
            </div>
        </div>
        <div class="history-section padded"><div class="padded-inner">
                <h2 class="header">История</h2>
                <div class="nav">
                    <div class="controller swiper-container"><div class="swiper-wrapper">
                            <div class="swiper-slide dup"></div>
                            <div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div><div class="swiper-slide"></div>
                        </div></div>
                    <div class="view-wrapper">
                        <div class="view"><div>
                                <div class="dup"></div>
                                <?
                                $arFilter = Array("IBLOCK_ID"=>"75","ACTIVE"=>"Y");
                                $arSelect = Array("NAME","PREVIEW_TEXT");
                                $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter,false, false, $arSelect);
                                while($ob = $res->GetNextElement()){
                                    $arFields = $ob->GetFields();
                                    $history[] = $arFields;?>
                                <div><div><?=$arFields["NAME"]?></div></div>
                                <?}?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="slide-to">
                        <div class="prev"></div>
                        <div class="next"></div>
                    </div>
                    <div class="slides swiper-container">
                        <div class="swiper-wrapper">
                            <?foreach ($history as $item){?>
                                 <div class="swiper-slide">
                                    <div class="year"><?=$item['NAME']?></div>
                                    <div class="text">
                                        <?=$item['PREVIEW_TEXT']?>
                                    </div>
                                </div>
                            <?}?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="partners-section padded">
            <div class="padded-inner">
                <h2 class="header">Партнеры</h2>
                <div class="text">
                    <?$APPLICATION->IncludeFile("/info/include/partners_text.php", Array(), Array(
                        "MODE"      => "php",
                        "NAME"      => "Редактирование включаемой области раздела",
                        "TEMPLATE"  => "section_include_template.php"
                    ));?>            </div>
                <div class="list">
                    <div class="nav"><div class="prev"></div><div class="next"></div></div>
                    <div class="slides swiper-container">
                        <div class="swiper-wrapper">
                            <?
                            $arFilter = Array("IBLOCK_ID"=>"73","ACTIVE"=>"Y");
                            $arSelect = Array("ID","NAME","PREVIEW_TEXT","DETAIL_TEXT","DETAIL_PICTURE");
                            $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter,false, false, $arSelect);
                            while($ob = $res->GetNextElement()){
                                $arFields = $ob->GetFields();
                                $img = CFile::ResizeImageGet($arFields['DETAIL_PICTURE'], array('width'=>193,'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                $partners[] = $arFields;?>
                                <div class="swiper-slide" id="slide-<?=$arFields['ID']?>">
                                    <img src="<?=$img['src'] ?>" alt="<?$arFields['NAME']?>">
                                </div>
                            <?}?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="customers-section padded">
            <div class="padded-inner">
                <h2 class="header">Клиенты</h2>
                <div class="list">
                    <div class="nav"><div class="prev"></div><div class="next"></div></div>
                    <div class="slides swiper-container">
                        <div class="swiper-wrapper">
                            <?
                            $arFilter = Array("IBLOCK_ID"=>"74","ACTIVE"=>"Y");
                            $arSelect = Array("ID","NAME","PREVIEW_TEXT","DETAIL_TEXT","DETAIL_PICTURE");
                            $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter,false, false, $arSelect);
                            while($ob = $res->GetNextElement()){
                                $arFields = $ob->GetFields();
                                $img = CFile::ResizeImageGet($arFields['DETAIL_PICTURE'], array('width'=>150,'height'=>150), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                $customers[] = $arFields;?>
                                <div class="swiper-slide" id="slide-<?=$arFields['ID']?>">
                                    <img src="<?=$img['src'] ?>" alt="<?=$arFields['NAME']?>">
                                </div>
                            <?}?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="licenses-section padded">
            <div class="padded-inner">
                <h2 class="header">Лицензии и&nbsp;свидетельства</h2>
                <div class="text">
                    <?$APPLICATION->IncludeFile("/info/include/license_text.php", Array(), Array(
                        "MODE"      => "php",
                        "NAME"      => "Редактирование включаемой области раздела",
                        "TEMPLATE"  => "section_include_template.php"
                    ));?>
                </div>
                <div class="list">
                    <?
                    $arFilter = Array("IBLOCK_ID"=>"76","ACTIVE"=>"Y");
                    $arSelect = Array("NAME","PROPERTY_LINK");
                    $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter,false, false, $arSelect);
                    while($ob = $res->GetNextElement()){
                        $arFields = $ob->GetFields();?>
                        <a href="<?=$arFields['PROPERTY_LINK_VALUE']?>" class="yellow-underlined-href-wrapper">
                            <div class="title"><?=$arFields['NAME']?></div>
                            <div class="view yellow-underlined-href"></div>
                        </a>

                    <?}?>
                </div>
            </div>
        </div>
    </div>
</div>
<?foreach ($customers as $item){
    $imgBig = CFile::ResizeImageGet($item['DETAIL_PICTURE'], array('width'=>380), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    ?>
    <div class="partner-popup partner-popup-<?=$item['ID']?> padded">
        <div>
            <div class="close"></div>
            <div class="header"><?=$item['NAME']?></div>
            <div class="info">
                <div class="image"><img src="<?=$imgBig['src']?>" alt="<?=$item['NAME']?>"/></div>
                <div class="text">
                    <div>
                        <div class="preamble"><?=$item['PREVIEW_TEXT']?></div>
                        <p><?=$item['DETAIL_TEXT']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}?>
<?foreach ($partners as $item){
    $imgBig = CFile::ResizeImageGet($item['DETAIL_PICTURE'], array('width'=>380), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    ?>
    <div class="partner-popup partner-popup-<?=$item['ID']?> padded">
        <div>
            <div class="close"></div>
            <div class="header"><?=$item['NAME']?></div>
            <div class="info">
                <div class="image"><img src="<?=$imgBig['src']?>" alt="<?=$item['NAME']?>" /></div>
                <div class="text">
                    <div>
                        <div class="preamble"><?=$item['PREVIEW_TEXT']?></div>
                        <p><?=$item['DETAIL_TEXT']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}?>
    <script>
        $(document).ready(function() {
            <?foreach ($customers as $item){
                $imgBig = CFile::ResizeImageGet($item['DETAIL_PICTURE'], array('width'=>230,'height'=>230), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                ?>
                    $('#slide-<?=$item["ID"]?>').click(function () {
                        $('.partner-popup-<?=$item["ID"]?>').first().addClass('shown');
                    });
            <?}?>
            <?foreach ($partners as $item){
            $imgBig = CFile::ResizeImageGet($item['DETAIL_PICTURE'], array('width'=>230,'height'=>230), BX_RESIZE_IMAGE_PROPORTIONAL, true);
            ?>
                    $('#slide-<?=$item["ID"]?>').click(function () {
                        $('.partner-popup-<?=$item["ID"]?>').first().addClass('shown');
                    });
            <?}?>
        });
    </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>