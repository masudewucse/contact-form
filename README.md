# Interactive contact form

Fill valid data => Preview the filled data => decide wheter send or edit again
Languages and markups:

- PHP7 (OOP), MYSQL(db:PDO)
- Pure Javascript
- HTML5, CSS3

# Setup

- [DB Configuration] The attached folder contains an SQL file (contact_form.sql) which you need to import into the MySQL database. Please configure the database connection in classes/db.connection.php file.
  $this->host    = 'localhost';
        $this->db = 'contact';
  $this->user    = 'root';
        $this->pass = '';

- Copy whe whole folder in your local (htdocs) XAMPP folder and run index.php file
