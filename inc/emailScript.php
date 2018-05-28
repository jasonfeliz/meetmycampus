<?php

                require 'phpMailer/PHPMailerAutoload.php';

                $mail = new PHPMailer;

                $mail->isSMTP();                            // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                     // Enable SMTP authentication
                $mail->Username = 'happiefoundation@gmail.com';          // SMTP username
                $mail->Password = 'eltorito9'; // SMTP password
                $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                          // TCP port to connect to

                $mail->setFrom('happiefoundation@gmail.com', 'MeetMyCampus Community');
                $mail->addAddress('happiefoundation@gmail.com');   // Add a recipient

                $mail->isHTML(true);  // Set email format to HTML

?>