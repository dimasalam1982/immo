<?php

namespace app\modules\v1;

/**
 * @OA\Tag(
 *      name="Currency",
 *      description="Currency data"
 * )
 */

/**
 * @OA\Info(
 *   title="Immo exapmle API",
 *   version="0.0.1",
 *   @OA\Contact(
 *     email="dimasalam@yandex.ru"
 *   )
 * )
 */

/**
 * @OA\Server(
 *      url=API_URL,
 *      description="Immo API server"
 * )
 */

/**
 * @OA\SecurityScheme(
 *   securityScheme="api_key",
 *   type="http",
 *   scheme="bearer",
 * )
 */
class Module extends \yii\base\Module
{

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\v1\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

}
