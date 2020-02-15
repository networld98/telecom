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
<div class="page-content project-page">
    <div class="title-section padded"><div class="padded-inner">
            <a href="/info/projects/" class="back">К списку проектов</a>
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
                    <div class="title">Клиент</div>
                    <div class="value text">
                        <?echo htmlspecialchars_decode($arResult["PROPERTIES"]["CLIENT"]["VALUE"]['TEXT']);?>
                    </div>
                </div>
                <?endif;?>
                <?if($arResult["PROPERTIES"]["TASK"]["VALUE"]!= NULL):?>
                    <div>
                        <div class="title">Задача</div>
                        <div class="value text">
                            <?echo htmlspecialchars_decode($arResult["PROPERTIES"]["TASK"]["VALUE"]['TEXT']);?>
                        </div>
                    </div>
                <?endif;?>
                <?if($arResult["PROPERTIES"]["DECISION"]["VALUE"]!= NULL):?>
                    <div>
                        <div class="title">Решение</div>
                        <div class="value text">
                            <?echo htmlspecialchars_decode($arResult["PROPERTIES"]["DECISION"]["VALUE"]['TEXT']);?>
                        </div>
                    </div>
                <?endif;?>
                <div>
                    <div class="title">В&nbsp;проекте использовали бренды:</div>
                    <div class="value list">
                        <?foreach($arResult["PROPERTIES"]['BRANDS']['VALUE'] as $item){?>
                            <?$obElement = CIBlockElement::GetByID($item);
                            if($arEl = $obElement->GetNext()){?>
                                <a class="blue-underlined-href" href="<?=$arEl['~PREVIEW_TEXT']?>"><?=$arEl['NAME']?></a>
                            <?}?>
                        <?}?>
                    </div>
                </div>
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