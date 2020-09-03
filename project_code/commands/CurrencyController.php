<?php

declare(strict_types=1);

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\service\CurrencyUpdateService;

class CurrencyController extends Controller
{

    private $currencyUpdateService;

    public function __construct($id, $module, $config = [], CurrencyUpdateService $currencyUpdateService)
    {
        parent::__construct($id, $module, $config);

        $this->currencyUpdateService = $currencyUpdateService;
    }

    /**
     * Download and insert currency details from sbr.com
     *
     * @return int
     */
    public function actionUpdateCurrencyListSbr()
    {
        $count = $this->currencyUpdateService->downloadAndUpdateFromSbr();

        echo "Inserted $count items\n";

        return ExitCode::OK;
    }
}