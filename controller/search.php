<?php
$keywords = $_POST["keywords"];
$date = $_POST["date"];
$sql = "body=" . $keywords . " && before=" . $date;