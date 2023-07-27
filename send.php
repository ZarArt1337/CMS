<?php

            header('Content-Type: text/html; charset=utf-8');

            session_start();

                if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['message'])){

		                $my_mail = 'biuro@zarart.pl';

		                $header = 'Reply-To: <'.$_POST['email']."> \r\n"; 
		                $header .= "MIME-Version: 1.0 \r\n"; 
		                $header .= "Content-Type: text/html; charset=UTF-8"; 

		                $msg_mail = "<p>Dostałeś wiadomość od:</p>";
		                $msg_mail .= "<p>Imie i nazwisko: " . $_POST['name'] . "</p>";
		                $msg_mail .= "<p>Email: " . $_POST['email'] . "</p>";
		                $msg_mail .= "<p>Wiadomość: " . $_POST['message'] . "</p>";

		                $message = '<!doctype html><html lang="pl"><head><meta charset="utf-8">'.$msg_mail.'</head><body>';

		                $subject = 'Wiadomość ze strony ZarArt.pl';
		                $subject = '=?utf-8?B?'.base64_encode($subject).'?=';

		                if(mail($my_mail, $subject, $message, $header)){
                            
                            //header('Location: '.$_SERVER['HTTP_REFERER']);
                            echo('<div class="py-5 text-center fs-2 fw-bold text-success">Your message was successfully sent.</div>');
                            // echo('<a href="sent.html" onClick="history.go(-1)">Powrót do strony głównej</a>');
                            Header('Location: index.php');
		                }else{
		            	    echo('<div class="py-5 text-center fs-2 fw-bold text-danger">Your message has not been sent.</div>');
		                }
	                }
                
?>