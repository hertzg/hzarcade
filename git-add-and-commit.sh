#!/bin/bash
promptyn () {
    while true; do
        read -p "$1 " -n 1 yn
        echo
        case $yn in
            [Yy]* ) return 0;;
            [Nn]* ) return 1;;
            * ) echo "Please answer yes or no.";;
        esac
    done
}

promptynY () {
    while true; do
        read -p "$1 " -n 1 yn
        echo
        case $yn in
            [Yy]* ) return 0;;
            [Nn]* ) return 1;;
            * ) return 0;;
        esac
    done
}

promptynN () {
    while true; do
        read -p "$1 " -n 1 yn
        echo
        case $yn in
            [Yy]* ) return 0;;
            [Nn]* ) return 1;;
            * ) return 1;;
        esac
    done
}

echo "+===================================================+"
echo "| This script is used for version control and easy  |"
echo "| git source management. This script will increment |"
echo "|  version incr number automatically but will not   |"
echo "|    increment major, minor or revision numbers.    |"
echo "|                                                   |"
echo "|  To increment those versions please create a new  |"
echo "|        git tag with following format vX.X.X       |"
echo "+===================================================+"
echo
echo "+===========================================================+"
echo "|Curr: "`cat ./VERSION`"|"
echo "|Next: "`scripts/genVersion.php --safeRun --showString`"|"
echo "+===========================================================+"
echo
if promptynY "Ready to begin commiting new version [Y|n]"; then
    echo "Generating new Version....."
    scripts/genVersion.php
    echo "========================================================="
    git status

    if promptynY "$ git add . [Y|n]: "; then
        echo
        git add .
        echo "========================================================="
        git status
    fi

    if promptynY "$ git commit -a [Y|n]: "; then
        echo
        git commit -a

        if promptynN "$ git push --all --tags [y|N]: "; then
            echo
            git push --all --tags
        fi

    fi
fi
