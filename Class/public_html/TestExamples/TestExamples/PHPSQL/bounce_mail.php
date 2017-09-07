<!DOCTYPE html>
<html>
<body>

<h1>Hello Mail</h1>

<p>My first mail test.</p>

<?php
$to      = 'eklchan@ntu.edu.sg';
$subject = 'the subject';
$message = 'hello to bounce';
$headers = 'From: f32ee@localhost' . "\r\n" .
    'Reply-To: f32ee@localhost' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers,'-ff32ee@localhost');
echo ("mail sent to : ".$to);
?> 

</body>
</html>