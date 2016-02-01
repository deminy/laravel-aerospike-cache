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

use Aerospike;
use Illuminate\Contracts\Cache\Store;

/**
 * Laravel service provider for Aerospike Cache.
 *
 * @package CrowdStar\Cache\Driver\Aerospike
 * @author  Demin Yin <deminy@deminy.net>
 */
class AerospikeStore implements Store
{
    /**
     * @var Aerospike
     */
    protected $aerospike;

    /**
     * A string that should be prepended to keys.
     *
     * @var string
     */
    protected $prefix;

    /**
     * Create a new Aerospike store.
     *
     * @param  Aerospike $aerospike
     * @param  string    $prefix
     * @return void
     */
    public function __construct(Aerospike $aerospike, $prefix = '')
    {
        $this->aerospike = $aerospike;
        $this->setPrefix($prefix);
    }

    /**
     * Retrieve an item from the cache by key.
     *
     * @param  string  $key
     * @return mixed
     */
    public function get($key) {
    }

    /**
     * Store an item in the cache for a given number of minutes.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @param  int     $minutes
     * @return void
     */
    public function put($key, $value, $minutes) {
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return int
     */
    public function increment($key, $value = 1) {
    }

    /**
     * Decrement the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return int
     */
    public function decrement($key, $value = 1) {
    }

    /**
     * Store an item in the cache indefinitely.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function forever($key, $value) {
    }

    /**
     * Remove an item from the cache.
     *
     * @param  string  $key
     * @return bool
     */
    public function forget($key) {
    }

    /**
     * Remove all items from the cache.
     *
     * @return void
     */
    public function flush() {
    }

    /**
     * Get the cache key prefix.
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Set the cache key prefix.
     *
     * @param  string  $prefix
     * @return void
     */
    public function setPrefix($prefix)
    {
        $this->prefix = ! empty($prefix) ? $prefix.':' : '';
    }
}
