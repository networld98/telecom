<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/*
function code_replace_func($matches)
{
	return preg_replace("/\n/is","",'
		<table cellpadding="0" cellspacing="0" class="data-table">
			<tr>
				<td>'.htmlspecialcharsbx($matches[3]).'</td>
			</tr>
		</table>
	');
}
*/

global $APPLICATION, $USER;
foreach($arResult['ITEMS'] as $key=>$val)
{
/*
	$arResult['ITEMS'][$key]["DETAIL_TEXT"] = preg_replace_callback("/(<|\[)CODE(>|\])(.+?)(<|\[)\/CODE(>|\])/is",code_replace_func,$arResult['ITEMS'][$key]["DETAIL_TEXT"]);
*/

	if(strtoupper($arResult['ITEMS'][$key]["PREVIEW_TEXT_TYPE"]) == "TEXT")
		$arResult['ITEMS'][$key]["PREVIEW_TEXT"] = nl2br($arResult['ITEMS'][$key]["PREVIEW_TEXT"]);
	if(strtoupper($arResult['ITEMS'][$key]["DETAIL_TEXT_TYPE"]) == "TEXT")
		$arResult['ITEMS'][$key]["DETAIL_TEXT"] = nl2br($arResult['ITEMS'][$key]["DETAIL_TEXT"]);
	
	//create button
	if($USER->IsAuthorized())
	{
		if($APPLICATION->GetShowIncludeAreas())
		{

			$ar = CIBlock::ShowPanel($arParams['IBLOCK_ID'], $val['ID'], 0, $arParams["IBLOCK_TYPE"], true);
			if(is_array($ar))
			{
				foreach($ar as $arButton)
				{
					if(preg_match("/[^A-Z0-9_]ID=\d+/", $arButton["URL"]))
					{
						$arButton["URL"] = preg_replace("/&return_url=(.+?)&/", "&", $arButton["URL"]);
						$arResult['ITEMS'][$key]['EDIT_BUTTON'] = '<a href="'.htmlspecialcharsbx($arButton["URL"]).'" title="'.htmlspecialcharsbx($arButton["TITLE"]).'"><img src="'.$arButton["IMAGE"].'" width="20" height="20" border="0" /></a>';
					}
				}
			}
		}
	}
}


foreach($arResult['ITEMS'] as $key=>$val) {

    $arSelect = Array("ID", "NAME", "PROPERTY_TREB", "PROPERTY_OB", "PROPERTY_USL");
    $arFilter = Array("ID"=>$val["ID"], "IBLOCK_ID"=>"34", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while($ob = $res->GetNextElement())
    {
     $arFields = $ob->GetFields();
     //echo "<pre>"; print_r($arFields); echo "</pre>";
     $arResult["ITEMS"][$key]["TREB"] = $arFields["PROPERTY_TREB_VALUE"];
     $arResult["ITEMS"][$key]["OB"] = $arFields["PROPERTY_OB_VALUE"];
     $arResult["ITEMS"][$key]["USL"] = $arFields["PROPERTY_USL_VALUE"];
    }

    
}




?>