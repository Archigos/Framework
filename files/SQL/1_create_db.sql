-- Setup the database
CREATE DATABASE IF NOT EXISTS ArchiPersistent COLLATE utf8_general_ci;

-- Make a more secure password before doing this
CREATE USER 'archi_admin'@'localhost' IDENTIFIED BY 'password';

-- Grant the minimum amount of priveledges that you can
GRANT SELECT, INSERT, UPDATE, DELETE ON ArchiPersistent.* TO 'archi_admin'@'localhost';
