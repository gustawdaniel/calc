#!/bin/perl

use YAML::Tiny;

use strict;
use warnings;

#
#       Config:
#

    my $yaml = YAML::Tiny->read( 'config/parameters.yml' );
    my $baseName  = $yaml->[0]->{config}->{base};
    my $user  = $yaml->[0]->{config}->{user};
    my $pass  = $yaml->[0]->{config}->{pass};
    my $host  = $yaml->[0]->{config}->{host};
    my $port  = $yaml->[0]->{config}->{port};

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
#    system('sudo mysql -u root < '.$sql."fix.sql");
    my $passSting = ($pass eq "") ? "" : " -p ".$pass;
    system('mysql -h '.$host.' -P '.$port.' -u '.$user.$passSting.' < '.$build.$mainSQL);

#       Start server
    system('cd web && php -S localhost:9000');
