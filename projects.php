<?php
require_once 'includes/cons.php';
require_once 'includes/db.php';
require_once 'includes/page.php';
require_once 'includes/pdf_page.php';
require_once 'includes/project/select.php';
require_once 'includes/project/insert.php';
session_start();
checkUserLoggedIn();

$page = "projects";
$page_title = "Project";
$profile = array();
$profile["page-title"] = $page_title;
$profile["page"] = $page;
$profile["view"] = "main";
$profile["add-new-form"] = '
    <!-- add new project -->
    <div class="row justify-content-center">
    <div class="col-md-8 order-md-1">
        <form method="post" action="projects.php">
            <h4 class="mb-3">Project Details</h4>
            '.row_with_single_col("Execution Date *", null, '').'
            '.row_with_two_cols("Type of Service *","Building Type *", null, null, '', '').'
            '.row_with_two_cols("Number of Rooms *","Floor *", null, null, '', '').'
            '.row_with_two_cols("Square meters *","is elevator *", null, null, '', '').'
            <h4 class="mb-3">Customer Details</h4>
            '.row_with_two_cols("First Name *","Last Name *", null, null, '', '').'
            '.row_with_single_col("Address *", null, '').'
            '.row_with_two_cols("Ort *","Pin Code *", null, null, '', '').'
            '.row_with_two_cols("Mobile *","Email", null, null, '', '').'
            <button type="submit" name="add-new-project-form" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
    <!-- add new project end -->
    ';
$profile["edit-form"] = 'edit box';
$profile["remove-form"] = 'Remove box';
$profile["add-modal-id"] = 'add_new_modal';
$profile["edit-modal-id"] = 'edit_modal';
$profile["edit-modal-body"] = 'edit_body';
$profile["pay-modal-id"] = 'pay_modal';
$profile["pay-modal-body"] = 'pay_body';
$profile["remove-modal-id"] = 'remove_modal';
$profile["remove-modal-body"] = 'remove_body';
$profile["view-single-buttons"] = '<button type="button" class="btn btn-success btn-sm" name="add_new" data-toggle="modal"
                            data-target="#add_new_modal">
                            Add New
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" name="edit" id="edit_button"
                            data-toggle="modal" data-target="#edit_modal">Edit</button>
                        <button type="button" class="btn btn-dark btn-sm" name="pay" id="pay_button" data-toggle="modal"
                            data-target="#pay_modal">Pay</button>
                        <button type="button" class="btn btn-danger btn-sm" name="remove" id="remove_button"
                            data-toggle="modal" data-target="#remove_modal">Remove</button>
                        <button type="button" class="btn btn-primary btn-sm" name="export"
                            id="export_button">Export</button>
                        <button type="button" class="btn btn-warning btn-sm" name="invoice"
                            id="invoice_button">Invoice</button>
                        <button type="button" class="btn btn-info btn-sm" name="reports">Reports</button>';
if (isset($_POST["add-new-project-form"])){
    insert_project($_POST);
    header('Location: '.$page.'.php');
}elseif (isset($_GET["export_id"])){
    require_once __DIR__ . '/vendor/autoload.php';
    export($_GET["export_id"]);
}elseif (isset($_GET["invoice_id"])){
    require_once __DIR__ . '/vendor/autoload.php';
    invoice($_GET["invoice_id"]);
}elseif (isset($_GET["edit_id"])){
    echo get_edit_form($_GET["edit_id"]);
}elseif (isset($_GET["pay_id"])){
    echo get_pay_form($_GET["pay_id"]);
}elseif (isset($_GET["remove_id"])){
    echo get_remove_form($_GET["remove_id"]);
}
elseif (isset($_POST["update-project-form"])){
    update_project($_POST);
    header('Location: '.$page.'.php');
}
elseif (isset($_POST["pay-project-form"])){
    pay_project($_POST);
    header('Location: '.$page.'.php');
}
elseif (isset($_POST["remove-project-form"])){
    remove_project($_POST);
    header('Location: '.$page.'.php');
}elseif (isset($_GET["cid"])){
    $profile["content"] = get_single_project($_GET["cid"]);
    $profile["view"] = "single";
    echo get_doc($profile);
}
else{
    $profile["content"] = get_main_table(null);
    echo get_doc($profile);
}
?>