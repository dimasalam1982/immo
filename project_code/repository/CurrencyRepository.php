<?php

declare(strict_types=1);

namespace app\repository;

use Yii;
use app\models\Currency;

/**
 * Repository provides methods for working with currency object
 *
 * Class CurrencyRepository
 * @package app\repository
 */
class CurrencyRepository
{
    /**
     * Delete rows and insert news in currency
     *
     * @param array $data
     * @throws \yii\db\Exception
     */
    public static function clearAndSaveNewCurrencyList(array $data): int
    {
        $arrayToStore = [];

        foreach ($data as $item) {
            $arrayToStore[] = [
                'name' => $item['CharCode'],
                'rate' => $item['Value']
            ];
        }

        if (count($arrayToStore)){
            Yii::$app->db
                ->createCommand()
                ->truncateTable(Currency::tableName())
                ->execute();
        }

        Yii::$app->db
            ->createCommand()
            ->batchInsert(Currency::tableName(), ['name', 'rate'], $arrayToStore)
            ->execute();

        return count($arrayToStore);
    }
}
