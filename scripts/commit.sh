#!/bin/bash

STATUS_OUTPUT="$(git status -s)"
STATUS_OUTPUT_LENGTH=expr length "$STATUS_OUTPUT"

if ["$STATUS_OUTPUT_LENGTH"=="0"]; then
    echo "OK\n"
else
    echo "LENGTH > 0"
fi
