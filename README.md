# MVC-frame
A few words about the project:
This is the framework that was created in the likeness of laravel 4, its purpose is a personal project for the remote control of my apartment.
The features are his communication with the second server Raspberry Pi (which communicates with various sensors and arduino in place).
Moreover, the aims of the different functionalities for which need to use the Web Spiders, such as:


Youtube downloader-system that can download songs from Youtube and saves them in local server implementation.
This system can download song from submitted a link to download the whole playlist, to search for songs by artist name and submitted or to check for a certain period of time for new songs on preset and pages.

Cooking-Helper > aims to help you find what to cook. The script gets the specified ingredient or his type of âstoie checks a local database for recepri used in the past that are displayed first, if the user does not find desired by him, provides him with a key already prepared a list of recipes under the specified parameters already which is borrowed from several culinary site.
When choosing a recipe from an external source it is added to the database.

Wether News and algorytem-its purpose is to provide the user up-to-date weather forecast and the latest news from selected sources thereof
    


this is my version of PHP MVC Framework , its verry similar to laravel 4+ framework.
inside i place one simple framework writed on Perl, currently it use for Youtube Downloader, but he can to use for frame to execute difference Perl algoritms or Web spiders. 
This framework is created for personal needes . Some of functionalities may be adopted for the security hole. 
Тhe need for this system is to use a local server for smart home, it is not intended for public access. However, it can be set part of it be used for public access (via routings)


Two frameworks is currently uneder construction and i work on it in my free time.


PHP framework documentation: 
  Routing: 
    We have currently 5 request methods : GET, POST, DELETE, UPDATE and CONSOLE.
    first 4 is standart request from Rest API, the 5 method is use for execute a files on diferent languages by terminal execution .
     
    The structure of rutinga is as follows:

$routes = array(
array("GET","home", "home@index"),
);
in the function all_routes in the file URroutes.php
There is an array $routes which contains in each sub array as an array is different. Under the structure of these arrays is as follows:
the first element corresponds to the type of request, the second corresponds to the specified URL, and the third corresponds to any controller and which leads to formulas (home-index-controller function in the controller).
When the rutingi syntax is as follows: the first item shows that the group is the second link that leads to the group, and the third for routingite who are in this group.

As parameters in the urlto there are a few rules for submitting data:
{}-Add 1 value;
{}? -Add 1 value, but the value might be missing;
{[]}-add some values (such as elements of an array)
in each place the expression opredenelo the name of a variable that is passed to the value given by the URL. Example {id}?
TO DO : UPDATE and CONSOLE methods is currently on under construction
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––
      Controllers and models:
To create the controller and the model is implemented in the console command php URterminal.php create controller name of the controller,
This creates the controller and the model with the given name and the necessary nasledâvaniâ and its functionalities.
The controller class inherits from BaseConroller which takes care of calling a model which complies with the class, as well as the various views and calls their submission of variables.
TO DO: in the future you need to put the possibility of calling the other models to the given class as well as to create a configuration file for various options such as debging fashion to Smarty, Smarty and caching in the life cycle

The call for a view of the controller:
self::View('index', $view);
as the index is a file that is called $view and is an array of parameters that are submitted. Example: $view = array (' users ' = $users > [' query '], ' pages ' = $users > [' pages ']);

calling a function from the model's with the following syntax:
$this-db-> > function you need;
Example:
$user = $this->db->getUserInfo($_GET['id']);

Model:
The model basically inherited the library of databases which allows for easy display and use of the various functions of this library.
TO DO: score a library for working with MongoDB and configures to the models

_______________________________________________________________________________________________________________________________________


   Terminal.php
URTerminal.php is designed to perform various functions by means of the Terminal. The main two are the creation of files for the databases and their implementation as well as performances and testing of different scripting algorithms.

Migrations: for the easy creation of tables in the Msql, you can create a file with the parameters of the table that you want, and you can modify or delete it. Migrations also are a convenient way of transferring tables from one database type to another.
Creating such a file through command: create login mysql URterminal.php this will create a file in a folder migration with the following content:
 
    <?php
			function tableConfig (){
				$table = array(
					'dropTable' => 'login',
					'engine' => 'MyISAM',
					'encoding' => 'utf8',
					'columns'=> array(
						'id' => array(
							'type' => 'int',
							'size'=> 10,
							'autoIncrement' => 1,
							'notNull'  => 1,
							'primaryKey'  => 1,
							'unsigned'  => 1
						),
						'username' => array(
							'type' => 'varchar',
							'size'=> 100,
							'autoIncrement' => 0,
							'notNull'  => 1,
							'primaryKey'  => 0,
							'unsigned'  => 0
						),
						'password' => array(
							'type' => 'varchar',
							'size'=> 10,
							'autoIncrement' => 0,
							'notNull'  => 1,
							'primaryKey'  => 0,
							'unsigned'  => 0
						)
					)
				);
			return $table;
			}
      This is a sample content in order to facilitate the use of this approach in the array $table there are a few under the array encoding engine dropTable columns. dropTable is designed to delete if there is already a table created with this name, engine is engine that will work with the table, encoding is encoding which will use the table columns contain a 1 in the array for each column of hers. Example of element with ID columns username, this ID is the name of the column in the array are contained under the username its specifics:
' type ' = > data type of the column
' size ' = > size allowed for values in this column
' autoIncrement ' = > 0 = No 1 = Yes,
' notNull ' = > 0 = No 1 = Yes,
' primaryKey ' = > 0 = No 1 = Yes,
' unsigned ' = > 0 = No 1 = Yes

IMPORTANT!!! It is not allowed to have more than 1 column for which the autoIncrement is equal to 1;

TO DO: terminal.php mysql update table

migrate mysql table URterminal.php: once created the file migration with implementation of this command is executed SQL query that creates the table in the file with the given parameters.

mysql table URterminal.php delete: Deletes a command which the command permanently;
IMPORTANT!!! the command deletes the query directly. TO DO: it is good to put an additional question on the implementation of this request



URterminal.php root.pl www.google.bg script 1: this command invokes any file is submitted and pass the parameters after the name of the file. An example of a Terminal on the same perl function call file 1 root.pl www.google.bg, convenient for testing of different scripts.
IMPORTANT!!! At the time the command executes only Perl files which are located in the folder PerlScripts. Due to the presence of a framework that takes care of the implementation of the various Perl scripts. In the future this command is subject to change so as to include a similar framework and Python need for direct communication with the hardware elements
