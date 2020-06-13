<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
global $USER;
$user = $USER->GetEmail();
$id_user = $USER->GetID();
echo $user;
echo "<br>";
echo $id_user;
echo "<br>";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://CodeStudio:zaq12WSX@79.135.228.210:8081/ka2/hs/Api/v1/ClientSum?ClientID=$user");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
$output = (int) curl_exec($ch);
curl_close($ch);
echo $output;
echo "<br>";
if($output > "10000" && $output < "20000" ){
    $group = 22;
}elseif($output > "20000" && $output < "30000"){
    $group = 23;
}elseif($output > "30000" && $output < "40000" ){
    $group = 24;
}elseif($output > "40000" && $output < "60000" ){
    $group = 25;
}elseif($output > "60000" ){
    $group = 21;
}
echo $group;
echo "<br>";
// Проверка привязка пользователя к группе $group
if (!in_array($group,$USER->GetUserGroupArray()) && $group > 0){
    // привязка пользователя $id_user к группе $group
    $arGroups = CUser::GetUserGroup($id_user);
    $arGroups[] = $group;
    CUser::SetUserGroup($id_user, $arGroups);
    $f = fopen($_SERVER["DOCUMENT_ROOT"].'/logs/user_group.log','a');
    fwrite($f, date('d.m.Y H:i:s')." Пользователю ".$id_user." присвоена группа ".$group."\n");
    fclose($f);
}
?>