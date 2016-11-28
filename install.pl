#!/bin/perl

use YAML::Tiny;

use strict;
use warnings;


#
#       Config:
#

    my $yaml = YAML::Tiny->read( 'config/parameters.yml' );
    my $baseName  = $yaml->[0]->{config}->{base};

#
#       Catalogs structure:
#

    my $build = "build/";
    my $sql = "sql/";
    my $mainSQL = "main.sql";

#
#       Script:
#


#-----------------------------------------    Database   -------------#

#       Prepare catalog
    system('mkdir -p '.$build);

#       Read file with mysql
    my $content;
    open(my $fh, '<', $sql.$mainSQL) or die "cannot open file";
    {
        local $/;
        $content = <$fh>;
    }
    close($fh);

#       Replace database name by name from config
    $content =~ s/database_name/$baseName/g;

#       Save file with correct db name
    open($fh, '>', $build.$mainSQL) or die "Could not open file' $!";
    {
        print $fh $content;
    }
    close $fh;

#       Execute file
    system('mysql -u root < '.$build.$mainSQL);


#-----------------------------------------    Frontend   -------------#

#       Install assets
    system('bower install');

#       Start server
    system('cd web && php -S localhost:8000');