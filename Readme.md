
Completedd Business logic
+ list a driver's drives
+ list a registered user's rides
+ answer who was driving a specific car on a specific day
- validate whether a driver has the appropriate license to drive a specific vehicle

As I limited the time spent on this to 3 hrs it is not all functioning. the above 3 (+) functions on the business logic are working
I have included a sample database structure and date to test the app (db.sql), 
note that this database does not enforse any referential integrity and contains limited sample data.
the database connection parameters are hard coded into the Database calss (Database.php), ideally this would be located in a seperate config file.
a limited ui is provided.
I ahve ommited tasks such as authentication, registeration, and ride booking, add driver, add customer and add vehicle due to the time limit.

