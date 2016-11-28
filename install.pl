#!/bin/perl

system('sudo apt-get install autoconf build-essential -y');
system('sudo cpan YAML:Tiny');

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
    system('sudo apt-get install mysql-server php-mysql -y');
    system('sudo mysql -u root < '.$sql."fix.sql");
    system('mysql -u root < '.$build.$mainSQL);


#-----------------------------------------    Frontend   -------------#

#       Install php libs
    system('sudo apt-get install composer -y');
    system('sudo apt-get install php-mbstring -y');
    system('sudo apt-get install php-curl -y');

    system('composer install');

#       Install assets
    system('sudo apt-get install npm -y');
    system('sudo npm install bower -g');
    system('sudo ln -s /usr/bin/nodejs /usr/bin/node');
    system('bower install');

#       Install sellenium
    system('sudo npm install selenium-standalone@latest -g');
    system('sudo selenium-standalone install');

#       Start server
    system('cd web && php -S localhost:9000');
