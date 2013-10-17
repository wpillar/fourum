include_recipe "database::mysql"
include_recipe "apache2"

mysql_database node['fourum']['database'] do
    connection  ({:host => 'localhost', :username => 'root', :password => node['mysql']['server_root_password']})
    action :create
end

web_app "fourum" do
	cookbook "apache2"
  	server_name node['fourum']['hostname']
  	server_aliases [node['fourum']['fqdn'], "www.fourum.dev"]
  	docroot "/srv/public"
  	directory_index ["index.html", "index.php"]
  	allow_override "all"
end