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
                $adapter = new WebDAVAdapter(new WebDAVClient($config), $config['baseUri']);
                if (isset($config['url']) && method_exists($adapter, 'setUrlPrefix')) {
                    $adapter->setUrlPrefix($config['url']);
                }
                return new Filesystem($adapter);
            }
        );
    }
}
