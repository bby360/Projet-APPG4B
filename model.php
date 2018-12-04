<?php

require "models/dbconnexion.php";

function getRooms(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM room");
    return $req;
}

