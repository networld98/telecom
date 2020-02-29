<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<nav class="nav">
    <?
    $previousLevel = 0;
    foreach($arResult as $arItem):?>

        <?if ($arItem["DEPTH_LEVEL"] == 1):?>
            <a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>yellow-href<?else:?>yellow-href<?endif?> <?if ($arItem["SELECTED"]):?>current<?endif?>"><span><?=$arItem["TEXT"]?></span></a>
        <?else:?>
            <a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?> class="item-selected <?if ($arItem["SELECTED"]):?>current<?endif?>"<?endif?>><span><?=$arItem["TEXT"]?></span></a>
        <?endif?>

        <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

    <?endforeach?>

    <a href="/magazin/" class="yellow-href-wrapper shop-link"><div class="yellow-href" href="#"><?if(CSite::InDir('/en/')){?>Shop<?}else{?>Магазин<?}?></div></a>
</nav>
<?endif?>