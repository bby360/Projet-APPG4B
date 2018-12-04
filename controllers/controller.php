<?php

require "models/model.php";

function seeHome(){
    require "views/home.php";
}

function temporary(){
    require "views/temporary.php";
}

function rooms(){
    require "views/rooms.php";
}
function seeError(){
    require "views/home.php";
}
function view_inscription() {
    require "../views/inscription.php";
}

function viewconnexion(){
    require "../models/model.php";
}
