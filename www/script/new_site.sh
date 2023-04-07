NAME=$1
USER=$2
sudo echo "
server {
        listen 80 default_server;
        listen [::]:80 default_server;

        server_name www.$NAME.fr;

        access_log /var/log/nginx/$NAME/access.log;
        error_log /var/log/nginx/$NAME/error.log;

        error_page 404 /404.html;
        error_page 403 /403.html;
        error_page 500 /500.html;


        root /home/$USER;
        index index.php index.html.php index.html;

        server_name _;
        location / {
                try_files $uri $uri/ =404;
        }
        location ~ \.php$ {
                include snippets/fastcgi-php.conf;
                fastcgi_pass unix:/run/php/php8.1-fpm.sock;
        }
        location ~ /\.ht {
                deny all;
        }
}
" >/etc/nginx/sites-available/$NAME
sudo cp /etc/nginx/sites-available/$NAME /etc/nginx/sites-enabled/
