#!/bin/bash
STATUS_OUTPUT="$(git status -s)"
STATUS_OUTPUT_LENGTH=`expr length "$STATUS_OUTPUT"`

function generateVersionFile {
    OLD_VERSION=`cat ../VERSION`;
    VERSION=`./genVersion.php`

    echo "Old Version:"$OLD_VERSION
    echo "New Version:"$VERSION
}


if [ $STATUS_OUTPUT_LENGTH -eq 0 ]; then
    generateVersionFile
else
    generateVersionFile
    echo "There are some uncommited changes"
    echo
    echo $STATUS_OUTPUT
    echo
fi

