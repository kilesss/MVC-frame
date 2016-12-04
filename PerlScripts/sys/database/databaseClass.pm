#!/usr/bin/perl 
package databaseClass;
use Data::Dumper qw(Dumper);
use Module::Load;
use DBI;
use strict;

# table => table name hwere you use
# method => insert, select, update, delete (actually this call to needed function )
# parametyrs => it will be quer or hash 
### for parametyrs Hash: 
###		insert : key is colum in mysql values is values where we want to insert
###		select: the keys is needed colum names the values is dont have any metters what is 
###		update:  key is colum in mysql values is values where we want to update
###		delete: the keys is needed colum names the values is dont have any metters what is 
# method query is free query 
sub new    
{
    my $class = shift;
    my $self = {
        _table => shift,
        _method  => shift,
        _parametyrs  => shift,
        _where =>shift
    };
    
    
    

		require 'config.pl';
		my %conf = config();

 my $dbh = DBI->connect($conf{'dsn'},$conf{'userid'},$conf{'password'}) or die $DBI::errstr;
if ($self->{_method} =~ m/insert/isg){
insertQuery(\%conf,$self->{_table},$self->{_parametyrs});
}elsif($self->{_method} =~ m/select/isg){
my @t = selectQuery(\%conf,$self->{_table},$self->{_parametyrs},$self->{_where});
die Dumper(@t);
}


    bless $self, $class;
    return $self;
}
# 
sub insertQuery{
		my $c = shift;
	my $table = shift;
	my $p = shift;
	my %config = %{$c};
	my %parametyrs	 = %{$p};
	my $query = "INSERT INTO ".$config{'database'}."\.$table (";
	my $values = "";
	my $questions = "";
	my $questions2 = "";
	my @arrValues ;
	my $count = 0;
	while (my ($key, $value) = each (%parametyrs)){
		$query .=$key.',';
		$questions .='\''.$value.'\',';
		$arrValues[$count] = $value;
		$count ++;
	}
	$query .= ") values ($questions);";
	$query =~ s/,\)/\)/isg;
	print $query."\n\n";
	my $dbh = DBI->connect($config{'dsn'},$config{'userid'},$config{'password'}) or die $DBI::errstr;
	my $sth = $dbh->prepare($query);
	$sth->execute 	or die $DBI::errstr;
	$sth->finish();
	$dbh->commit;
	}
sub selectQuery{
 	my $c = shift;
	my $table = shift;
	my $p = shift;
	my $where = shift;
	my %config = %{$c};
	my %parametyrs	 = %{$p};
	my $query = "SELECT ";
		while (my ($key, $value) = each (%parametyrs)){
			$query .= "$key,";
		}
	$query .= " FROM ".$config{'database'}."\.$table where $where";
	$query =~ s/,\s*FROM/ FROM/;
 	my $dbh = DBI->connect($config{'dsn'},$config{'userid'},$config{'password'}) or die $DBI::errstr;

 	my $sth = $dbh->prepare($query);
 	$sth->execute() or die $DBI::errstr;
 	my ($key) = $where =~ m/^\s*(\S+)\s*\D/isg;
 	my @row = $sth->fetchall_hashref($key);
 	
 	$sth->finish();
 	return @row
 }
 
 
#sub update{
# 
# 	$sex = 'M';
# 	my $sth = $dbh->prepare("UPDATE TEST_TABLE
# 							SET   AGE = AGE + 1
# 							WHERE SEX = ?");
# 	$sth->execute('$sex') or die $DBI::errstr;
# 	print "Number of rows updated :" + $sth->rows;
# 	$sth->finish();
# 	$dbh->commit or die $DBI::errstr;
#  }
#  sub delete{
#  
#  $age = 30;
#  my $sth = $dbh->prepare("DELETE FROM TEST_TABLE
#                          WHERE AGE = ?");
#  $sth->execute( $age ) or die $DBI::errstr;
# print "Number of rows deleted :" + $sth->rows;
# $sth->finish();
# $dbh->commit or die $DBI::errstr;
# }
# 
# 
# sub query{
# 	my( $self ) = @_;
# 	sleep($self->{_delay});
# }
 1;
