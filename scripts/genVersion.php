#!/usr/bin/php
<?php
$versionCommand = "git describe --long --abbrev=40 --tags";

$oldVersionJson = json_decode(file_get_contents("../version.json"), true);
$inc = isset($oldVersionJson["incr"]) ? $oldVersionJson['incr'] : 1;

$response = "";
exec($versionCommand, $response);
$newVersion = $response[0];

$newVersionJson = parse($newVersion, $inc);
$newVersion .= "-".($inc+1);

file_put_contents("../VERSION", $newVersion);
file_put_contents("../version.json", json_encode($newVersionJson));
echo $newVersion."\n";

function parse($str, $inc) {
    $str = substr($str, 1);
    
    $parts = array();
    
    $dotParts = explode(".", $str);
    $parts["major"] = $dotParts[0];
    $parts["minor"] = $dotParts[1];
    
    $dashParts = explode("-", $dotParts[2]);
    $parts["patch"] = $dashParts[0];
    $parts["build"] = $dashParts[1];
    $parts["commit"] = $dashParts[2];
    $parts["incr"] = $inc+1;
    return $parts;
}
