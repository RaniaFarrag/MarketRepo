<?php
if (!empty($_GET)) {
    $page = $_GET['page'];
} else {
    $page = 'index_en';
}
switch ($page) {



    case 'index_en':
        $main_content = 'index_en';
        include 'layouten.php';
        break;

        case 'addcompanyData_en':
        $main_content = 'addcompanyData_en';
        include 'layouten.php';
        break;
        case 'companyData_en':
        $main_content = 'companyData_en';
        include 'layouten.php';
        break;
        case 'report_en':
        $main_content = 'report_en';
        include 'layouten.php';
        break;





}
?>