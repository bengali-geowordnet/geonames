# Bengali Geonames Project

This project was developed as part of our reasearch of Bengali Geonames for Bengali Geowordnet.
You can obtain the paper at Academia at: `Geonames Classification for Bengali Geowordnet`(https://www.academia.edu/26308394/Geonames_Classification_for_Bengali_Geowordnet)

### To run the project

1. Get the database file and use the tool `mysql2sqlite` (https://github.com/bengali-geowordnet/mysql2sqlite) to convert it to sqlite DB.
2. Rename the DB as "geonamesSQLite" and drop it into /application/database folder.
3. Change "active_group" variable in "/application/config/database.php" to 'development'.
4. Launch app using "php -S localhost:8080" from cli.
