#!/bin/sh
if id $2>/dev/null;then
	echo 'Nom déjà pris pas de cahnce' 
	exit 2
else
	useradd -m $2
	echo "$2:$1" | sudo chpasswd
fi
