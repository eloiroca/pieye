#!/bin/bash

# FAREM LES CONSULTES DELS ESTATS DELS SERVEIS
OUTPUT="$(date)"
USR=$(sudo service apach2 stop)


# headers
echo "Content-type: text/plain"
echo ""

# body
echo "Today is $OUTPUT"
echo "Current user is $USR"
