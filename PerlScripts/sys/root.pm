#!/usr/bin/perl 
package root;
use Data::Dumper qw(Dumper);
use Module::Load;
use lib qw(/opt/lampp/htdocs/frame/PerlScripts/sys);
use functions;


sub new    # Tip __construktor v nego se dyrjat i methodite na clasa
{
    my $class = shift;
    my $self = {
        _file => shift,
        _delay  => shift,
        _parametyrs  => shift,
        _cron_job  => shift,
		_config  => shift,
    };

    if ($self->{_delay} > 0){
		delayTime($self->{_delay});
    }
    
    my $cronTest = checkHash($self->{_cron_job});
	if ($cronTest == 1){
	cron_job($self->{_cron_job});
	}
	
    bless $self, $class;
    return $self;
}

sub delayTime  {
	my( $self ) = @_;
	sleep($self->{_delay});
}
sub cron_job{
	my ($self) = @_;
# TO BE DONE

}


sub loadFile {
    my( $self ) = @_;
	eval {
		require '/opt/lampp/htdocs/frame/PerlScripts/programs/'.$self->{_file}.'/execute/test.pm';
		my $r = test->loadParametyrs($self->{_parametyrs},$self->{_config});
	} or do {
		my $error = $@;
		die Dumper($error);
		print "asdfasdasd \n\n\n";
	return $self->{_firstName};
	}
}
1;
