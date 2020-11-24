<?php

declare(strict_types=1);

namespace Upcloud\ApiClient;

use InvalidArgumentException;

/**
 * Configuration Class Doc Comment
 *
 * @category Class
 */
class Configuration
{
    private static $defaultConfiguration;

    /**
     * Associate array to store API key(s).
     *
     * @var string[]
     */
    protected $apiKeys = [];

    /**
     * Associate array to store API prefix (e.g. Bearer).
     *
     * @var string[]
     */
    protected $apiKeyPrefixes = [];

    /**
     * Access token for OAuth.
     *
     * @var string
     */
    protected $accessToken = '';

    /**
     * Username for HTTP basic authentication.
     *
     * @var string
     */
    protected $username = '';

    /**
     * Password for HTTP basic authentication.
     *
     * @var string
     */
    protected $password = '';

    /**
     * The host.
     *
     * @var string
     */
    protected $host = 'https://api.upcloud.com/1.3';

    /**
     * User agent of the HTTP request
     *
     * @var string
     */
    protected $userAgent = 'upcloud-php-api/v1.0.3';

    /**
     * Debug switch (default set to false).
     *
     * @var bool
     */
    protected $debug = false;

    /**
     * Debug file location (log to STDOUT by default).
     *
     * @var string
     */
    protected $debugFile = 'php://output';

    /**
     * Sets API key.
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $key API key or token
     *
     * @return $this
     */
    public function setApiKey(string $apiKeyIdentifier, string $key)
    {
        $this->apiKeys[$apiKeyIdentifier] = $key;

        return $this;
    }

    /**
     * Gets API key.
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     *
     * @return null|string API key or token
     */
    public function getApiKey(string $apiKeyIdentifier)
    {
        return isset($this->apiKeys[$apiKeyIdentifier]) ? $this->apiKeys[$apiKeyIdentifier] : null;
    }

    /**
     * Sets the prefix for API key (e.g. Bearer).
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $prefix API key prefix, e.g. Bearer
     *
     * @return $this
     */
    public function setApiKeyPrefix(string $apiKeyIdentifier, string $prefix)
    {
        $this->apiKeyPrefixes[$apiKeyIdentifier] = $prefix;

        return $this;
    }

    /**
     * Gets API key prefix.
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     *
     * @return null|string
     */
    public function getApiKeyPrefix(string $apiKeyIdentifier)
    {
        return isset($this->apiKeyPrefixes[$apiKeyIdentifier]) ? $this->apiKeyPrefixes[$apiKeyIdentifier] : null;
    }

    /**
     * Sets the access token for OAuth.
     *
     * @param string $accessToken Token for OAuth
     *
     * @return $this
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * Gets the access token for OAuth.
     *
     * @return string Access token for OAuth
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Sets the username for HTTP basic authentication.
     *
     * @param string $username Username for HTTP basic authentication
     *
     * @return $this
     */
    public function setUsername(string $username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Gets the username for HTTP basic authentication.
     *
     * @return string Username for HTTP basic authentication
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Sets the password for HTTP basic authentication.
     *
     * @param string $password Password for HTTP basic authentication
     *
     * @return $this
     */
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Gets the password for HTTP basic authentication.
     *
     * @return string Password for HTTP basic authentication
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the host.
     *
     * @param string $host Host
     *
     * @return $this
     */
    public function setHost(string $host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Gets the host.
     *
     * @return string Host
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Sets the user agent of the api client.
     *
     * @param string $userAgent the user agent of the api client
     *
     * @throws InvalidArgumentException
     *
     * @return $this
     */
    public function setUserAgent(string $userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Gets the user agent of the api client.
     *
     * @return string user agent
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Sets debug flag.
     *
     * @param bool $debug Debug flag
     *
     * @return $this
     */
    public function setDebug(bool $debug)
    {
        $this->debug = $debug;

        return $this;
    }

    /**
     * Gets the debug flag.
     *
     * @return bool
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * Sets the debug file.
     *
     * @param string $debugFile Debug file
     *
     * @return $this
     */
    public function setDebugFile(string $debugFile)
    {
        $this->debugFile = $debugFile;

        return $this;
    }

    /**
     * Gets the debug file.
     *
     * @return string
     */
    public function getDebugFile()
    {
        return $this->debugFile;
    }

    /**
     * Gets the default configuration instance.
     *
     * @return Configuration
     */
    public static function getDefaultConfiguration()
    {
        if (self::$defaultConfiguration === null) {
            self::$defaultConfiguration = new Configuration();
        }

        return self::$defaultConfiguration;
    }

    /**
     * Sets the detault configuration instance.
     *
     * @param Configuration $config An instance of the Configuration Object
     */
    public static function setDefaultConfiguration(Configuration $config): void
    {
        self::$defaultConfiguration = $config;
    }

    /**
     * Gets the essential information for debugging.
     *
     * @return string The report for debugging
     */
    public static function toDebugReport()
    {
        $report = 'PHP SDK (Upcloud\ApiClient) Debug Report:'.PHP_EOL;
        $report .= '    OS: '.php_uname().PHP_EOL;
        $report .= '    PHP Version: '.PHP_VERSION.PHP_EOL;
        $report .= '    OpenAPI Spec Version: 1.2.0'.PHP_EOL;

        return $report;
    }

    /**
     * Get API key (with prefix if set).
     *
     * @param  string $apiKeyIdentifier name of apikey
     *
     * @return string API key with the prefix
     */
    public function getApiKeyWithPrefix(string $apiKeyIdentifier)
    {
        $prefix = $this->getApiKeyPrefix($apiKeyIdentifier);
        $apiKey = $this->getApiKey($apiKeyIdentifier);

        if ($apiKey === null) {
            return null;
        }

        if ($prefix === null) {
            $keyWithPrefix = $apiKey;
        } else {
            $keyWithPrefix = $prefix.' '.$apiKey;
        }

        return $keyWithPrefix;
    }
}
