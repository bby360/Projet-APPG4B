<html>
<head>
<link rel="stylesheet" type="text/css" href="designs/css/faq.css" />
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="./designs/css/faq.js"></script>
<title>FAQ</title>
</head>
<header>
<?php
include 'headerAdmin.php';
?>
</header>

<?php require 'isConnectedAdmin.php';
?>
<body>
<table>
<tr>
        <td>
            <p>Ajouter une nouvelle Question/Réponse</p>
        </td>
    </tr>
    <tr>
        <form method="post" action="indexAdmin.php?action=faqAdmin">
            <td>
                <p>
                    <label for="question">Question</label> : <input type="text" name="question"/>
                </p>
            </td>
            <td>
                <p>
                    <label for="reponse">Reponse</label> : <input type="text" name="reponse"/>
                </p>
            </td>
            <td>
            <input type="submit" value="Ajouter" />

</td>
        </tr>

        
        </form>
</table>
</body>

 </html>