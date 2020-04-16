<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="page-content-wrapper">
    <div class="page-content project-page">
        <div class="title-section padded"><div class="padded-inner">
                <a <?if(CSite::InDir('/en/')){?>href="/en/projects/"<?}else{?>href="/projects/"<?}?> class="back"><?if(CSite::InDir('/en/')){?>To the list of projects<?}else{?>К списку проектов<?}?></a>
                <h1 class="header"><?=$arResult["NAME"]?></h1>
            </div>
        </div>
        <div class="info-section padded"><div class="padded-inner">
            <?if($arParams["DISPLAY_DETAIL_TEXT"]!="N" && $arResult["DETAIL_TEXT"]):?>
                <div class="review">
                    <?echo $arResult["DETAIL_TEXT"];?>
                </div>
            <?endif;?>
            <div class="features">
                <?if($arResult["PROPERTIES"]["CLIENT"]["VALUE"]!= NULL):?>
                <div>
                    <div class="title"><?if(CSite::InDir('/en/')){?>Client<?}else{?>Клиент<?}?></div>
                    <div class="value text">
                        <?$obElement = CIBlockElement::GetByID($arResult["PROPERTIES"]["CLIENT"]["VALUE"]);
                        if($arEl = $obElement->GetNext()){?>
                            <?$customers[] = $arEl;?>
                            <a id="slide-<?=$arEl['ID']?>"><?=$arEl['NAME']?></a>
                        <?}?>
                    </div>
                </div>
                <?endif;?>
                <?if($arResult["PROPERTIES"]["TASK"]["VALUE"]!= NULL):?>
                    <div>
                        <div class="title"><?if(CSite::InDir('/en/')){?>Task<?}else{?>Задача<?}?></div>
                        <div class="value text">
                            <?echo htmlspecialchars_decode($arResult["PROPERTIES"]["TASK"]["VALUE"]['TEXT']);?>
                        </div>
                    </div>
                <?endif;?>
                <?if($arResult["PROPERTIES"]["DECISION"]["VALUE"]!= NULL):?>
                    <div>
                        <div class="title"><?if(CSite::InDir('/en/')){?>Decision<?}else{?>Решение<?}?></div>
                        <div class="value text">
                            <?echo htmlspecialchars_decode($arResult["PROPERTIES"]["DECISION"]["VALUE"]['TEXT']);?>
                        </div>
                    </div>
                <?endif;?>
                <?if($arResult["PROPERTIES"]["CLIENT"]["VALUE"]!= NULL):?>
                    <div>
                        <div class="title"><?if(CSite::InDir('/en/')){?>The following brands were used in the project:<?}else{?>В проекте использовали бренды:<?}?></div>
                        <div class="value list">
                            <?foreach($arResult["PROPERTIES"]['BRANDS']['VALUE'] as $item){?>
                                <?$obElement = CIBlockElement::GetByID($item);
                                if($arEl = $obElement->GetNext()){?>
                                    <?$partners[] = $arEl;?>
                                    <a class="blue-underlined-href" id="slide-<?=$arEl['ID']?>"><?=$arEl['NAME']?></a>
                                <?}?>
                            <?}?>
                        </div>
                    </div>
                <?endif;?>
            </div>
        </div>
    </div>
        <div class="nav-section padded">
            <div class="padded-inner">
                <div class="nav">
                    <div class="prev"></div>
                    <div class="next"></div>
                </div>
            </div>
        </div>
        <div class="gallery-section padded"><div class="padded-inner">
                <div class="list">
                    <div class="slides swiper-container">
                        <div class="swiper-wrapper">
                            <?foreach($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $item){
                                $file = CFile::ResizeImageGet($item, array('width'=>1170, 'height'=>740), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
                                <div class="swiper-slide"><img src="<?=$file['src']?>" alt="<?=$arResult["NAME"]?>" /></div>
                            <?}?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="counter-section padded">
            <div class="padded-inner">
                <div class="counter"><div>1</div><div><?=count($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'])?></div></div>
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