<?php

$date = new DateTime();

$date->setTimeZone(new DateTimeZone("Asia/Jakarta"));
$date_now_plus_one_week = clone $date;
$date_now_plus_one_week = $date_now_plus_one_week->add(new DateInterval("P1W"));

$date_now = (array) $date;
echo $date_now['date'] . PHP_EOL;

$date_now_plus_one_week_now = (array) $date_now_plus_one_week;
echo $date_now_plus_one_week_now["date"];
