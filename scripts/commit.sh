#!/bin/bash
function commit {
    echo "Commiting"
}

STATUS_OUTPUT="$(git status -s)"
STATUS_OUTPUT_LENGTH=`expr length "$STATUS_OUTPUT"`

if [ $STATUS_OUTPUT_LENGTH -eq 0 ]; then
    commit
else
    echo "There are some uncommited changes"
fi

