FROM ubuntu:14.04

#DNS update: This is needed to run yum and to let the docker build process access the internet. 
RUN "sh" "-c" "echo nameserver 8.8.8.8 >> /etc/resolv.conf"

RUN apt-get update -y
RUN apt-get upgrade -y

# Install apache, PHP, and supplimentary programs. curl and lynx-cur are for debugging the container.
RUN DEBIAN_FRONTEND=noninteractive apt-get -y --fix-missing install acl apache2 libapache2-mod-php5 php5-mysql php5-gd php-pear php5-curl curl php5-intl php5-mcrypt

# Enable apache mods.
RUN a2enmod php5
RUN a2enmod rewrite
RUN a2enmod proxy proxy_http
RUN php5enmod mcrypt

# Install composer 
RUN curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

# Copy php ini
COPY php.ini /etc/php5/apache2/php.ini
COPY php.ini /etc/php5/cli/php.ini

# Manually set up the apache environment variables
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

# Expose port

EXPOSE 80

# Update the default apache site with the config we created.
ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

# By default, simply start apache.

CMD cd /var/www/site; composer install;/usr/sbin/apache2ctl -D FOREGROUND

