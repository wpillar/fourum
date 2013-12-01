Vagrant.configure("2") do |config|

    # Box
    config.vm.box = 'precise64'
    config.vm.box_url = 'http://files.vagrantup.com/precise64.box'

    config.vm.provider :virtualbox do |vb|
        vb.customize ["modifyvm", :id, "--memory", "1024"]
    end

    # Network
    config.vm.network "forwarded_port", guest: 80, host: 8080
    config.vm.network :private_network, ip: "192.168.33.10"

    # Shared folders
    # config.vm.synced_folder '/Users/Will/git/fourum', '/srv', id: "vagrant-root",
    #     :owner => "vagrant",
    #     :group => "www-data",
    #     :mount_options => ["dmode=777","fmode=777"]
    config.vm.synced_folder '/Users/Will/git/fourum', '/srv', nfs: true

    # Provisioning
    config.vm.provision :shell, :inline => "apt-get update --fix-missing"
    config.vm.provision :shell, :inline => "apt-get install -q -y make git curl"
    
    config.vm.provision :chef_solo do |chef|
        chef.cookbooks_path = "cookbooks"
        chef.add_recipe "apache2"
        chef.add_recipe "mysql"
        chef.add_recipe "mysql::server"
        chef.add_recipe "php"
        chef.add_recipe "php::module_apc"
        chef.add_recipe "php::module_curl"
        chef.add_recipe "php::module_mysql"
        chef.add_recipe "apache2::mod_php5"
        chef.add_recipe "apache2::mod_rewrite"
        chef.add_recipe "fourum"
        chef.json = {
            "mysql" => {
                "server_root_password" => "root",
                "server_repl_password" => "root",
                "server_debian_password" => "root"
            },
            "fourum" => {
                "database" => "fourum",
                "hostname" => "fourum.dev",
                "fqdn" => "www.fourum.dev"
            }
        }
    end

    config.vm.provision :shell, :inline => "apt-get -y install php5-mcrypt"
    config.vm.provision :shell, :inline => "curl -s https://getcomposer.org/installer | php"
    config.vm.provision :shell, :inline => "mv ./composer.phar /usr/local/bin/composer"

end
