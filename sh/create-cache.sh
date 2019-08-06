#!/bin/bash
output="{"
for UNIT in example1 example2 minecraft@survival factorio@experimental ; do
    status=$(systemctl status "$UNIT" | grep '^\s*Active')
    output="$output\"$UNIT\":\"${status#* }\",\n"
done
output=${output::-3}
output="$output}"
echo -e $output > "/var/www/example.com/html/status/cache.json"