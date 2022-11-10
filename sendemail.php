<?php
    require 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to,$subject,$content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("ner_kar_cj26@yahoo.com", "Nerina Francis");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception Caught : '. $e->getMessage() . "\n";
                return false;
            }
        }
    }
?>