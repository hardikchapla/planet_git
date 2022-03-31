<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
    error_reporting(0);
    function sendOrderStatusChange($email, $status, $invoice_no){
        $messageBody = '<html>
                            <body>
                                <div style="background:#f2f2f2;margin:0 auto;max-width:640px;padding:0 20px">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="text-align: center;background-color: #2196F3;color: #Fff;font-family:"Open Sans", sans-serif;font-size:13px; padding: 1px;margin-top: 10px;border-radius:10px 10px 0 0;">
                                                    <h2>Your Order Status</h2>
                                                </div>
                                                <div style="background:#fff;color:#5b5b5b;font-family:"Open Sans", sans-serif;font-size:13px;padding:10px 20px;margin:20px auto;line-height:17px;   border:1px #ddd solid;border-top:0;clear:both;margin-top: 0;border-radius: 0 0 10px 10px;">

                                                    <p>Dear User,</p>
                                                    <p>Your Invoice no is : '.$invoice_no.' </p>
                                                    <p>Your order status is : <strong>'.$status.'</strong></p>
                                                </div>                                                    
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </body>
                        </html>';
        include("../../inc/libraries/PHPMailer/PHPMailerAutoload.php");
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = MAIL_HOST;
        $mail->SMTPAuth = 'true';
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;
        $mail->FromName = MAIL_FROM_NAME;
        $mail->From = MAIL_FROM;
        $mail->SMTPSecure = MAIL_SMTP_SECURE;
        $mail->Port = MAIL_SMTP_PORT;
        $mail->SMTPDebug  = '0';
        $mail->addAddress($email);
        $mail->isHTML('true');
        $mail->Subject = PASSWORD_RECOVERY;
        $mail->Body = $messageBody;
        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );
        $mail->send();
        if (!empty($mail)):
            return TRUE;
        endif;
    }
    $order_id = $_REQUEST['order_id'];
    $status = $_REQUEST['status'];
    $order = $db->query("SELECT a.invoice_no , b.* FROM phtv_product_order a, phtv_users b WHERE a.user_id = b.id AND a.id = '$order_id'");
    $feorder = $order->fetch(PDO::FETCH_ASSOC);
    if($status == 0){
        $order_status = 'Pending';
    } elseif ($status == 1) {
        $order_status = 'Confirm';
        $order_date_field = 'confirm_date';
    } elseif ($status == 2) {
        $order_status = 'Shipped';
        $order_date_field = 'shipped_date';
    } elseif ($status == 3) {
        $order_status = 'Delivered';
        $order_date_field = 'delivered_date';
    } elseif ($status == 5) {
        $order_status = 'Cancelled';
        $order_date_field = 'cancelled_date';
    } elseif ($status == 6) {
        $order_status = 'Out For Delivery';
        $order_date_field = 'out_for_delivery_date';
    } else {
        $order_status = 'Completed';
        $order_date_field = 'completed_date';
    }
    $email = $feorder['email'];
    $invoice_no = $feorder['invoice_no'];
    $today = date('Y-m-d H:i:s');
    $update = $db->query("UPDATE phtv_product_order SET status = '$status',".$order_date_field." = '$today'  WHERE id = '$order_id'");	
    $send = sendOrderStatusChange($email, $order_status, $invoice_no);
    if($update && $send){
        $success['success'] = "success";
        $success['message'] = "Order status changed successfully";
    }else{
        $success['success'] = "fail";
        $success['message'] = "Order status has been not change";
    }
    echo json_encode($success);

?>