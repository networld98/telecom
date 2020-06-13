<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "hikvision, urmet, тепловодохран, microdigital, линия");
$APPLICATION->SetPageProperty("description", "Microdigital, Hikvision, Urmet, Тепловодохран, Линия по низким ценам с гарантией от официального дилера");
$APPLICATION->SetPageProperty("title", "Камеры видеонаблюдения, домофоны, видеорегистраторы");
$APPLICATION->SetTitle("Камеры видеонаблюдения, домофоны, видеорегистраторы");
?>

<div class="col-lg-10 col-md-9 col-sm-8">
	<div class="row item-block">
		<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"slider", 
	array(
		"IBLOCK_TYPE" => "service",
		"IBLOCK_ID" => "23",
		"SECTION_ID" => "130",
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"ELEMENT_SORT_FIELD" => "",
		"ELEMENT_SORT_ORDER" => "",
		"ELEMENT_SORT_FIELD2" => "",
		"ELEMENT_SORT_ORDER2" => "",
		"FILTER_NAME" => "arrFilter",
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "N",
		"HIDE_NOT_AVAILABLE" => "N",
		"PAGE_ELEMENT_COUNT" => "10",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(
			0 => "LINK",
			1 => "",
		),
		"OFFERS_LIMIT" => "6",
		"TEMPLATE_THEME" => "",
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"BROWSER_TITLE" => "-",
		"SET_META_KEYWORDS" => "N",
		"META_KEYWORDS" => "",
		"SET_META_DESCRIPTION" => "Y",
		"META_DESCRIPTION" => "",
		"ADD_SECTIONS_CHAIN" => "N",
		"DISPLAY_COMPARE" => "N",
		"SET_STATUS_404" => "N",
		"CACHE_FILTER" => "N",
		"PRICE_CODE" => array(
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"PAGER_TEMPLATE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"COMPONENT_TEMPLATE" => "slider",
		"BACKGROUND_IMAGE" => "-",
		"SEF_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "undefined",
		"SET_LAST_MODIFIED" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"PRODUCT_QUANTITY_VARIABLE" => "undefined",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N"
	),
	false
);?>
		<!-- main slider -->
		<? CModule::IncludeModule('iblock');
		$obj = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 64, 'ACTIVE' => 'Y', 'ID' => 5841), false, array(), array('IBLOCK_ID', 'ID', 'NAME'));
		while($block = $obj->GetNextElement()): 
			$elem = $block->GetFields();
			$goods_prop = $block->GetProperties(false, array('CODE' => 'GOODS'));
			
			$gobj = CIBlockElement::GetList(array(), array('=ID' => $goods_prop['GOODS']['VALUE'], 'ACTIVE' => 'Y'), false, array(), array());
			if($gobj->SelectedRowsCount()): ?>			
				<div class="product">
					<h1 class="item-title">Интернет-магазин оборудования для систем безопасности</h1>
					<div class="product-wrapp clearfix">
						<? while($item = $gobj->GetNext()) {
                            $arSelect = Array("CATALOG_QUANTITY","ID","PREVIEW_PICTURE","DETAIL_PAGE_URL","NAME","PREVIEW_TEXT", "CATALOG_PRICE_1");
                            $arFilter = Array("IBLOCK_ID" => $item['IBLOCK_ID'], "ID" => $item['ID'], "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
                            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
                            while ($ob = $res->GetNextElement()) {
                                $item = $ob->GetFields();
                                $props = $ob->GetProperties();
                                    $arPrice = CCatalogProduct::GetOptimalPrice($item['ID'], 1, $USER->GetUserGroupArray(), 'N');
                                    if (!$arPrice || count($arPrice) <= 0)
                                    {
                                        if ($nearestQuantity = CCatalogProduct::GetNearestQuantityPrice($productID, $quantity, $USER->GetUserGroupArray()))
                                        {
                                            $quantity = $nearestQuantity;
                                            $arPrice = CCatalogProduct::GetOptimalPrice($productID, $quantity, $USER->GetUserGroupArray(), $renewal);
                                        }
                                    }
                                ?>
                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="row product-block">
                                        <div class="product-item">
                                            <div class="product-visible">
                                                <div class="product-img">
                                                    <div class="table-block">
                                                        <div class="block-vertical">
                                                            <a href="<?= $item['DETAIL_PAGE_URL']; ?>">
                                                                <img src="<?= CFile::GetPath($item['PREVIEW_PICTURE']); ?>"
                                                                     alt="<?= $item['NAME']; ?>">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-descr">
                                                    <div class="product-name">
                                                        <div class="table-block">
                                                            <div class="block-bottom"><?= $item['NAME']; ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <?= $item['PREVIEW_TEXT']; ?>
                                                    </div>
                                                    <div class="product-v_price">
                                                        <div class="product-v_cost">
                                                            <div class="product-price">
                                                                <?=CurrencyFormatNumber($arPrice['DISCOUNT_PRICE'], 'RUB');?> <i class="fa fa-rub" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <?if ($arPrice['DISCOUNT']['VALUE']!=0):?>
                                                            <div class="product-v_sale">
                                                                <span class="product-v_sale_old"><?=CurrencyFormatNumber($arPrice['RESULT_PRICE']['BASE_PRICE'], 'RUB');?></span>
                                                                <span class="product-v_sale_persent">-<?=$arPrice['DISCOUNT']['VALUE']?>%</span>
                                                            </div>
                                                        <?endif;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-hidden clearfix">
                                                <div class="hidden-price">
                                                    <div class="product-v_price">
                                                        <div class="product-v_cost">
                                                            <div class="product-price">
                                                                <?=CurrencyFormatNumber($arPrice['DISCOUNT_PRICE'], 'RUB');?> <i class="fa fa-rub" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <?if ($arPrice['DISCOUNT']['VALUE']!=0):?>
                                                            <div class="product-v_sale">
                                                                <span class="product-v_sale_old"><?=CurrencyFormatNumber($arPrice['RESULT_PRICE']['BASE_PRICE'], 'RUB');?></span>
                                                                <span class="product-v_sale_persent">-<?=$arPrice['DISCOUNT']['VALUE']?>%</span>
                                                            </div>
                                                        <?endif;?>
                                                    </div>
                                                </div>
                                                <div class="product-status">
                                                    <?
                                                    if ($props['ARKHIV']['VALUE'] != 1) {
                                                        ?>
                                                        <?
                                                        foreach ($item['ITEMS_ID'] as $complect) {
                                                            $completQuantity[] = $complect['PRODUCT']['QUANTITY'];
                                                        }
                                                        if ($item['CATALOG_QUANTITY'] > 0) { ?>
                                                            <div class="available product-status-sklad">В наличии</div>
                                                            <p>Остаток: <?= $item['CATALOG_QUANTITY'] ?></p>
                                                        <? } elseif (min($completQuantity) > 0) { ?>
                                                            <div class="available product-status-sklad">В наличии</div>
                                                            <p>Остаток: <?= min($completQuantity) ?></p>
                                                        <? } else {
                                                            ?>
                                                            <div class="product-status-arkhiv">Под заказ</div>
                                                            <p>Срок поставки:
                                                                <? if ($props["SROK_POSTAVKI_OT"]["VALUE"] != NULL && $props["SROK_POSTAVKI_DO"]["VALUE"] != NULL && $props["SROK_POSTAVKI_OT"]["VALUE"] != $arResult["PROPERTIES"]["SROK_POSTAVKI_DO"]["VALUE"]) {
                                                                    ?>
                                                                    <?= $props["SROK_POSTAVKI_OT"]["VALUE"] ?>-<?= $props["SROK_POSTAVKI_DO"]["VALUE"] ?> дней
                                                                <? } elseif ($props["SROK_POSTAVKI_OT"]["VALUE"] != NULL && $props["SROK_POSTAVKI_OT"]["VALUE"] == $props["SROK_POSTAVKI_DO"]["VALUE"]) {
                                                                    ?>
                                                                    <?= $props["SROK_POSTAVKI_OT"]["VALUE"] ?> дней
                                                                <? } elseif (($props["SROK_POSTAVKI_OT"]["VALUE"] != NULL && $props["SROK_POSTAVKI_DO"]["VALUE"] == NULL) || ($props["SROK_POSTAVKI_OT"]["VALUE"] == NULL && $arResult["PROPERTIES"]["SROK_POSTAVKI_DO"]["VALUE"] != NULL)) {
                                                                    ?>
                                                                    <?= $props["SROK_POSTAVKI_OT"]["VALUE"] ?><?= $props["SROK_POSTAVKI_DO"]["VALUE"] ?> дней
                                                                <? } elseif ($props["SROK_POSTAVKI_OT"]["VALUE"] == NULL && $props["SROK_POSTAVKI_DO"]["VALUE"] == NULL) {
                                                                    ?>
                                                                    по запросу
                                                                <? } ?>
                                                            </p>
                                                        <? } ?>
                                                    <? } else { ?>
                                                        <div class="product-status-arkhiv">
                                                            Архивная позиция
                                                        </div>
                                                    <?
                                                    }; ?>
                                                </div>
                                                <a href="#" onclick='return add2basket(<?= $item['ID']; ?>);'
                                                   class="add-basket">В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?
                            }
                        }?>
					</div>
				</div>
			<? endif; ?>
		<? endwhile; ?>
		
		<div class="info clearfix">
			<div class="col-md-6">
				<div class="row info-block">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => "/include/main_page_payment.php"
						)
					);?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row info-block">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => "/include/main_page_delivery.php"
						)
					);?>
				</div>
			</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>