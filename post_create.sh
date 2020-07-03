#!/bin/bash
mv  tmp/public/assets ./public/
mv  tmp/root/bi ./
mv  tmp/src/src ./
rm -rf tmp
cp ./src/.env.example ./src/.env
cat post_update.txt > post_update.sh
exit
