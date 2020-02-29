<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Telecomsb | Services");
CModule::IncludeModule('iblock');
?>
    <div class="page-content services-page">
        <div class="top-section padded"><div class="padded-inner">
                <h1 class="header">Services</h1>
                <div class="nav">
                    <div class="prev"></div>
                    <div class="next"></div>
                </div>
                <div class="list swiper-container">
                    <div class="swiper-wrapper">
                        <?
                        $arFilter = Array("IBLOCK_ID"=>"88","ACTIVE"=>"Y");
                        $arSelect = Array("NAME","PROPERTY_LINK","PROPERTY_SVG");
                        $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter,false, false, $arSelect);
                        $i=0;
                        while($ob = $res->GetNextElement()){
                            $arFields = $ob->GetFields();?>
                            <a href="<?=$arFields['PROPERTY_LINK_VALUE']?>" class="swiper-slide">
                                <div>
                                    <div class="index"><?if ($i<9){?>0<?} echo ++$i?></div>
                                    <div class="image" style="background-image: url(<? echo CFile::GetPath($arFields['PROPERTY_SVG_VALUE'])?>);"></div>
                                    <div class="title"><?=$arFields['NAME']?></div>
                                </div>
                            </a>
                        <?}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>