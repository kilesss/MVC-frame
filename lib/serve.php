                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <?php
include_once 'RoutesControllers.php';
$requestUnpars = explode("?", $_SERVER['REQUEST_URI']);
$requestURI = explode('/', $requestUnpars[0]);
$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);


// Print the entire match result
for ($i= 0; $i < sizeof($scriptName); $i++)
{
    if ($requestURI[$i] == $scriptName[$i])
    {
        unset($requestURI[$i]);
    }
}

$command = array_values($requestURI);
$rout = new RoutesControllers($command);


