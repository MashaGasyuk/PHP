<?php
$mysqli = new mysqli("localhost","root","","Software_testing");
if(!$mysqli){
    die('Error connection');
}