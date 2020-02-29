<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="nav">
    <div>
        <?if (!empty($arResult)):?>
            <?
            $previousLevel = 0;
            foreach($arResult as $arItem):?>
                <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                    <a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>current<?endif?>"><span><?=$arItem["TEXT"]?></span></a>
                <?else:?>
                    <a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?> class="item-selected <?if ($arItem["SELECTED"]):?>current<?endif?>"<?endif?>><span><?=$arItem["TEXT"]?></span></a>
                <?endif?>
                <?$previousLevel = $arItem["DEPTH_LEVEL"];?>
            <?endforeach?>
            <a href="/magazin/"><?if(CSite::InDir('/en/')){?>Shop<?}else{?>Магазин<?}?></a>
        <?endif?>
    </div>
    <div>
    <?/* if(CSite::InDir('/en/')){?>
        <?$APPLICATION->IncludeFile("/en/include/social.php", Array(), Array(
            "MODE"      => "php",
            "NAME"      => "Редактирование включаемой области раздела",
            "TEMPLATE"  => "section_include_template.php"
        ));?>
    <?}else{?>
        <?$APPLICATION->IncludeFile("/info/include/social.php", Array(), Array(
            "MODE"      => "php",
            "NAME"      => "Редактирование включаемой области раздела",
            "TEMPLATE"  => "section_include_template.php"
        ));?>
    <?}*/?>
    </div>
</div>
