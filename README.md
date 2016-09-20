# Realtime Chart

This is a simple program to display timeseries data in real time using php, socket.io, and flot chart.

# Database Setting

Make sure your database enable **binary logging**  before starting the service. In MariaDB 10.0.25 you can enable **binary logging** by enabling this config in **/etc/mysql/mariadb.conf.d/mysqld.cnf** :

```
server-id = 1
log_bin = /var/log/mysql/mysql-bin.log

# Row format required for ZongJi
binlog_format = row
```

# Database Dummy Data (optional)

You can import dummy data from example **realtime_chart.sql** file. No need to create database, just import the *.sql file.

# Socket.io

You must install node.js first in order to run service using socket.io. After node.js has been installed, go to **socket.io/** folder and install required packages by typing this command in terminal: 

```
npm install
```

Then run the service by typing:

```
node index.js
```

# PHP Files

Copy **php/** directory to you htdocs directory. After PHP & MariaDB service ran, open the web page via browser.

# Demo

Just insert new data to **realtime_chart.chart_data** table in your database and it will be appeared in the chart automatically without refreshing the web page.

# Have Fun!
