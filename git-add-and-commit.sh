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


git status

if promptyn "[GAAC] git add . [y|n]"; then
    echo
    git add .
fi

if promptyn "[GAAC] git commit -a [y|n]"; then
    echo
    git commit -a

    if promptyn "[GAAC] git push [yn]"; then
        echo
        git push
    fi

fi
