DATABASES="CentralRevelados"
SYSTEM="Magento"
 
 ## Syntax databasename as per above _USER and _PW
 db_USER=root  
 db_PW=CRDBAdmin
 
 

 ## Specify directories to backup (it's clever to use relaive paths)
 DIRECTORIES="/etc/cron.daily etc/apache2 etc/mysql etc/php5"
 
 ## Initialize some variables
 DATE=$(date +%Y-%m-%d:%H:%M)
 DATE2=$(date+%Y-%m-%d)
 BACKUP_DIRECTORY=/tmp/backups
 S3_CMD="s3cmd"
 
 ## Specify where the backups should be placed
 S3_BUCKET_URL=s3://CentralReveladosServer/$SYSTEM/
 S3_BUCKET_URL2="s3://CentralReveladosServer/"
 
## The script
cd /
 mkdir -p $BACKUP_DIRECTORY
rm -rf $BACKUP_DIRECTORY/*
 
 ## Backup MySQL:s
 for DB in $DATABASES
 do
 BACKUP_FILE=$BACKUP_DIRECTORY/${DB}+$DATE.sql
 /usr/bin/mysqldump -v -u $db_USER --password=$db_PW -h localhost -r $BACKUP_FILE $DB 2>&1
 $S3_CMD put $BACKUP_FILE $S3_BUCKET_URL 2>&1
echo "INSERT INTO respaldo (respaldo_id,fecha_creado,respaldo_estado_id,respaldo_tipo_id,sistema_sistema_id,respaldo_url)
 values ('12','$DATE2','1','1','1','$S3_BUCKET_URL${DB}+$DATE.sql');" | mysql -u $db_USER -p$db_PW $DATABASES;  #se modifica dependiendo de tipo de respaldo
 done
  
 ##Location of backups for mysql database


 
 ## Backup of config directories
# for DIR in $DIRECTORIES
# do
# BACKUP_FILE=$BACKUP_DIRECTORY/$(echo $DIR | sed 's/\//-/g').tgz
# tar zcvf ${BACKUP_FILE} $DIR 2>&1
# $S3_CMD put ${BACKUP_FILE} $S3_BUCKET_URL 2>&1
# done

