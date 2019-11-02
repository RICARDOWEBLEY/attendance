<?php 
    require 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to,$subject,$content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("success1876@outlook.com", "Tobin Frost");
            $email->setSubject($subject); //subject of mail
            $email->addTo($to); 
            $email->addContent("text/plain", $content);

            //$email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception Caught : '. $e->getMessage() ."\n";
                return false;
            }
        }
    }
?>