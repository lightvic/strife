DB=$1
USER=$2
PASSWORD=$3

sudo mysql -e "CREATE DATABASE $DB;"
sudo mysql -e "CREATE USER '$USER'@'localhost' IDENTIFIED BY '$PASSWORD';"
sudo mysql -e "GRANT ALL PRIVILEGES ON $DB.* TO '$USER'@'localhost';"
