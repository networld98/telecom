<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

if($arResult["NavPageCount"] > 1)
{
    ?>
    <div class="nav">
        <?if ($arResult["NavPageNomer"] != 1){?>
            <a class="switch prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"></a>
        <?}?>
        <div class="pages<?if ($arResult["NavPageNomer"] != 1){?> prev-pages<?}?><?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]){?> next-pages<?}?>">
            <?
            if($arResult["bDescPageNumbering"] === true):
                $bFirst = true;
                if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
                    if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
                        $bFirst = false;
                        if($arResult["bSavePage"]):
                            ?>
                            <a class="blog-page-first" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><div>1</div></a>
                        <?
                        else:
                            ?>
                            <a class="blog-page-first" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><div>1</div></a>
                        <?
                        endif;
                        ?>
                        <?
                        if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
                            ?>
                            <a class="blog-page-dots"><div>...</div></a>
                        <?
                        endif;
                    endif;
                endif;
                do
                {
                    $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;

                    if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                        ?>
                        <a class="current"><div><?=$NavRecordGroupPrint?></div></a>
                    <?
                    elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
                        ?>
                        <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "blog-page-first" : "")?>"><?=$NavRecordGroupPrint?></a>
                    <?
                    else:
                        ?>
                        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
                        ?> class="<?=($bFirst ? "blog-page-first" : "")?>"><?=$NavRecordGroupPrint?></a>

                    <?
                    endif;
                    ?>
                    <?

                    $arResult["nStartPage"]--;
                    $bFirst = false;
                } while($arResult["nStartPage"] >= $arResult["nEndPage"]);

                if ($arResult["NavPageNomer"] > 1):
                    if ($arResult["nEndPage"] > 1):
                        if ($arResult["nEndPage"] > 2):
                            ?>
                            <a class="blog-page-dots"><div>...</div></a>
                        <?
                        endif;
                        ?>
                        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><div><?=$arResult["NavPageCount"]?></div></a>
                    <?
                    endif;

                    ?>
                    <a class="switch next"href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"></a>
                <?
                endif;

            else:
                $bFirst = true;
                if ($arResult["NavPageNomer"] > 1):
                    if ($arResult["nStartPage"] > 1):
                        $bFirst = false;
                        if($arResult["bSavePage"]):
                            ?>
                            <a class="blog-page-first" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><div>1</div></a>
                        <?
                        else:
                            ?>
                            <a class="blog-page-first" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><div>1</div></a>
                        <?
                        endif;
                        ?>
                        <?
                        if ($arResult["nStartPage"] > 2):
                            ?>
                            <a class="blog-page-dots"><div>...</div></a>
                        <?
                        endif;
                    endif;
                endif;

                do
                {
                    if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                        ?>
                        <a class="current"><div><?=$arResult["nStartPage"]?></div></a>
                    <?
                    elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
                        ?>
                        <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "blog-page-first" : "")?>"><div><?=$arResult["nStartPage"]?></div></a>
                    <?
                    else:
                        ?>
                        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
                        ?> class="<?=($bFirst ? "blog-page-first" : "")?>"><div><?=$arResult["nStartPage"]?></div></a>
                    <?
                    endif;
                    ?>
                    <?
                    $arResult["nStartPage"]++;
                    $bFirst = false;
                } while($arResult["nStartPage"] <= $arResult["nEndPage"]);

                if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
                    if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
                        if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
                            ?>
                            <a class="blog-page-dots"><div>...</div></a>
                        <?
                        endif;
                        ?>
                        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><div><?=$arResult["NavPageCount"]?></div></a>
                    <?
                    endif;
                    ?>
                <?
                endif;
            endif;
            ?>
        </div>
        <?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]){?>
            <a class="switch next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"></a>
        <?}?>
    </div>
    <?
}
?>