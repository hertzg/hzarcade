#!/usr/bin/php
<?php
$cwd = __DIR__;
$jsonPath = $cwd."/../version.json";
$stringPath = $cwd."/../VERSION";

$safeRun = isset($argv[1]);
$showString = isset($argv[2]) ? true : true;
$showJson = isset($argv[3]) ? true : false;

$versionCommand = "git describe --long --abbrev=40 --tags";

$oldVersionJson = json_decode(file_get_contents($jsonPath), true);
$inc = isset($oldVersionJson["incr"]) ? $oldVersionJson['incr'] : 1;

$response = "";
exec($versionCommand, $response);
$newVersion = $response[0];

$newVersionJson = parse($newVersion, $inc);
$newVersion .= "-".($inc+1);

if(!$safeRun) {
    file_put_contents($stringPath, $newVersion);
    file_put_contents($jsonPath, json_encode($newVersionJson));
    echo $newVersion."\n";
} else {
    if($showString) {
        echo $newVersion."\n";
    }

    if($showJson) {
        echo json_encode($newVersionJson)."\n";
    }

}

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
