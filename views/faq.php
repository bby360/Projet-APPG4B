<html>
<head>
<link rel="stylesheet" type="text/css" href="designs/css/faq.css" />
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="./designs/css/faq.js"></script>
<title>FAQ</title>
</head>
<header>
<?php
include 'header.php';
require 'isConnected.php';
?>
</header>

<body>
<table>
    <section>
        <div class="faq_container">
<?php foreach($questions as $question) { ?>
         <tr id='info'>   
            <td class="faq_question">
                <p><?= $question["question"];?></p>
            </td>
            <div class="faq_answer_container">
            <td class="faq_reponse">
                <p><?= $question["reponse"];?></p>
            </td>
</div>
        </tr>
    <?php } ?>
</div>
</section>
</table>
</body>

 </html>