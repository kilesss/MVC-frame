A few words about the project: This is a framework that was created in the likeness of laravel 4, it is a personal project for the remote control of my apartment. Its feature is the ability to communicate with the second Raspberry Pi server (which communicates with various sensors and arduino in place). Moreover, the aims of the different functionalities for which need to use the Web Spiders, such as:
Youtube downloader-system that can download songs from Youtube and saves them in local server implementation. This system can download song from submitted a link to download the whole playlist, to search for songs by artist name and submitted or to check for a certain period of time for new songs on preset and pages.
Cooking-Helper > aims to help you find what to cook. The script gets the specified ingredient or his type of âstoie checks a local database for recepri used in the past that are displayed first, if the user does not find desired by him, provides him with a key already prepared a list of recipes under the specified parameters already which is borrowed from several culinary site. When choosing a recipe from an external source it is added to the database.
Wether News and algorithm-its purpose is to provide the user with up-to-date weather forecast and the latest news from selected sources.
This is my version of PHP MVC Framework , it’s very similar to the laravel 4+ framework. Inside I have placed one simple framework written in Perl, currently in use for Youtube Downloader, but it can also be used for frame to execute different Perl algorithms or Web spiders. This framework was created for personal use. Some of functionalities may be taken as a hole in the security. The requirements for this system is to use a local server for a smart home, it is not intended for public access. However, some parts of the framework can be used for public access (via routings)
Two frameworks are currently under construction and I am working on them in my free time.
PHP framework documentation: Routing: We have currently 5 requested methods: GET, POST, DELETE, UPDATE and CONSOLE. The first 4 are standard requests from Rest API, the 5th method’s use is to execute files in different languages using terminal execution.
The structure of rutinga is as follows:
$routes = array( array("GET","home", "home@index"), ); in the function all_routes in the file URroutes.php There is an array $routes which contains in each sub array as an array is different. Under the structure of these arrays is as follows: the first element corresponds to the type of request, the second corresponds to the specified URL, and the third corresponds to any controller which leads to formulas (home-index-controller function in the controller). When the routes syntax is as follows: the first item shows that the group is the second link that leads to the group, and the third for routing which are in this group.
As parameters for the URL there are a few rules for submitting data: {}-Add 1 value; {}? -Add 1 value, but the value might be missing; {[]}-add some values (such as elements of an array) in each place the expression defines the name of a variable that is passed to the value given by the URL. Example {id}? TO DO : UPDATE and CONSOLE methods are currently under construction ––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––– 
Controllers and models: To create the controller and the model the command is implemented in the console php URterminal.php to create a controller name of the controller. This creates the controller and the model with the given name and its necessary functionalities. The controller class inherits from BaseConroller which takes care of calling a model which complies with the class, as well as the various views and calls their submission of variables. 
TO DO: In the future there will need to be the option of being able to call the other models in the given class as well as the possibility to create a configuration file for various selections such as debugging fashion to Smarty, Smarty and caching in the life cycle
The call for a view of the controller: self::View('index', $view); as the index is a file that is called $view and is an array of parameters that are submitted. Example: $view = array (' users ' = $users > [' query '], ' pages ' = $users > [' pages ']);
calling a function from the model's with the following syntax: $this-db-> > function you need; Example: $user = $this->db->getUserInfo($_GET['id']);
Model: The model basically inherited the library of databases which allows for easy display and use of the various functions of this library. TO DO: score a library for working with MongoDB and configures to the models

Terminal.php URTerminal.php is designed to perform various functions by means of the Terminal. The main two are the creation of files for the databases and their implementation as well as performances and testing of different scripting algorithms.
Migrations: for the easy creation of tables in the Msql, you can create a file with the parameters of the table that you want, and you can modify or delete it. Migrations also are a convenient way of transferring tables from one database type to another. Creating such a file through command: create login mysql URterminal.php this will create a file in a folder migration with the following content:
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
' type ' = > data type of the column ' size ' = > size allowed for values in this column ' autoIncrement ' = > 0 = No 1 = Yes, ' notNull ' = > 0 = No 1 = Yes, ' primaryKey ' = > 0 = No 1 = Yes, ' unsigned ' = > 0 = No 1 = Yes
IMPORTANT!!! It is not allowed to have more than 1 column for which the autoIncrement is equal to 1;
TO DO: terminal.php mysql update table
migrate mysql table URterminal.php: once created the file migration with implementation of this command is executed SQL query that creates the table in the file with the given parameters.
mysql table URterminal.php delete: Deletes a command which the command permanently; IMPORTANT!!! the command deletes the query directly. TO DO: it is good to put an additional question on the implementation of this request
URterminal.php root.pl www.google.bg script 1: this command invokes any file that is submitted and passes the parameters to the end of the file name. An example of a Terminal on the same perl function calls file 1 root.pl www.google.bg, which is convenient for testing different scripts. IMPORTANT!!! At the time the command executes only Perl files which are located in the folder PerlScripts. Due to the presence of a framework that takes care of the implementation of the various Perl scripts. In the future this command is subject to change so as to include a similar framework and Python need for direct communication with the hardware elements
