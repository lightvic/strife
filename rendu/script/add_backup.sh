backupfile="/home/$1/site"
backuppath="/home/$1/backups"
archivefile="$1-$(date +%d-%m-%y).tgz"
sudo tar -cvzf $backuppath/$archivefile $backupfile 
