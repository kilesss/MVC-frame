#!/usr/bin/perl
package youtube;
use LWP::Simple;
use Data::Dumper;
use lib qw(/opt/lampp/htdocs/frame/PerlScripts/sys/database);
use databaseClass;

sub new
{
	my $class = shift;
	return true

}

#type : 1 download current link,
# 	2 download all sugestion menu , 
# 	3 download all songs from artist (searchmenu 3 pages), 
# 	4 download playlist, 
# 	5 check my liked videos


sub index{
my $filename = shift;
my $param = shift;
my %parametyrs = %{$param};
my $type = $parametyrs{type};
if ($type == 1){
	SingleDuwnload($parametyrs{link},$parametyrs{path});
}elsif($type == 2){
	SugestionMenuDuwnload($parametyrs{link},$parametyrs{path});
}elsif($type == 3){
	AllSongsArtistDuwnload($parametyrs{link},$parametyrs{path});
}elsif($type == 4){
	PlaylistDuwnload($parametyrs{link},$parametyrs{path});
}elsif($type == 5){
	MyLikedVideosDuwnload($parametyrs{link},$parametyrs{path});
}

}
sub changeDownloadFilesPath{
	my $path = shift;
	my $folder = shift;
	$folder = lc($folder);
	my $fullPath = $path.$folder;
	
	if (-e $dir and -d $dir) {
		print "SPOON :)\n";
	} else {
		chdir($path);
		`mkdir $folder`;
		my ($frameDir) = $path =~ m/(\S+\/)\S+(?:\/)?/isg;
		chdir($frameDir);
	}
	`mv *.mp3 $fullPath`;
}

sub SingleDuwnload(){
	my $link = shift;
	my $path = shift;
	CheckIndex($link,$path);
	
# 	changeDownloadFilesPath($path);
}
sub SugestionMenuDuwnload(){
	my $link = shift;
	my $path = shift;

	my $body = `curl $link`;
	while ($body =~ m/<li class="video-list-item related-list-item.*?>.*?<a\s*href=.\/(watch\S*)"\s*class="yt-uix-sessionlink\s*content-link spf-link/isg){
	my $fullLink = "https://www.youtube.com".'/'.$1;
	CheckIndex($fullLink);
	}
		changeDownloadFilesPath($path);	

}
sub AllSongsArtistDuwnload(){
	my $link = shift;
	my $path = shift;
	$link =~ s/ /\+/isg;
	my $body = `curl https://www.youtube.com/results?search_query=$link`;
	if ($body =~ m/<a\s*href=.(\/watch\S*list\S*)[\'\"]\s*class=[\'\"]yt-uix-sessionlink\s*watch-card-collage\s*spf-link\s*[\'\"]/isg){
		my $playlist = "https://www.youtube.com$1";
		print $playlist."\n++++++++++++++++++++++++\n";
				PlaylistDuwnload($playlist,$path);

	}else {
		print "Nothing Found";
	}
}
sub PlaylistDuwnload(){
	my $link = shift;
	my $path = shift;
	my $body = `curl '$link' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8' -H 'Accept-Encoding: utf8' -H 'Accept-Language: en-GB,en;q=0.5' -H 'Connection: keep-alive' -H 'Host: www.youtube.com' -H 'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0'`;
	my $lastSong = '';
	while ($body =~ m/<a\s*href=[\'\"](\S*)[\'\"]\s*class="yt-uix-sessionlink\s*spf-link\s*playlist-video\s*clearfix\s*spf-link\s*"/isg){
		my $song = "https://www.youtube.com".$1;
		print $song."\n\n";
		my $lastSong = $song;
			CheckIndex($song);

	}
	my $body2 = `curl $lastSong`;
	while ($body2 =~ m/<a\s*href=[\'\"](\S*)[\'\"]\s*class="yt-uix-sessionlink\s*spf-link\s*playlist-video\s*clearfix\s*spf-link\s*"/isg){
		my $song2 = "https://www.youtube.com".$1;
		CheckIndex($song);

	}
			changeDownloadFilesPath($path);	

}
sub MyLikedVideosDuwnload(){
	my $link = shift;
	my $path = shift;

}
sub StartDownload {
	my $link = shift;
	
		my $t = `youtube-dl --extract-audio --audio-format mp3 $link`;
		my ($percent,$size, $name) = $t =~ m/\[download\]\s*(\d+)\%\s*of\s*(\d+\.\d+).*?\[\S*\]\s*destination:\s*(.*?mp3)/isg;
		my ($artist, $song ) = $name =~ m/(.*?)\s+\-\s+(.*?)\.mp3/isg;
		$artist =~ s/(?:^\s*|\s*$)//isg;
		$song =~ s/(?:^\s*|\s*$)//isg;
		$name =~ s/(?:^\s*|\s*$)//isg;
		my $directory =  $artist;
		$directory =~ s/(?:^\s*|\s*$)//isg;
		$directory =~ s/ /_/isg;
		
		$artist =~ s/ /_/isg;
		$song =~ s/ /_/isg;
		$name =~ s/ /_/isg;
		$directory =~ s/ /_/isg;

		$param{'artist'}= $artist;
		$param{'song_name'}=$song;
		$param{'all_name'}=$name;
		$param{'directory'}=$directory;
		$param{'last_played'}=" 20161130105223";
		$param{'rating'}="0";
		$db = new databaseClass('base_youtube','insert',\%param,"");
		my @returnHAsh =($t,$directory);
# 		$returnHAsh[0] = $t;
# 		$returnHAsh[1] = $directory;
		return @returnHAsh;
	
}

sub CreateIndex {
	my $link = shift; 
	
	 
	my $filename = '/opt/lampp/htdocs/frame/PerlScripts/sys/youtube/SongIndex.txt';
	open(my $fh, '>>', $filename) or die "Could not open file '$filename' $!";
	print $fh "\n".$link;
	close $fh;
}

sub CheckIndex {
	my $link = shift; 
	my $path = shift; 
	my $filename = '/opt/lampp/htdocs/frame/PerlScripts/sys/youtube/SongIndex.txt';
	open(my $fh, '<:encoding(UTF-8)', $filename)or die "Could not open file '$filename' $!";
 
	while (my $row = <$fh>) {
		chomp $row;
		my $isExist = 0;
		if ($row eq $link){
			$ifExist = 1;
		}
	}
	if ($ifExist == 0){
		my @result = StartDownload($link);
			changeDownloadFilesPath($path,$result[1]);
		if ($result[0] eq ''){
		}else {
			logfile($result[0]);
		}
		CreateIndex($link);
		return $result;

	}else {
		print "The link is alreadyy downloaded! \n";
	}
}

sub logfile {
	my $link = shift; 
	
	my $filename = '/home/kilesss/Desktop/frame/sys/youtube/LOGFILE.txt';
	open(my $fh, '>>', $filename) or die "Could not open file '$filename' $!";
	print $fh $link."\n\n\n++++++++++++++++++++++++++++++++++++++++++++++\n\n";
	close $fh;
}

1;
