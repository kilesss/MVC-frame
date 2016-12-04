
sub checkHash {
   my $shift = shift;
	if ($shift != 0){
		my %hash = %$shift;
		return 1;
	}else {
		return 0;
	}
}
1;