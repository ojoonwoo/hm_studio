<?php
include_once "./include/autoload.php";

switch ($_REQUEST['exec'])
{
    case "insert_click_info" :
        $mnv_f          = new mnv_function();
        $my_db          = $mnv_f->Connect_MySQL();
        $gubun          = $mnv_f->MobileCheck();

        $click_name 	= $_REQUEST['click_name'];

        $click_query	= "INSERT INTO click_info(click_name, click_refferer, click_ipaddr, click_source, click_medium, click_campaign, click_content, click_gubun, click_date) values ('".$click_name."','".$_SERVER['HTTP_REFERER']."','".$_SERVER['REMOTE_ADDR']."','".$_SESSION['ss_utm_source']."','".$_SESSION['ss_utm_medium']."','".$_SESSION['ss_utm_campaign']."','".$_SESSION['ss_utm_content']."','".$gubun."','".date("Y-m-d H:i:s")."')";
        $result			= mysqli_query($my_db, $click_query);

    break;
}
?>
