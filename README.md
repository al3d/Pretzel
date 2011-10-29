# Pretzel ![icon for the sake of it](https://github.com/al3d/Pretzel/blob/master/icon.png)

Pretzel is a very simple, crude and generally untested wrapper for PHP's PDO interface. Specifically MySQL at the moment.

### One special feature

The one special feature I think this library has is that it throws unique `Pretzel_Exception_*` exceptions for each error that PDO throws. The data for this was retrieved and parsed from <http://www.phpro.org/articles/MySQL-Error-Codes.html>. Check out the Pretzel/Exception directory for more info.

Make of it what you wish. The exceptions are probably incomplete, and the code buggy, though it's worked for me so far.

### Requirements

As far as I'm aware, it only needs PHP 5.2.something. It should work on 5.3, but I've not really tested it. I do a lot of work for clients who have lazy (shared hosting) hosts who rarely and are afraid to update their software (presumably for fear of messing things up for lazy clients). This needs to work for them, too (plus I refuse to use the namespacing… love PHP, hate its namespace - fuck it).

### Installation + Usge

[Download](https://github.com/al3d/Pretzel/zipball/master) or `clone git git@github.com:al3d/Pretzel.git` the git repository and upload the `Pretzel.php` and `Pretzel/` directory somewhere on your server. From there you just need to `<?php require_once 'Pretzel.php` (that is, to wherever you've put the Pretzel.php and Pretzel/ directory) and you're up and running. That is apart from the configuration.

The following is a simple example of how you might use Pretzel. Hopefully it's self explanatory. I will add comments to the files, tests and proper comments/documentation to this project someday… honest

	<?php

	require_once 'Pretzel.php'; // or wherever you've installed it.

	// I'm filling in all the available options to demonstrate.
	// See the code for defaults.
	$db = new Pretzel(array(
		'host'       => 'localhost',
		'port'       => 3306,
		'username'   => 'al3d',
		'password'   => 'aw3s0m3_p455w0rd', // so l33t!
		'database'   => 'my_database',
		'persistent' => true // apparently good for performance
	));

	// Straight up query
	// Returns the number of results affected.
	$db->execute('UPDATE logs SET visitors = visitors + 1');

	// Another straight up query (I'm a little narcissistic)
	$updated = $db->execute('UPDATE table SET awesome = 1 WHERE name = "aled"');
	// $updated returns 1 because I'm the only awesome one in my contacts table

	// Queries with user data uses PDO's binding.
	// Apart from blob (which it doesn't support), it's determined
	// by type, so it's important to cast beforehand.
	$username = (string) filter_var(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$number   = (int) filter_input(INPUT_POST, 'number', FILTER_SANITIZE_NUMBER_INT);

	// This is a shortcut version, which binds like PDO does.
	$db->execute('INSERT INTO table (username, num) VALUES (?, ?)', $username, $number);

	// You can create statements, too
	$statement = $db->query('INSERT INTO table (username, num) VALUES (:u, :n)');
	$statement->bind(':u', $username)
	          ->bind(':n', $number)
	          ->execute();

	// Getting recordset
	$records = $db->query('SELECT * FROM table')->execute(); // returns a Pretzel_Recordset object
	$all_rows = $records->getAll(Pretzel::FETCH_OBJECT);
	// I just specified the recordset be an array of objects, but you can use PDO constants too.

	// Shortcuts - this one gets an array for a row (array is returned by default)
	$username = 'aled';
	$row = $db->query('SELECT * FROM table WHERE name = ?', $username)->getOne();

	// Shortcuts - this one get all records (an array of rows, which are themselves arrays)
	$rows = $db->query('SELECT * FROM table')->getAll();
	foreach($rows as $row) {
		var_dump($row);
	}

	// Table are a very rough way of executing queries in an abstracted way, a little like ActiveRecord
	$table = $db->table('my_table');
	$id = $table->insert(array(
		'name'  => 'al3d',
		'coder' => 1
	));
	// Alternative method, using update method (primary key is assumed to be 'id' and is second parameter)
	$affected_rows = $db->table('my_table')->update(array(
		'coder' => 0
	), (int) $id);

	// Utilities provide a basic interface to querying the db's structure
	$table_columns         = $db->util()->getColumns('table');
	$contacts_db_columns   = $db->util()->getColumns('contacts_table', 'contacts_db');
	$all_tables_in_db      = $db->util()->getTables();
	$tables_in_contacts_db = $db->util()->getTables('contacts_db');
	$table_schema          = $db->util()->getSchema('table');

	// Exceptions…
	// Are how we really work. All calls to Pretzel should be in a try..catch block
	try {
		// Some of the above method calls
	} catch (Pretzel_Exception $e) {
		// Handle error
	}

	// However, you can be specific with how you manage different errors
	// This example catches duplicate keys
	try {
		$db->execute('INSERT INTO table (key) VALUE ("duplicate")');
	} catch (Pretzel_Exception_Server_DupKey $e) {
		echo 'A duplicate key was detected';
		exit;
	} catch (Pretzel_Exception $e) {
		echo 'An error occurred: ' . $e->getMessage();
		exit;
	}

	// Transactions… only supported by some engines (like InnoDB)
	// They should always be used in exception blocks
	try {
		$db->transaction()->start();
		// Do some sql actions
		$db->transaction()->commit();
		echo 'sql executed successfully';
		exit;
	} catch (Pretzel_Exception $e) {
		// Rollback actions tried in transaction
		$db->transaction()->rollBack();
		echo 'Oops! An error occurred: ' . $e->getMessage();
		exit
	}


### A few notes

- All errors throw exceptions, so you should put code in a `try { ... } catch (Pretzel_Exception $e) { ... }` block. You can be specific with exceptions, which is why Pretzel is nice… If you test for duplicate records you can try to catch `Pretzel_Exception_Server_DupKey` (see the above example).
- The database connection class (Pretzel_Connection) sets the character set to *UTF-8* at the beginning of all connections. You can change the code if you need another charset or if you know that the database uses UTF-8. UTF-8 is best.
- The database has only been (sporadically) tested with MySQL. Because it uses PDO it should work with other engines with some hacking, but there's no guarentee.
- The table class (Pretzel_Table) only works with MySQL.
- Transactions probably only work with MySQL, and only with an engine that supports them (like InnoDB. The MyISAM MySQL engine doesn't support transactions).
- The utility class (Pretzel_Util) probably doesn't work with non-MySQL classes.

I'm not bothered to expand the development of Pretzel to support other SQL engines. If you want to, please let me know how you get on!