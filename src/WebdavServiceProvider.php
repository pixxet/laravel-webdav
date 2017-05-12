<?php

namespace Iclass\Webdav;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use League\Flysystem\WebDAV\WebDAVAdapter;
use Sabre\DAV\Client as WebDAVClient;

class WebdavServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->make('filesystem')->extend(
            'webdav',
            function (Container $app, array $config) {
                $client = new WebDAVClient($config);
                $options = isset($config['curl_options']) ? $config['curl_options'] : [];
                foreach ($options as $key => $value) {
                    $client->addCurlSetting($key, $value);
                }
                $adapter = new WebDAVAdapter($client, $config['baseUri']);
                if (isset($config['url']) && method_exists($adapter, 'setUrlPrefix')) {
                    $adapter->setUrlPrefix($config['url']);
                }
                return new Filesystem($adapter);
            }
        );
    }

    public function register()
    {
    }
}
