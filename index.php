<?php
    ini_set('display_erros', 'On');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once __DIR__ . '/vendor/autoload.php';

    $mail = new PHPMailer(true);

    try{
        //メールサーバー設定
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->SMTPDebug = 2;

        //SMTPの使用
        $mail->isSMTP();

        //SMTPサーバの設定
        $mail->Host = 'smtp.gmail.com';
        
        //SMTP認証
        $mail->SMTPAuth = true;

        //SMTPユーザ
        $mail->Username = 'hoge@gmail.com';

        //SMTPパスワード
        $mail->Password = 'app_pass';

        //ポート設定
        $mail->Port = 587;
        // echo '<pre>';var_dump($mail);echo '</pre>';exit;
        //送信アドレス
        $mail->setFrom('hoge@gmail.com', 'sashidasshinin');

        //宛先
        $mail->addAddress('hoge@gmail.com', 'sashidasshinin');

        //cc
        $mail->addCC('hoge@gmail.com');

        //bcc
        $mail->addBCC('hoge@gmail.com');

        //htmlメール指定
        $mail->isHTML(true);

        //件名
        $mail->Subject = 'Here is the subject';

        //内容
        $mail->Body = 'This is test message.';

        $mail->send();

        echo 'Message has been sent';

    }catch(Exception $e){
        echo 'メッセージ送信に失敗しました。->' . $e->getMessage();
    }
    