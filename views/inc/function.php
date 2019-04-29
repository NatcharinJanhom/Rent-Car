<?php
function dmy_TO_ymd($date)
{
    $temp =explode("/",$date);
    return $temp[2]."-".$temp[1]."-".$temp[0];
}
function ymd_TO_dmy($date)
{
    $temp =explode("-",$date);
    return $temp[2]."/".$temp[1]."/".$temp[0];
}
