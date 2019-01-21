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

<h1><?php

    switch ($_SESSION['lang']){
        case 'fr':
            echo "Foire Aux Questions";
            break;

        case 'eng':
            echo "Frequently Asked Questions";
            break;
    }
    ?></h1>
<table>
    <section>
    <div class="faq_container">
    <?php foreach($questions as $question) { ?>
   <div class="faq">
      <div class="faq_question"><?= $question["question"];?></div>
           <div class="faq_answer_container">
              <div class="faq_answer"><?= $question["reponse"];?></div>
           </div>        
    </div>
 </div>
 <?php } ?>
</section>
</table>
</body>

 </html>