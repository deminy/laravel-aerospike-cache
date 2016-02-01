<?php
/**
 * This file is part of the deminy/laravel-aerospike-cache package.
 *
 * @copyright Copyright (c) Demin Yin <deminy@deminy.net>
 * @license   MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CrowdStar\Cache\Driver\Aerospike;

use Cache;
use Illuminate\Support\ServiceProvider;

/**
 * Laravel service provider for Aerospike Cache.
 *
 * @package CrowdStar\Cache\Driver\Aerospike
 * @author  Demin Yin <deminy@deminy.net>
 */
class AerospikeCacheServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        Cache::extend('aerospike', function ($app) {
            return Cache::repository(new AerospikeStore());
        });
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }
}
