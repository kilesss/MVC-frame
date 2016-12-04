#!/usr/bin/perl
package test;
# use lib qw(/opt/lampp/htdocs/frame/PerlScripts/sys);
# use functions;
use Data::Dumper;

sub loadParametyrs    
{
my $fileNAme = shift; 
my $parametyrs = shift;
my $config = shift;
	
	executeScript($config,$parametyrs);
	return 1;
}

sub executeScript{
my $config = shift;
my $parametyrs = shift;

	eval{
		require '/opt/lampp/htdocs/frame/PerlScripts/programs/try/index.pl';

		my %password = script();
		my %config = config();

		#log : 1=> file , 2=> DB
		#script who script use returned hash
		#DB add values in DB

		#sub config{
		#	my %config = {};
		#	$config{'log'} = 1; 
		#	$config{'script'} = 'youtube';
		#	$config{'DB'} = 0;

		if ($config{'useScript'} == 1){
			require '/opt/lampp/htdocs/frame/PerlScripts/sys/'.$config{"script"}.'/'.$config{"script"}.'.pm';
			my $r = $config{"script"}->index($parametyrs);
			print $r;
		} 
	} or do {
		my $error = $@;
		die Dumper($error);
		return true;
	}

}

1;
