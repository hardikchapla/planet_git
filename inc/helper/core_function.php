<?php
    // Admin Forgot Password Mail
    function forgotPassword($admin_forgot_email,$Password){
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
                                                    <h2>Password Recovery</h2>
                                                </div>
                                                <div style="background:#fff;color:#5b5b5b;font-family:"Open Sans", sans-serif;font-size:13px;padding:10px 20px;margin:20px auto;line-height:17px;   border:1px #ddd solid;border-top:0;clear:both;margin-top: 0;border-radius: 0 0 10px 10px;">

                                                    <p>Dear User,</p>
                                                    <p>Please use the following security password for the ' . $admin_forgot_email . ' account</p>
                                                    <p>Your Password: <strong><a href="'.RESET_LINK.'?Email='.base64_encode($admin_forgot_email).'&Password='.$Password.'">Click here for Set Your reset password</a></strong></p>
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
        $mail->addAddress($admin_forgot_email);
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
    // Forgot password for user
    function forgotPasswordUser($email,$Password){
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
                                                    <h2>Password Recovery</h2>
                                                </div>
                                                <div style="background:#fff;color:#5b5b5b;font-family:"Open Sans", sans-serif;font-size:13px;padding:10px 20px;margin:20px auto;line-height:17px;   border:1px #ddd solid;border-top:0;clear:both;margin-top: 0;border-radius: 0 0 10px 10px;">

                                                    <p>Dear User,</p>
                                                    <p>Please use the following security password for the ' . $email . ' account</p>
                                                    <p>Your Password: <strong><a href="'.RESET_LINK_USER.'?Email='.base64_encode($email).'&Password='.$Password.'">Click here for Set Your reset password</a></strong></p>
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
        include("../inc/libraries/PHPMailer/PHPMailerAutoload.php");
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
    // Activation link send for user
    function signUpActivationLink($email,$user_id){
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
                                                    <h2>Email Activation</h2>
                                                </div>
                                                <div style="background:#fff;color:#5b5b5b;font-family:"Open Sans", sans-serif;font-size:13px;padding:10px 20px;margin:20px auto;line-height:17px;   border:1px #ddd solid;border-top:0;clear:both;margin-top: 0;border-radius: 0 0 10px 10px;">

                                                    <p>Dear User,</p>
                                                    <p>Please use the following security password for the ' . $email . ' account</p>
                                                    <p>Your Password: <strong><a href="'.ACTIVATION_LINK.'?Email='.base64_encode($email).'&key='.base64_encode($user_id).'">Click here for activate your account</a></strong></p>
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
        include("../inc/libraries/PHPMailer/PHPMailerAutoload.php");
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

?>