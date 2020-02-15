<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>

    <div class="form form-table data-table">
        <?echo "<pre>";print_r($arResult);echo "</pre>";?>
        <div class="success"></div>
        <?=$arResult["FORM_NOTE"]?>
        <?if ($arResult["isFormErrors"] == "Y"):?><div class="error"><?=$arResult["FORM_ERRORS_TEXT"];?></div><?endif;?>
        <div class="form-inner">
            <div class="caption"><?=$arResult["FORM_TITLE"]?></div>
            <?
            foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
            {
                if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
                {
                    echo $arQuestion["HTML_CODE"];
                }
                else
                {
                    ?>
                    <div class="field name">
                        <div class="input">
                            <div><?=$arQuestion["HTML_CODE"]?></div>
                            <?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
                                <span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
                            <?endif;?>
                            <?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
                            <?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
                        </div>
                    </div>
                    <?
                }
            } //endwhile
            ?>
            <div class="send">
                <div class="button">
                </div>
            </div>
            <input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
        </div>
    </div>
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>