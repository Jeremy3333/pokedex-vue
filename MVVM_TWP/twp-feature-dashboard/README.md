# Trello WordPress


## Installation

### Install Wordpress Website
Open a terminal in your */var/www/html* folder. Be sure your than apache web server is running by visiting [your localhost](http://localhost/).

Then down download the wordpress package and install it by using the following commands:
```
sudo wget https://wordpress.org/latest.tar.gz
sudo tar -xzvf latest.tar.gz
sudo chown $USER:$USER wordpress
```

Go on your [phpmyadmin](http://localhost/phpmyadmin/index.php) using your own login method (do not use root, please). In phpmyadmin:

* Create a new database for your API, with empty tables, using **utf8mb4_general_ci** encoding.
* Click the phpMyAdmin icon in the upper left to return to the main page, then click the Users tab.
* Click the Edit privileges icon on the user you’ve just created for WordPress.
* In the Database-specific privileges section, select the database you’ve just created for WordPress under the Add privileges to the following database dropdown, and click Go.
* The page will refresh with privileges for that database. Click Check All to select all privileges, and click Go.
* On the resulting page, make note of the host name listed after Server: at the top of the page. (This will usually be localhost.)

Now, visit http://localhost/wordpress/wp-admin/install.php, and enter the fields corresponding to your database and user informations.

If the wp-config.php file is not automaticaly created, do it in your wordpress root directory.

Relaunch [the php file](http://localhost/wordpress/wp-admin/install.php) for installation, and complete the information for your api website.

Your wordpress website should be now implemented. You can verify it by accessing to the [adminstration page](http://localhost/wordpress/wp-admin/).

### Install Wordpress API
Now, go to your /var/www/html/wordpress/wp-content/plugins folder in a terminal, using the following command
```
cd /var/www/html/wordpress/wp-content/plugins
```

Download the rest-api wordpress using wget, and unzip it:
```
wget https://downloads.wordpress.org/plugin/rest-api.2.0-beta15.zip
unzip rest-api.2.0-beta15.zip
```

Check if there is a rest-api folder. Now, go on your wordpress administration page, then go to **Plugins > Installed Plugins** and activate **WP REST API**.

You should be able now to have the following result by using the command:
```
curl -i "http://localhost/wordpress/wp-json"  --head
```
**Result:**

```
HTTP/1.1 200 OK
Date: Tue, 15 Dec 2020 10:58:03 GMT
Server: Apache/2.4.41 (Ubuntu)
X-Robots-Tag: noindex
Link: <http://localhost/wordpress/wp-json/>; rel="https://api.w.org/"
X-Content-Type-Options: nosniff
Access-Control-Expose-Headers: X-WP-Total, X-WP-TotalPages, Link
Access-Control-Allow-Headers: Authorization, X-WP-Nonce, Content-Disposition, Content-MD5, Content-Type
Allow: GET
Content-Type: application/json; charset=UTF-8
```

### Project setup

First, you'll have to clone then install all dependencies own by this project by using

```
npm install
```

If you want to create your own Vue.js Application, use the following commands, to install the project and dependencies:

```
vue create [project_name]
cd [project_name]
npm install vue-router vuex vuedraggable bootstrap-vue
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Lints and fixes files
```
npm run lint
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).
