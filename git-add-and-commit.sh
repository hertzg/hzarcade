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


if promptyn "[GAAC] Ready to begin [y|n]"; then

    git status

    if promptyn "[GAAC] git add . [y|n]"; then
        git add .
    fi

    if promptyn "[GAAC] git commit -a [y|n]"; then
        git commit -a

        if promptyn "[GAAC] git push [yn]"; then
            git push
        fi

    fi

fi
