# Linux Service Status

This is designed to print the status of designated Ubuntu services on a simple webpage.

![Screenshot](https://i.imgur.com/lXu98EU.png "Screenshot")

## Requirements

- Ubuntu/Linux
- PHP
- Apache

## Setup/Usage

1. Update the `sh/create-cache.sh` file, designating the services you want to monitor (see the following line):

```bash
for UNIT in example1 example2 minecraft@survival factorio@experimental ; do
```

2. Update the `sh/create-cache.sh` file, designating the web directory you will save the service-status cache to (see the following line):

```bash
echo -e $output > "/var/www/example.com/html/status/cache.json"
```

3. Create a symlink from `/usr/local/bin/create-cache.sh` to your status page directory. For example:

```bash
ln -s /var/www/example.com/html/status/sh/create-cache.sh /usr/local/bin/create-cache.sh 
```

4. Use `crontab -e` to create a schedule for the `create-cache.sh` script. The following example runs every minute:

```bash
*/1 * * * * /usr/local/bin/create-cache.sh
```

5. Set appropriate permissions:

    - the `/sh/` directory: `...`
    - `...`

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)

