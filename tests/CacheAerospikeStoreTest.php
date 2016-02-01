<?php

use CrowdStar\Cache\Driver\Aerospike\AerospikeStore;

class CacheAerospikeStoreTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Aerospike
     */
    protected static $aerospike;

    /**
     * @var AerospikeStore
     */
    protected static $store;

    /**
     * @var string[]
     */
    protected static $keys = [ ];


    /**
     * This method is called before the first test of this test class is run.
     */
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        if (empty(self::$aerospike) || ! self::$aerospike->isConnected()) {
            self::$aerospike = new Aerospike([
                    'hosts' => [
                        [
                            'addr' => 'localhost',
                            'port' => 3000,
                        ],
                    ],
                ]);

            self::$store = new AerospikeStore(self::$aerospike);
        }
    }


    /**
     * This method is called after the last test of this test class is run.
     */
    public static function tearDownAfterClass()
    {
        if (self::$aerospike->isConnected()) {
            foreach (self::$keys as $key) {
                // TODO: check existence of $key in Aerospike.
                self::$aerospike->remove($key);
            }

            self::$aerospike->close();
        }

        parent::tearDownAfterClass();
    }


    public function testAerospikeValueIsReturned()
    {
        self::$keys[] = 'foo';

        self::$store->put('foo', 'bar');
        $this->assertEquals('bar', self::$store->get('foo'));
    }
}
