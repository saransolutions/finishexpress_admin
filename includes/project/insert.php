<?php 

function insert_project($data){

	$type_of_service = $data["type_of_service"];
	$building_type = $data["building_type"];
	$floor = $data["floor"];
    $number_of_rooms = $data["number_of_rooms"];
	$square_meters = $data["square_meters"];
	$is_elevator = $data["is_elevator"];
    $execution_date = $data["execution_date"];

    $first_name = $data["first_name"];
    $last_name = $data["last_name"];
    $address = $data["address"];
    $ort = $data["ort"];
    $pin_code = $data["pin_code"];
    $mobile = $data["mobile"];
    $email = $data["email"];
    
    $sql="INSERT INTO ".DB_NAME.".projects(id, created_date, type_of_service, building_type, floor, number_of_rooms, square_meters, is_elevator, first_name, last_name, address, ort, pin_code, mobile, email, execution_date) VALUES (Null, CURRENT_TIMESTAMP, '".$type_of_service."','".$building_type."','".$floor."','".$number_of_rooms."','".$square_meters."','".$is_elevator."','".$first_name."','".$last_name."','".$address."','".$ort."','".$pin_code."','".$mobile."','".$email."', '".$execution_date."')";
    executeSQL($sql);
    return getSingleValue("select max(id) from ".DB_NAME.".customers");
}

function update_project($data){
    $update_project_id = $data["update_project_id"];
    $first_name = $data["first_name"];
    $last_name = $data["last_name"];
    $address = $data["address"];
    $ort = $data["ort"];
    $pin_code = $data["pin_code"];
    $mobile = $data["mobile"];
    $email = $data["email"];

    $company_name = $data["company_name"];
    $service_type = $data["service_type"];
    $product_type = $data["product_type"];
    $website_name = $data["website_name"];
    $supported_language = $data["supported_language"];
    $total_pages = $data["total_pages"];

    $media_support = $data["media_support"];
    $domain_hosting = $data["domain_hosting"];
    $mail_support = $data["mail_support"];
    $mail_advertisement = $data["mail_advertisement"];
    $user_feedback = $data["user_feedback"];
    $seo_support = $data["seo_support"];

    $google_business_support = $data["google_business_support"];
    $cookies_support = $data["cookies_support"];
    $google_check_activation = $data["google_check_activation"];
    $advance_paid = $data["advance_paid"];

    $advance_amount = $data["advance_amount"];
    $total_price = $data["total_price"];
    $balance = $data["balance"];
    $delivery_date = $data["delivery_date"];
    $warranty_period = $data["warranty_period"];
    #$logo = $data["logo"];
    

    $sql="UPDATE ".DB_NAME.".projects SET
        first_name='".$first_name."',
        last_name='".$last_name."',
        address='".$address."',
        ort='".$ort."',
        pin_code='".$pin_code."',
        mobile='".$mobile."',
        email='".$email."',
        company_name='".$company_name."',
        service_type='".$service_type."',
        product_type='".$product_type."',
        website_name='".$website_name."',
        supported_language='".$supported_language."',
        total_pages='".$total_pages."',
        media_support='".$media_support."',
        domain_hosting='".$domain_hosting."',
        mail_support='".$mail_support."',
        mail_advertisement='".$mail_advertisement."',
        user_feedback='".$user_feedback."',
        seo_support='".$seo_support."',
        google_business_support='".$google_business_support."',
        cookies_support='".$cookies_support."',
        google_check_activation='".$google_check_activation."',
        advance_paid='".$advance_paid."',
        advance_amount='".$advance_amount."',
        total_price='".$total_price."',
        balance='".$balance."',
        delivery_date='".$delivery_date."',
        warranty_period='".$warranty_period."',
        logo=NULL WHERE id = ".$update_project_id;
        executeSQL($sql);
        return $update_project_id;
}

function pay_project($data){
    $pay_customer_id = $data["pay_customer_id"];
    
    $advance_paid = $data["advance_paid"];

    $advance_amount = $data["advance_amount"];
    $total_price = $data["total_price"];
    $balance = $data["balance"];
    
    $sql="UPDATE ".DB_NAME.".projects SET
    
        advance_paid='".$advance_paid."',
        advance_amount='".$advance_amount."',
        total_price='".$total_price."',
        balance='".$balance."' WHERE id = ".$pay_customer_id;
        executeSQL($sql);
        return $pay_customer_id;
}

function remove_project($data){
    $remove_customer_id = $data["remove_customer_id"];
    $sql="DELETE FROM ".DB_NAME.".projects WHERE id = ".$remove_customer_id;
    executeSQL($sql);
}

?>