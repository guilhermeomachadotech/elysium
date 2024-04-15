<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $msg=$_POST['msg'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->CharSet='UTF-8';
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.elasticemail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'robertodelimasouza583@gmail.com';
        $mail->Password   = 'D669687153BADE544EB9B21258BD34CD7F02';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('robertodelimasouza583@gmail.com', 'Suporte Técnico Elysium');
        $mail->addAddress('robertodelimasouza583@gmail.com', 'Admin Elysium');     //Add a recipient
        $mail->addReplyTo($email, $nome);
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Mensagem de Usuário';
        $mail->AddEmbeddedImage('../img/logo-nome.png','logo_ref');
        $body="<img src='cid:logo_ref'><br>
                <h1>Mensagem de Usuário</h1><br>
                Nome: ".$nome."<br>".
                "Email: ".$email."<br>".
                "Mensagem: ".$msg;
        $mail->Body    =  $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        
    } catch (Exception $e) {
        echo "Erro no envio da mensagem. Mailer Error: {$mail->ErrorInfo}";
    }
    
    die();
?>