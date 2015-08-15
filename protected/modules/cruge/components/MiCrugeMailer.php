<?php
    class MiCrugeMailer extends CrugeMailer {
        
        public $smtp_user;
        public $smtp_pwd;
	
        public function sendEmail($to, $subject, $body, $reply_to=""){
            Yii::log(__METHOD__,"email");
            $sm = Yii::app()->swiftmailer;
            $tr = Swift_SmtpTransport::newInstance("h2256521.stratoserver.net","465", "ssl")
                ->setUsername($this->smtp_user)
                ->setPassword($this->smtp_pwd)
            ;
            /*$tr = Swift_SmtpTransport::newInstance("smtp.gmail.com","465", "ssl")
                ->setUsername($this->smtp_user)
                ->setPassword($this->smtp_pwd)
            ;*/
            $m = $sm->mailer($tr);
            $msg = $sm
                ->newMessage($this->subjectprefix.$subject)
                ->setFrom(array($this->mailfrom))
                ->setTo(array($to))
                ->addPart($body,"text/html")
                ;
            if($reply_to != "")
                $msg->setReplyTo($reply_to);
            $ret = $m->send($msg);
            $log = sprintf(
                        "\n[%s][ret=%s][to:%s][subject:%s]\nbody:\n%s\n\n",
                            __METHOD__,$ret,$to,$subject,$body);
            Yii::log($log,"email");
            return $ret;
        }	
    }
?>
