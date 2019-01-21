<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if (empty($_SESSION['email']))
{
    header('Location: indexAdmin.php?action=signinAdmin');

 }

