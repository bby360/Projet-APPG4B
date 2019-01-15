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
<tr>
        <td>
            <p>Ajouter une question</p>
        </td>
    </tr>
    <tr>
        <form method="post" action="index.php?action=addTopic">
            <td>
                <p>
                    <label for="subject">Sujet du topic</label> : <input type="text" name="subject" id="subject" />
                </p>
            </td>
        </tr>
</table>
</body>

 </html>