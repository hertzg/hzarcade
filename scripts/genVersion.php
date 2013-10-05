#!/usr/bin/php
<?php
$versionCommand = "git describe --long --dirty --abbrev=10 --tags";

$response = "";
exec($versionCommand, $response);
echo $response[0];

