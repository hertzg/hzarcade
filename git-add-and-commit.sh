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


git status

if promptynY "[GAAC] git add . [Y|n]: "; then
    echo
    git add .
fi

if promptynY "[GAAC] git commit -a [Y|n]: "; then
    echo
    git commit -a

    if promptynN "[GAAC] git push [y|N]: "; then
        echo
        git push
    fi

fi
