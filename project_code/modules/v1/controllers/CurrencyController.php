<?php

declare(strict_types=1);

namespace app\modules\v1\controllers;

/**
 * @OA\Get(
 *   tags={"Currency"},
 *   path="/v1/currencies",
 *   summary="Getting currency list with pagination",
 *   @OA\Parameter(
 *         name="per-page",
 *         in="query",
 *         description="Pagination param. Count items per one page",
 *         required=false,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *      ),
 *   @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Pagination param. Number of page",
 *         required=false,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *      ),
 *   @OA\Parameter(
 *         name="sort",
 *         in="query",
 *         description="Sorting field",
 *         required=false,
 *         @OA\Schema(
 *              type="array",
 *              @OA\Items(
 *                  type="string",
 *                  enum = {"id","name","rate","insert_dt"}
 *              )
 *         )
 *      ),
 *   @OA\Response(
 *       response="default",
 *       description="successful operation"
 *   ),
 *   security={{
 *      "api_key":{}
 *   }},
 * )
 */

/**
 * @OA\Get(
 *   tags={"Currency"},
 *   path="/v1/currency/{currency_id}",
 *   summary="Getting one currency",
 *   @OA\Parameter(
 *         name="currency_id",
 *         in="path",
 *         description="ID of currency",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *      ),
 *   @OA\Response(
 *       response="default",
 *       description="successful operation"
 *   ),
 *   security={{
 *      "api_key":{}
 *   }},
 * )
 */

class CurrencyController extends RestActiveController
{

    public $modelClass = 'app\models\Currency';
}

