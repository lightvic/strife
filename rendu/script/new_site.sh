#!/bin/bash

sudo sed -e "s/MYUSERNAME/$2/" -e "s/MYDOMAIN/$1/" /etc/nginx/sites-available/templateSite > /etc/nginx/sites-enabled/$1
sudo mkdir /home/$2/site/$1
sudo cp /home/$2/site/base/index.php /home/$2/site/$1
