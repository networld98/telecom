<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormNote"] != "Y")
{
    ?>
    <?=$arResult["FORM_HEADER"]?>

    <div class="form form-table data-table">
        <div class="success"></div>
        <?=$arResult["FORM_NOTE"]?>
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
                        <div class="input<?if($arQuestion['STRUCTURE'][0]['FIELD_TYPE']== "textarea"){?> input-line input-text<?}?><?if($arQuestion['STRUCTURE'][0]['FIELD_TYPE']== "file"){?>input-line input-file<?}?>">
                            <div><?=$arQuestion["HTML_CODE"]?></div>
                            <?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
                            <?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
                        </div>
                    </div>
                    <?
                }
            } //endwhile
            ?>
            <?if ($arResult["isFormErrors"] == "Y"):?><div class="error"><?=$arResult["FORM_ERRORS_TEXT"];?></div><?endif;?>
            <input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('[name=web_form_submit]').click(function(){
                var  $name = $('[name=form_text_1]').val();
                var  $tel = $('[name=form_text_2]').val();
              if ($name !== null && $name !== "" && $tel !== null && $tel !== ""){
                  $('.contacts-page .form-section').addClass('sent')
                }
            });
        });
    </script>
    <?=$arResult["FORM_FOOTER"]?>
    <?
} //endif (isFormNote)
?>