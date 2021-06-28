<?php
require_once('../connect.php');

$description = $_GET['description'];



$stmt = $PDO->prepare("INSERT INTO `posts` (`post_icerik`) VALUES(?)");
$stmt->execute(array($description));

if ($stmt) {
    echo "done ......................";
} else {
    echo "error ..................";
}
