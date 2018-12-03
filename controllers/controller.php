<?php

require "models/model.php";

function temporary(){
    require "views/temporary_guest.php";
}

function rooms(){
    require "views/rooms.php";
}
function seeError(){
    require "views/home.php";
}

function seeRooms(){
    $rooms = getRooms()->fetchAll();

    require "views/rooms.php";
}
