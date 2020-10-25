<?php
$name = $_POST['name'];
$phone = $_POST['tel'];
$link = $_POST['item-link'];
$pageLink = $_POST['page-link'];
$pageLink = $pageLink . '#' . $link;

$to = "slava@artclick.su";
$headers = 'From: info@artclick.su/' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
$subject = "Заявка на тур";
$message = "Имя: $name \nТелефон: $phone \nСсылка: $pageLink ";
$send = mail($to, $subject, $message, $headers);
echo "<p class='p3'>Ваша заявка успешно отправлена!<br />В ближайшее время мы на нее ответим.</p>";

?>