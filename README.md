## WordPress Environment Config

* Set up WordPress wp-config.php file outside of document root.
* Environments include local, dev and prod.
* Database credentials for each environment.
* WP_DEBUG for local and dev environments.
* Disallow file editing in dev and prod envrionments.
* Limit DB revisions to 3.

#### Environments

Looks for the following subdomains:

* local
* dev
* none of the above defaults to live (www or non www)
