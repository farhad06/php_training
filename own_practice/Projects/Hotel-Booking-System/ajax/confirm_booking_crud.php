<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essential.php');

date_default_timezone_set('Asia/Kolkata');

if(isset($_POST['checkAvilability'])){
    $form_data=filteration($_POST);

    $status="";
    $result="";

    $today_date = new DateTime(date('Y-m-d'));
    $checkin_date = new DateTime($form_data['check_in']);
    $checkout_date = new DateTime($form_data['check_out']);

    if($checkin_date==$checkout_date){
        $status='check_in_out_equal';
        $result=json_encode(['status'=>$status]);
    }else if($checkout_date<$checkin_date){
        $status='check_out_earliar';
        $result = json_encode(['status' => $status]);
    }else if($checkin_date<$today_date){
        $status = 'check_in_earliar';
        $result = json_encode(['status' => $status]);
    }

    //check room avilable or not

    if($status!=''){
        echo $result;
    }else{
        session_start();
        $_SESSION['ROOM'];

        $count_days=date_diff($checkin_date,$checkout_date)->days;
        $payment=$_SESSION['ROOM']['price']*$count_days;
        
        $_SESSION['ROOM']['payment']=$payment;
        $_SESSION['ROOM']['avilable'] = true;

        $result=json_encode(['status'=> 'avilable','days'=>$count_days,'payment'=>$payment]);
        echo $result;


    }



}






?>