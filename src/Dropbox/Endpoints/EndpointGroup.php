<?php

namespace MisterPaladin\Dropbox\Endpoints;

use MisterPaladin\Dropbox\Exceptions\DropboxAPIException;
use MisterPaladin\Dropbox\Exceptions\DropboxAppException;
use GuzzleHttp\Client;

abstract class EndpointGroup {

    protected $client;
    protected $app;

    /**
     * Create new endpoints instance
     *
     * @param Client $client
     */
    public function __construct($app)
    {
        $this->app = $app;

        $httpClient = new Client([
            'base_url' => 'https://api.dropboxapi.com/2/',
            'defaults' => [
                'headers' => [
                    'Authorization' => sprintf('Bearer %s', $this->app->accessToken),
                ],
            ],
        ]);

        $this->client = $httpClient;
    }

    /**
     * Create and send request
     *
     * @param string $method
     * @param string $path
     * @param array $parameters
     * @return mixed
     */
    protected function rcpRequest($method, $path, $parameters = [])
    {

        if (!in_array($method, ['POST'])) {
            throw new DropboxAppException(sprintf('Invalid request method given: %s', $method));
        }

        $request = $this->client->createRequest($method, $path, $parameters);

        try {
            $data = json_decode($this->client->send($request)->getBody());
        } catch (\Exception $e) {
            throw new DropboxAPIException($e->getResponse()->getBody());
        }

        return $data;
    }

    protected function contentDownloadRequest($method, $path, $parameters = [])
    {
        $request = $this->client->createRequest($method, $path, $parameters);
        $request->setHost('content.dropboxapi.com');
        
        try {
            $data = $this->client->send($request)->getBody()->getContents();
        } catch (\Exception $e) {
            throw new DropboxAPIException($e->getResponse()->getBody());
        }

        return $data;
    }
}