<?php

declare(strict_types=1);

namespace app\service;

use app\repository\CurrencyRepository;
use app\transport\SbrCurrencyTransport;


/**
 * Service for downloading currency detail and updating data in local DB
 *
 * Class CurrencyUpdateService
 * @package app\service
 */
class CurrencyUpdateService
{

    /**
     * @var SbrCurrencyTransport
     */
    private $sbrCurrencyTransport;

    public function __construct()
    {
        $this->sbrCurrencyTransport = new SbrCurrencyTransport;
    }

    /**
     * Update data for currency from sbr.com
     *
     * @return int|null
     * @throws \yii\db\Exception
     */
    public function downloadAndUpdateFromSbr(): int
    {
        return
            CurrencyRepository::clearAndSaveNewCurrencyList(
                $this->sbrCurrencyTransport->getDaily()
            );
    }
}