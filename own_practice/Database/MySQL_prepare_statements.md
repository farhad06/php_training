## Prepared Statements and Bound Parameters
A prepared statement is a feature used to execute the same (or similar) SQL statements repeatedly with high efficiency.

#### Prepared statements basically work like this:
   1.Prepare: An SQL statement template is created and sent to the database. Certain values are left unspecified, called parameters (labeled "?"). Example: INSERT INTO MyGuests VALUES(?, ?, ?)

   2.The database parses, compiles, and performs query optimization on the SQL statement template, and stores the result without executing it
  
   3.Execute: At a later time, the application binds the values to the parameters, and the database executes the statement. The application may execute the statement as many times as it wants with different values
   

#### Compared to executing SQL statements directly, prepared statements have three main advantages:

   - Prepared statements reduce parsing time as the preparation on the query is done only once (although the statement is executed multiple times)
   - Bound parameters minimize bandwidth to the server as you need send only the parameters each time, and not the whole query
   - Prepared statements are very useful against SQL injections, because parameter values, which are transmitted later using a different protocol, need not be correctly escaped. If the original statement template is not derived from external input, SQL injection cannot occur.

#### CREATE READ UPDATE DELETE QUERY IN MySQLi PREPARED STATEMENTS.


1. **Create (INSERT):**
   - Prepare the INSERT query with placeholders for the values you want to insert.
   - Bind the parameters to the placeholders.
   - Execute the prepared statement.

```php
// Example of creating a new user record
$name = "John";
$email = "john@example.com";
$age = 30;

$stmt = $mysqli->prepare("INSERT INTO users (name, email, age) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $name, $email, $age);

if ($stmt->execute()) {
    echo "New user created successfully!";
} else {
    echo "Error creating user: " . $stmt->error;
}

$stmt->close();
```

2. **Read (SELECT):**
   - Prepare the SELECT query with placeholders for any conditions.
   - Bind the parameters to the placeholders, if needed.
   - Execute the prepared statement.
   - Bind result variables to store the fetched data.
   - Fetch and process the results.

```php
// Example of reading user information
$id = 123;

$stmt = $mysqli->prepare("SELECT name, email, age FROM users WHERE id = ?");
$stmt->bind_param("i", $id);

$stmt->execute();
$stmt->bind_result($name, $email, $age);

if ($stmt->fetch()) {
    echo "Name: $name, Email: $email, Age: $age";
} else {
    echo "User not found.";
}

$stmt->close();
```

3. **Update (UPDATE):**
   - Prepare the UPDATE query with placeholders for the new values and conditions.
   - Bind the parameters to the placeholders.
   - Execute the prepared statement.

```php
// Example of updating user information
$id = 123;
$newName = "Jane";
$newAge = 32;

$stmt = $mysqli->prepare("UPDATE users SET name = ?, age = ? WHERE id = ?");
$stmt->bind_param("sii", $newName, $newAge, $id);

if ($stmt->execute()) {
    echo "User information updated successfully!";
} else {
    echo "Error updating user: " . $stmt->error;
}

$stmt->close();
```

4. **Delete (DELETE):**
   - Prepare the DELETE query with placeholders for the conditions.
   - Bind the parameters to the placeholders.
   - Execute the prepared statement.

```php
// Example of deleting a user
$id = 123;

$stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "User deleted successfully!";
} else {
    echo "Error deleting user: " . $stmt->error;
}

$stmt->close();
```
#### DATATYPES IN MySQL PREPARED STATEMENTS


1. **Integer:**
   - Data Type: INT, INTEGER, TINYINT, SMALLINT, MEDIUMINT, BIGINT, etc.
   - Placeholder: `i`

2. **Floating-Point Number:**
   - Data Type: FLOAT, DOUBLE, DECIMAL, etc.
   - Placeholder: `d`

3. **String:**
   - Data Type: CHAR, VARCHAR, TEXT, etc.
   - Placeholder: `s`

4. **Date and Time:**
   - Data Type: DATE, TIME, DATETIME, TIMESTAMP, etc.
   - Placeholder: `s` (using the date/time in a string format)

5. **Boolean:**
   - Data Type: BOOLEAN, TINYINT(1)
   - Placeholder: `i` (using 0 or 1 for false and true, respectively)

6. **Binary Data:**
   - Data Type: BLOB, BINARY, VARBINARY, etc.
   - Placeholder: `b`

Note that the `i`, `d`, `s`, and `b` placeholders are used in the `bind_param()` method of MySQLi when binding parameters to the prepared statement. These placeholders ensure that the values are passed in the correct format to the database, avoiding any issues related to data type mismatches.

Example of using different data types in a MySQL prepared statement:

```php
// Assuming $mysqli is the MySQLi connection object

// Integer
$age = 30;
$stmt = $mysqli->prepare("SELECT * FROM users WHERE age > ?");
$stmt->bind_param("i", $age);

// String
$username = "john_doe";
$stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);

// Date
$dateOfBirth = "1990-01-15";
$stmt = $mysqli->prepare("SELECT * FROM users WHERE birthdate = ?");
$stmt->bind_param("s", $dateOfBirth);

// Boolean (using 1 for true and 0 for false)
$isPremium = 1;
$stmt = $mysqli->prepare("SELECT * FROM users WHERE is_premium = ?");
$stmt->bind_param("i", $isPremium);
```

By correctly matching the data types in the prepared statement with the parameter placeholders, you can ensure proper binding and execution of your queries in MySQL.

#### ALL MYSQL PREPARED STATEMENT FUNCTIONS

Below are the commonly used MySQLi prepared statement functions for PHP:

1. **$mysqli->prepare():** Prepares an SQL statement for execution and returns a statement object.

2. **$stmt->bind_param():** Binds variables to placeholders in the prepared SQL statement.

3. **$stmt->execute():** Executes the prepared statement.

4. **$stmt->bind_result():** Binds variables to the result set columns for retrieving data in a SELECT query.

5. **$stmt->fetch():** Fetches the next row from the result set in a SELECT query.

6. **$stmt->close():** Closes the prepared statement.

7. **$stmt->num_rows():** Returns the number of rows in the result set for SELECT queries.

8. **$stmt->affected_rows():** Returns the number of affected rows in an INSERT, UPDATE, or DELETE query.

9. **$stmt->store_result():** Transfers the entire result set from the database server to the client for easier data processing.

10. **$stmt->free_result():** Frees the memory associated with the result set when you are done with it.

11. **$stmt->get_result():** Retrieves the result set from a prepared statement for SELECT queries, enabling direct access to the data using functions like `fetch_assoc()` or `fetch_object()`.

Here's a simple example using most of these functions:

```php
// Assuming $mysqli is the MySQLi connection object

// Prepare the statement
$stmt = $mysqli->prepare("SELECT name, email FROM users WHERE age > ?");

// Bind parameter
$ageThreshold = 25;
$stmt->bind_param("i", $ageThreshold);

// Execute the statement
$stmt->execute();

// Bind result variables
$stmt->bind_result($name, $email);

// Fetch and process the results
while ($stmt->fetch()) {
    echo "Name: $name, Email: $email<br>";
}

// Close the statement
$stmt->close();
```
