# Interactive contact form

Fill the valid data => Preview the filled data => decide wheter send or edit again.<br/>

Languages and markups:

- PHP7 (OOP), MYSQL(db:PDO)
- Pure Javascript
- HTML5, CSS3

# Setup

- [DB Configuration] The attached folder contains an SQL file (contact_form.sql) which you need to import into the MySQL database. Please configure the database connection in classes/db.connection.php file.
  $this->host    = 'localhost';
        $this->db = '';
  $this->user    = '';
        $this->pass = '';

- Copy the whole folder in your local (htdocs) XAMPP folder and run (in root folder) "index.php" file for the Contract-form and "contract-list.php" to view all the contract messages.
