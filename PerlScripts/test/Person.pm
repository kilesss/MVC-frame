#!/usr/bin/perl 
package Person;
use Data::Dumper qw(Dumper);
my $firstName2;
sub new    # Tip __construktor v nego se dyrjat i methodite na clasa
{
    my $class = shift;
    my $self = {
        _firstName => shift,
        _lastName  => shift,
        _ssn       => shift,
    };
    $firstName2 = $self->{_firstName};
    bless $self, $class;
    return $self;
}
sub setFirstName {
    my ( $self, $firstName ) = @_;
    $self->{_firstName} = $firstName if defined($firstName);
    return $self->{_firstName};
}

sub getFirstName {
    my( $self ) = @_;
    return $self->{_firstName};
}
1;