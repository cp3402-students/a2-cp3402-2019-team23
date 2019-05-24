# The Coffee Can
## Contributors
* [Bao Tran](https://github.com/bao-tran "@bao-tran")
* [Nathan Marson](https://github.com/NathanMarson "@NathanMarson") 
* [Emerson Baria](https://github.com/emersonbaria "@emersonbaria")
* [Nandeesh Bhujanga](https://github.com/nandeeshsb "@nandeeshsb")
* [Aidan Kayrooz](https://github.com/aidank01 "@aidank01")

## Sites
* Staging: <http://13.211.132.120>
* Production: <http://13.239.133.7>

## Developing for Wordpress
Before we get started developing, you need to have a Local Development Environment with Wordpress installed. [WPDistillery](https://github.com/flurinduerst/WPDistillery) is a good example and easy to set up for beginners.

This repository was developed to be a replacement for the wp-content folder that resides within the Wordpress file structure. The wp-content folder is where all of the plugins, themes and media uploads are stored. It will not clone the database onto your local machine but that will not be required to continue development on the theme.

### Setup
1. Navigate to the Wordpress file structure on your Local Development Environment and open up command line.
2. Run the command ```rm -rf wp-content``` to delete the base install wp-content folder.
3. Run the command ```git clone https://github.com/cp3402-students/a2-cp3402-2019-team23 -b develop wp-content``` to clone the develop branch of the repository into your Wordpress file structure and rename it to wp-content.
4. Go to the wp-admin page on your Local Development Environment and activate the theme.

### Committing Changes
Once you are happy with the changes you have made, follow these steps:

1. ```git add .``` to add all changed and new files. Make sure only useful files are committed.
2. ```git commit -m "Insert commit message here"``` make sure the commit message is descriptive and accurate to ensure others can understand what you have changed.
3. ```git push -u origin develop``` to push the committed files to the develop branch.

## Deploying
Our deployment strategy employs the use of webhooks to keep the sites up to date with the repository, replacing the wp-content folder on the servers. The develop branch replaces the folder on the staging server while the master branch replaces the folder on the production server. 

The content of the site is controlled through the use of the wp-sync-db plugin to push and pull the database between the servers and Local Development Environments. 