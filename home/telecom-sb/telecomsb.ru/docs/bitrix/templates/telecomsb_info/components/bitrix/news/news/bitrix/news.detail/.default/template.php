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
<div class="page-content article-page">
    <div class="back-section padded"><div class="padded-inner">
            <a class="back" <?if(CSite::InDir('/en/')){?>href="/en/news/"<?}else{?>href="/news/"<?}?>><?if(CSite::InDir('/en/')){?>To the list of news<?}else{?>К списку новостей<?}?></a>
        </div>
    </div>
    <div class="text-section padded">
        <div class="padded-inner">
            <div class="header"><?=$arResult["NAME"]?></div>
            <div class="text">
                <?if($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] != NULL):?>
                    <div class="slider">
                        <div class="nav">
                            <div class="prev disabled"></div>
                            <div class="next"></div>
                        </div>
                        <div class="slides swiper-container">
                            <div class="swiper-wrapper">
                                <?foreach($arResult['PROPERTIES']['MORE_PHOTO']['~VALUE'] as $item){
                                    $img = CFile::GetPath($item);?>
                                    <div class="swiper-slide" data-src="<?=$img['src']?>" alt="<?=$arResult["NAME"]?>"></div>
                                 <?}?>
                            </div>
                        </div>
                    </div>
                <?endif;?>
                <?if(strlen($arResult["DETAIL_TEXT"])>0):?>
                <?echo $arResult["DETAIL_TEXT"];?>
                <?else:?>
                <?echo $arResult["PREVIEW_TEXT"];?>
                <?endif?>
            </div>
        </div>
    </div>
</div>
