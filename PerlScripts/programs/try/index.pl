#! /usr/bin/env perl
use 5.10.1;
use warnings;
use Data::Dumper;

#log : 1=> file , 2=> DB
#script who script use returned hash
#DB add values in DB
#useScript : 1=> yes, 2 => no
sub config{
	my %config;
	$config{'log'} = 1; 
	$config{'useScript'} = 1;
	$config{'script'} = 'youtube';
	$config{'DB'} = 0;
	return %config;
}
sub script { 
my %color_of = (
    apple  => "red",
    orange => "orange",
    grape => "purple",
);
	return %color_of;
};


1;