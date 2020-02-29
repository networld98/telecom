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
<div class="page-content projects-page">
    <div class="gallery-section padded"><div class="padded-inner">
            <h1 class="header"><?$APPLICATION->ShowTitle()?></h1>
            <div class="nav">
                <div class="prev"></div>
                <div class="next"></div>
            </div>
            <div class="list">
                <div class="slides swiper-container">
                    <div class="swiper-wrapper">
                        <?foreach($arResult["ITEMS"] as $arItem):?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <div class="item yellow-underlined-href-wrapper">
                            <?$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]['ID'], array('width'=>518, 'height'=>385), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
                            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="image"><img src="<?=$file['src']?>" alt="<?=$arItem["NAME"]?>"></a>
                            <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                                <div class="title"><?echo $arItem["NAME"]?></div>
                            <?endif;?>
                            <?if($arItem["PREVIEW_TEXT"]!= NULL){?>
                                <div class="review">
                                    <?echo $arItem["PREVIEW_TEXT"];?>
                                </div>
                            <?}else{?>
                                <div class="review">
                                    <?echo $arItem["DETAIL_TEXT"];?>
                                </div>
                            <?}?>
                            <div class="features">
                            <?foreach ($arItem['PROPERTIES']['LIST']['VALUE'] as $item){?>
                            <div><?=$item?></div>
                            <?}?>
                            </div>
                            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="more yellow-underlined-href"><?if(CSite::InDir('/en/')){?>More details<?}else{?>Подробнее<?}?></a>
                        </div>
                        <?endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>