# _Onzeur_

_Onzeur_ is a **locally** hosted **music player**.
It is access via a **web page** and use a **database** to store the music, playlist and so on.

_Onzeur_ has been made in follow-up of a **student project** in **engineering school**.

# Functionalities
### User
- Authentication using email and password
- Changing user information
- Store the last 10 played musics
- Create Playlist
### Search
- By artist
- By album
- By music
### Music
- Button more information

# Setup the linux machine

### Update
- `sudo apt-get update`
- `sudo apt-get upgrade`

### Install apache2
- `sudo apt-get install apache2`
- `sudo nano /etc/php/8.0/apache2/php.ini`

Uncomment the plugin related to the desired database. For postgresql `pdo_pgsql` and `pgsql`


### Install postgresql or other database
- `sudo apt-get install postgresql`
- `sudo vi /etc/postgresql/13/main/pg_hba.conf`

Change `peer` to `trust` on the lines `local all postgres` and `local all all`

### Install PHP 8.0
- `sudo apt-get install -y lsb-release ca-certificates apt-transport-https software-properties-common gnupg2`
- `echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/sury-php.list`
- `wget -qO - https://packages.sury.org/php/apt.gpg | sudo apt-key add -`
- `sudo apt-get update`
- `sudo apt-get install php8.0`

### Install module and configure
- `sudo apt-get install php8.0-pgsql`

- `sudo service postgresql restart`


# Create the database

### Connect as super user
- `psql -U postgres`

### Create the database with related role
- `CREATE ROLE jarvis LOGIN ENCRYPTED PASSWORD 'password';`
- `CREATE DATABASE onzeur OWNER jarvis;`
- Leave the database using `\q`

### Create the table
To create the table use the file `model.sql` which is in the dir `sql` with the command
- `psql -d onzeur -U jarvis -f model.sql`
### Fill the table
To fill the table use the file `data.sql` which is in the dir `sql` with the command
- `psql -d onzeur -U jarvis -f data.sql`

# Clone the repository in apache
### Install git
- `apt-get install git git-core`
### Clone the repository
- `cd /var/www/html`
- `git clone https://github.com/enchantuer/onzeur.git`

Now the server is all setup, the site host and the database fill with the initial data.