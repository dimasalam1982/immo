<?php

declare(strict_types=1);

namespace app\transport;

use yii\httpclient\Client;

/**
 * Transport for requests to cbr.ru
 *
 * Class SbrCurrencyTransport
 * @package app\transport
 */
class SbrCurrencyTransport
{

    const BASE_URL = 'http://www.cbr.ru/scripts/';

    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'baseUrl' => self::BASE_URL,
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
    }

    /**
     * Request to site
     *
     * @param string $url
     * @return array
     * @throws \Exception
     */
    public function send(string $url): array
    {
        $response = $this->client
            ->createRequest()
            ->setUrl($url)
            ->send();

        if (!$response->isOk) {
            throw new \Exception('Error in downloading from '.$url);
        }

        return is_array($response->data) ? $response->data : [];
    }

    /**
     * Download daily report
     *
     * @return array
     */
    public function getDaily(): array
    {
        $data = $this->send('XML_daily.asp');

        return $data['Valute'] ?? [];
    }
}