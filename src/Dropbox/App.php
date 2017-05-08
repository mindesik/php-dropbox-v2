<?php

namespace MisterPaladin\Dropbox;

use MisterPaladin\Dropbox\Endpoints\Files;
use MisterPaladin\Dropbox\Endpoints\Users;

class App {
    
    public $accessToken = null;
    public static $files;
    public static $users;

    private static $_instance = null;

    /**
     * Get app instance
     *
     * @return App
     */
    public static function getInstance()
    {
        return self::$_instance;
    }

    /**
     * Add endpoints instances
     *
     * @param string $accessToken
     */
    public function __construct($accessToken) {
        $this->accessToken = $accessToken;

        self::$files = new Files($this);
        self::$users = new Users($this);
    }
    
    /**
     * Access to static properties
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        if (property_exists($this, $key)) {
            return self::${$key};
        } else {
            return null;
        }
    }

    protected function __clone() {}
}
