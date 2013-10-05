#!/bin/bash
STATUS_OUTPUT="$(git status -s)"
STATUS_OUTPUT_LENGTH=`expr length "$STATUS_OUTPUT"`

function generateVersionFile {
    echo `./genVersion.php` > ../VERSION
    echo "DONE!"
}


if [ $STATUS_OUTPUT_LENGTH -eq 0 ]; then
    generateVersionFile
else
    echo "There are some uncommited changes"
fi

