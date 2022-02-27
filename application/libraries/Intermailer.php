<?php
require_once(APPPATH.'third_party/PHPMailer-6.1.1/src/PHPMailer.php');
require_once(APPPATH.'third_party/PHPMailer-6.1.1/src/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Intermailer{
  private $mail_options;
  private $mail;
  // configurasi
  private $smtpAuth    = true;
  private $smtpSecure  = "tls";
  private $host        = SMTP_HOST;
  private $port        = SMTP_PORT;
  private $smtpDebug   = 0;
  private $smtpOptions = array(
                                'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                              ));

  function initialize(){
    $this->mail = new PHPMailer();
    $this->mail->IsSMTP(); // we are going to use SMTP
    $this->mail->SMTPAuth    = $this->smtpAuth;//true; // enabled SMTP authentication
    $this->mail->SMTPSecure  = $this->smtpSecure;//"ssl";  // prefix for secure protocol to connect to the server
    $this->mail->Host        = $this->host;//"ssl://smtp.gmail.com";       // setting GMail as our SMTP server
    $this->mail->Port        = $this->port;//465;
    $this->mail->SMTPDebug   = $this->smtpDebug;// 1 -4
    $this->mail->SMTPOptions = $this->smtpOptions;
    $this->mail->isHTML(true);
    $this->mail->Username = SMTP_EMAIL;
    $this->mail->Password = SMTP_PASSWORD;
    $this->mail->setFrom("inact@interactive.co.id",SANDBOX_IDENTIFICATION."InAct ");
    $this->mail->addReplyTo("inact@interactive.co.id", SANDBOX_IDENTIFICATION."InAct ");
  }

  /*
  function set_username($username){
    $this->mail->Username = $username;
  }

  function set_password($password){
    $this->mail->Password = $password;
  }
  */

  function from($email,$name){
    $this->mail->setFrom("inact@interactive.co.id",SANDBOX_IDENTIFICATION."InAct ");
    $this->mail->addReplyTo("inact@interactive.co.id", SANDBOX_IDENTIFICATION."InAct ");
  }

  function to($arr_recipient){
    foreach ($arr_recipient as $email => $nama) {
      $this->mail->addAddress($email, $nama);
    }
  }

  function set_content($subject,$body,$alt_body){
    $this->mail->Subject = $subject;
    $this->mail->Body    = $body;
    $this->mail->AltBody = $alt_body;
  }

  function set_attachment($path,$filename){
    $this->mail->addAttachment($path, $filename);
  }

  function singleTo($status){
    $this->mail->SingleTo   = $status;
  }

  function send(){
    if(!$this->mail->Send()) {
        echo $this->mail->ErrorInfo;
    } else {
        return true;
    }
  }
}
