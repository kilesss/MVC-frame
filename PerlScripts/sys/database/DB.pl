
use databaseClass;
my %param;
# 
# $param{'id'}= "42";
$param{'artist'}= "42";
$param{'song_name'}="tvoqta nova";
$param{'all_name'}="42 -tvoqta nova";
$param{'directory'}="42";
$param{'last_played'}=" 20161130105223";
$param{'rating'}="5";
$db = new databaseClass('base_youtube','insert',\%param,"id > 1");







