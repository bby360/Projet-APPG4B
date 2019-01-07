<?php
session_start();
if (empty($_SESSION['email']))
{
    echo '<center><font color="red" size="4"><b>Vous devez vous connecter pour acceder à cette page </center></font><br />';
    header('Location: index.php?action=signin');

 }


