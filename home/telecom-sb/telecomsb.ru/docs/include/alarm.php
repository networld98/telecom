<? if (CModule::IncludeModule('highloadblock')){
        $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById(2)->fetch();
        $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
        $strEntityDataClass = $obEntity->getDataClass();
        $resData = $strEntityDataClass::getList(array(
            'select' => array('UF_CHECK', 'UF_MESSAGE'),
            'order'  => array(),
        ));
        while($arItem = $resData->Fetch()){
            if($arItem["UF_CHECK"] == 1){?>
                <div class="alarm">
                    <div class="top-section padded">
                        <?=$arItem['UF_MESSAGE']?>
                    </div>
                </div>
            <?}
        }
    }
?>