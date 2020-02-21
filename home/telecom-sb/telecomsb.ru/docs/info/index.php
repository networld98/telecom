<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Телекомсб");
CModule::IncludeModule('iblock');
?>

    <div class="page-content start-page">
            <div class="top-section padded">
                <div class="padded-inner">
                    <?
                    $arFilter = Array("IBLOCK_ID"=>"80","ACTIVE"=>"Y");
                    $arSelect = Array("ID","NAME","PROPERTY_LINK","PREVIEW_PICTURE","PROPERTY_ONPHOTO","PROPERTY_SIGNATURE");
                    $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter,false, Array("nPageSize"=>1), $arSelect);
                    while($ob = $res->GetNextElement()){
                        $arFields = $ob->GetFields();
                    }
                    $banner = CFile::ResizeImageGet($arFields['PREVIEW_PICTURE'], array('width'=>1060, 'height'=>700), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    ?>
                    <div class="big" style="background-image: url(<?echo $banner['src']?>);">
                        <div class="top">
                            <div class="caption"><?=$arFields['NAME']?></div>
                            <?echo htmlspecialchars_decode($arFields['PROPERTY_LINK_VALUE'])?>
                        </div>
                        <div class="bottom">
                            <div class="caption">На фото: <?=$arFields['PROPERTY_ONPHOTO_VALUE']?></div>
                            <div class="text"><?=$arFields['PROPERTY_SIGNATURE_VALUE']?></div>
                        </div>
                    </div>
                    <div class="news">
                        <div class="nav">
                            <div class="prev"></div>
                            <div class="next"></div>
                        </div>
                        <div class="list swiper-container">
                            <div class="swiper-wrapper">
                                <?
                                $arFilter = Array("IBLOCK_ID"=>"79","ACTIVE"=>"Y");
                                $arSelect = Array("ID","NAME","PREVIEW_PICTURE","TIMESTAMP_X","DETAIL_TEXT","DETAIL_PAGE_URL");
                                $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter,false, false, $arSelect);
                                while($ob = $res->GetNextElement()){
                                    $arFields = $ob->GetFields();
                                    $img = CFile::ResizeImageGet($arFields['PREVIEW_PICTURE'], array('width'=>335, 'height'=>235), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
                                    <a href="<?=$arFields["DETAIL_PAGE_URL"]?>" class="swiper-slide">
                                        <div class="image" style="background-image: url(<? echo $img['src']?>"></div>
                                        <div class="info">
                                            <div class="date"><? echo PHPFormatDateTime($arFields["TIMESTAMP_X"], "d.m.Y");?></div>
                                            <div class="title"><?=$arFields["NAME"]?></div>
                                            <div class="text"><?echo mb_strimwidth($arFields["DETAIL_TEXT"], 0, 130, "..."); ?></div>
                                            <div class="more yellow-underlined-href"></div>
                                        </div>
                                    </a>
                                <?}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-section padded">
                <div class="padded-inner">
                    <div class="info">
                        <?$APPLICATION->IncludeFile("/info/include/index_bottom_block.php", Array(), Array(
                            "MODE"      => "php",
                            "NAME"      => "Редактирование включаемой области раздела",
                            "TEMPLATE"  => "section_include_template.php"
                        ));?>
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
            $imgBig = CFile::ResizeImageGet($item['DETAIL_PICTURE'], array('width'=>380), BX_RESIZE_IMAGE_PROPORTIONAL, true);
            ?>
            $('#slide-<?=$item["ID"]?>').click(function () {
                $('.partner-popup-<?=$item["ID"]?>').first().addClass('shown');
            });
            <?}?>
            <?foreach ($partners as $item){
            $imgBig = CFile::ResizeImageGet($item['DETAIL_PICTURE'], array('width'=>380), BX_RESIZE_IMAGE_PROPORTIONAL, true);
            ?>
            $('#slide-<?=$item["ID"]?>').click(function () {
                $('.partner-popup-<?=$item["ID"]?>').first().addClass('shown');
            });
            <?}?>
        });
    </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>