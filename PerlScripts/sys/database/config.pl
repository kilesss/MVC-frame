use Data::Dumper;
sub config{
	my %conf = {};
	$conf{'driver'}='mysql'; 
	$conf{'database'}='teste';
	$conf{'dsn'}='DBI:'.$conf{'driver'}.':database='.$conf{'database'};
	$conf{'userid'}='root';
	$conf{'password'}='qwerty';
	return %conf;
}
1;