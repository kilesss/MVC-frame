use lib qw(/opt/lampp/htdocs/frame/PerlScripts/sys);

use root;
use Data::Dumper;
#   $file => full path to file 
# $delay => delay time before file is execute for no delay set 0
#parammetyrs for File 
#cron_job

##########___PARAMETYRS FOR YOUTUBE_____#######
#type : 1 download current link, 2 download all sugestion menu , 3 download all songs from artist (searchmenu 3 pages), 4 download playlist, 5 check my liked videos
# link : start point it cann be one song playlist searchmenu or others
#path download folder
my %parametyrs = (
        'type'  => $ARGV[0],
        'link' => $ARGV[1],
		'path'=>"/home/kilesss/Desktop/frame/youtube_songs/"
    );

    my %cron_job = (
        apple  => "red",
        orange => "orange",
        grape  => "purple",
    );
    my %config = (
		config_log => 1,
		config_script => 'youtube',
		config_DB => 0
    );
    
# $object = new root(filename,delay,\%parametyrs, \%cron_job,\%config);
$object = new root('try',1,\%parametyrs, \%cron_job,\%config);
$object->delayTime();
$object->loadFile();
# 1;
