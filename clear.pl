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

#       remove database
    system('head -n 1 '.$build.$mainSQL.' | mysql -u root');

#       remove build and external packages
    system('rm -rf '.$build);
    system('rm -rf '.'web/bower_components');
    system('rm -rf '.'vendor');
