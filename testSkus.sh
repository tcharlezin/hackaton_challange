#!/usr/bin/env bash

####################################################
####                    USAGE                   ####
#
# put sku list inside a file called "testSkulist.txt"
#
# run `bash testSkus.sh`
#
####################################################

cat testSkulist.txt | while read line; do
    RESPONSE=$(curl --location --request GET \
        'http://localhost:8088/api/recommend?code='$line)
    echo $RESPONSE;
done
