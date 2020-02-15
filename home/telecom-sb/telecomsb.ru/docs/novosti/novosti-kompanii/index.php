<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Предлагаем вам ознакомиться с новостями в области систем безопасности, включая видеонаблюдение");
$APPLICATION->SetPageProperty("keywords", "новости, системы безопасности, телеком сб, urmet, hikvision, microdigital, линия, девлайн, тепловодохран, пульсар");
$APPLICATION->SetPageProperty("title", "Новости компании Телеком СБ");
$APPLICATION->SetTitle("Новости компании Телеком СБ");

CModule::IncludeModule('iblock');

$arPage = explode('/', $APPLICATION->GetCurPage());
?>
<div class="col-lg-10">
	<div class="row item-block">
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb", 
			"catalog", 
			array(
				"START_FROM" => "0",
				"PATH" => "",
				"SITE_ID" => SITE_ID,
				"COMPONENT_TEMPLATE" => "catalog"
			),
			false
		);?>
		<h1 class="item-title font-medium"><?=$APPLICATION->ShowTitle(false); ?></h1>
		<div>
		
			<? if(count($arPage) == 4 && strlen($arPage[3])): 
				$code = explode('.', $arPage[3]); ?>
				<?$ElementID = $APPLICATION->IncludeComponent(
					"bitrix:news.detail",
					"",
					Array(
						"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
						"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
						"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
						"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
						//"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => 1,
						"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
						"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
						"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
						"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"META_KEYWORDS" => $arParams["META_KEYWORDS"],
						"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
						"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
						"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
						"SET_TITLE" => $arParams["SET_TITLE"],
						"SET_STATUS_404" => $arParams["SET_STATUS_404"],
						"INCLUDE_IBLOCK_INTO_CHAIN" => 'N',
						"ADD_SECTIONS_CHAIN" => 'N',
						"ADD_ELEMENT_CHAIN" => "Y",
						"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
						"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
						"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
						"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
						"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
						"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
						"CHECK_DATES" => $arParams["CHECK_DATES"],
						//"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
						"ELEMENT_CODE" => $code[0],
						"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
						"USE_SHARE" 			=> $arParams["USE_SHARE"],
						"SHARE_HIDE" 			=> $arParams["SHARE_HIDE"],
						"SHARE_TEMPLATE" 		=> $arParams["SHARE_TEMPLATE"],
						"SHARE_HANDLERS" 		=> $arParams["SHARE_HANDLERS"],
						"SHARE_SHORTEN_URL_LOGIN"	=> $arParams["SHARE_SHORTEN_URL_LOGIN"],
						"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					),
					$component
				);?>
			<? else: ?>					
				<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right">
					<div class="row catalog-block">
						<? $ids = $dates = array();

						if($_REQUEST['date']){
							$arFilterDate = explode(',', $_REQUEST['date']);
							if(count($arFilterDate) == 1){
								$date_filter = array(
									'LOGIC' => 'OR',
									array('>=DATE_ACTIVE_FROM' => '01.01.' . $arFilterDate[0], '<=DATE_ACTIVE_FROM' => '31.12.' . $arFilterDate[0])
								);
							} else {
								$date_filter = array('LOGIC' => 'OR');
								foreach($arFilterDate as $cur_date)
									$date_filter[] = array('>=DATE_ACTIVE_FROM' => '01.01.' . $cur_date, '<=DATE_ACTIVE_FROM' => '31.12.' . $cur_date);
								
							}
						}

						$globalFilter = array('IBLOCK_ID' => 1, 'ACTIVE' => 'Y');
						$obj = CIBlockElement::GetList(array(), $globalFilter, false, array('nPageSize' => 1000), array('ID', 'ACTIVE_FROM'));
						while($el = $obj->GetNext()){
							$part1 = explode('.', $el['ACTIVE_FROM']);
							$part2 = explode(' ', $part1[2]);
							$dates[] = $part2[0];
						}
						$dates = array_unique($dates);
						sort($dates);
						if(!empty($dates)): ?>
							<div class="filter">
								<div class="filter-item">
									<div class="filter-title">Показать новости</div>
									<ul class="checkbox-list">
										<li>
											<input type="checkbox" class="checkbox" id="check1" name="var1"<?=!$_REQUEST['date'] ? ' checked' : ''; ?>>
											<label for="check1" onclick='window.location.href="<?=$APPLICATION->GetCurPage(); ?>";'>за все время</label>
										</li>
										<? 
										foreach($dates as $year):
											$date_param = false;
											$tmpArFilterDate = $arFilterDate;
											if(in_array($year, $arFilterDate)){
												if(count($arFilterDate) > 1){
													unset($tmpArFilterDate[array_search($year, $tmpArFilterDate)]);
													$date_param = implode(',', $tmpArFilterDate);
												}
											} else {
												$date_param = $_REQUEST['date'] ? ($_REQUEST['date'] . ',' . $year) : $year;
											}
											
											if($date_param)
												$link = $APPLICATION->GetCurPageParam('date=' . $date_param, array('date'));
										?>
											<li>
												<input type="checkbox" class="checkbox" id="tabone_<?=$year; ?>"<?=in_array($year, $arFilterDate) ? ' checked' : ''; ?>>
												<label for="tabone_<?=$year; ?>" onclick='window.location.href="<?=$link; ?>";'><?=$year; ?></label>
											</li>
										<? endforeach; ?>
									<li>
									<a href="/novosti/novosti-kompanii/rss/" title="RSS лента новостей" class="rss-news-link">
									<i class="fa fa-rss" aria-hidden="true"></i><span> RSS лента</span>
									</a>
									</li>
									</ul>
								</div>
							</div>
						<? endif; ?>
					</div>
				</div>
				
				<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12 pull-left">
					<div class="row catalog-block">
						<div class="news">
							<?						
							if($date_filter)
								$globalFilter[] = $date_filter;
							
							$obj = CIBlockElement::GetList(array('ACTIVE_FROM' => 'desc'), $globalFilter, false, array('nPageSize' => 1000), array('ID', 'ACTIVE_FROM'));
							while($el = $obj->GetNext())
								$ids[] = $el['ID'];
							
							
							global $news_filter1;
							$news_filter1 = array('ID' => $ids);
							?>
							<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"section_list", 
	array(
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "",
		"SORT_ORDER2" => "",
		"FILTER_NAME" => "news_filter1",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => "catalog_news",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"COMPONENT_TEMPLATE" => "section_list",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_LAST_MODIFIED" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => $_REQUEST["ID"],
		"NEWS_COUNT" => "20",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
						</div>
					</div>
				</div>
			<? endif; ?>
		</div>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>