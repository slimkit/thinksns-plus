<?php

namespace Zhiyi\Plus\Bootstrap;

use Illuminate\Contracts\Foundation\Application;
use Zhiyi\Plus\Support\Configuration;

class LoadConfiguration
{
    protected $app;
    protected $configuration;

    /**
     * 加载�
     * �置构造方法.
     *
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function __construct(Application $app, Configuration $configuration)
    {
        $this->app = $app;
        $this->configuration = $configuration;
    }

    /**
     *  Run handler.
     *
     * @return void
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function handle()
    {
        static $loaded = false;
        if ($loaded) {
            return;
        }

        $this->app->config->set(
            $this->configuration->getConfigurationBase()
        );
    }
}
