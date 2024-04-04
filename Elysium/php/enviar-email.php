<?php
    $nome=addslashes($_POST['nome']);
    $email=addcslashes($_POST['email']);
    $msg=addcslashes($_POST['msg']);

    $destinatario = 'machado.gui.oliveira@gmail.com';
    $assunto = 'Mesagem de usuário | Elysium';

    $corpoEmail = "Nome: ".$nome."\n"."Email: ".$email."\n"."Mensagem: ".$msg;

    $cabecalhoEmail = "From: elysium.company@gmail.com"."\n"."Reply-to: ".$email."\n"."X=Mailer:PHP/".phpversion();

    if (mail($destinatario, $assunto, $corpoEmail, $cabecalhoEmail)) {
        echo("email enviado com sucesso");
    }else{
        echo("email não foi enviado com sucesso");
    }
?>