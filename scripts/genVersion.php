#!/usr/bin/php
<?php
$versionCommand = "git describe --long --dirty --abbrev=40 --tags";

$response = "";
exec($versionCommand, $response);
$version = $response[0];

$parts = parse($version);

echo pretty_json(json_encode($parts));

function parse($str) {
    $str = substr($str, 1);
    
    $parts = array();
    
    $dotParts = explode(".", $str);
    $parts["major"] = $dotParts[0];
    $parts["minor"] = $dotParts[1];
    
    $dashParts = explode("-", $dotParts[2]);
    $parts["patch"] = $dashParts[0];
    $parts["build"] = $dashParts[1];
    $parts["commit"] = $dashParts[2];
    
    if(isset($dashParts[3]) && $dashParts[3] == "dirty") {
        $parts["dirty"] = true;
    } else {
        $parts["dirty"] = false;
    }
    
    return $parts;
}


function pretty_json($json) {

    $result      = '';
    $pos         = 0;
    $strLen      = strlen($json);
    $indentStr   = '  ';
    $newLine     = "\n";
    $prevChar    = '';
    $outOfQuotes = true;

    for ($i=0; $i<=$strLen; $i++) {

        // Grab the next character in the string.
        $char = substr($json, $i, 1);

        // Are we inside a quoted string?
        if ($char == '"' && $prevChar != '\\') {
            $outOfQuotes = !$outOfQuotes;
        
        // If this character is the end of an element, 
        // output a new line and indent the next line.
        } else if(($char == '}' || $char == ']') && $outOfQuotes) {
            $result .= $newLine;
            $pos --;
            for ($j=0; $j<$pos; $j++) {
                $result .= $indentStr;
            }
        }
        
        // Add the character to the result string.
        $result .= $char;

        // If the last character was the beginning of an element, 
        // output a new line and indent the next line.
        if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
            $result .= $newLine;
            if ($char == '{' || $char == '[') {
                $pos ++;
            }
            
            for ($j = 0; $j < $pos; $j++) {
                $result .= $indentStr;
            }
        }
        
        $prevChar = $char;
    }

    return $result;
}
