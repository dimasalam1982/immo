<?php

declare(strict_types=1);

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\ContentNegotiator;
use yii\filters\RateLimiter;
use yii\web\Response;


class RestActiveController extends ActiveController
{

    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::class,
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'OPTIONS'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => false,
                    'Access-Control-Max-Age' => 86400,
                    'Access-Control-Allow-Headers' => ['*'],
                    'Access-Control-Expose-Headers' => ['*']
                ],
            ],
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                    'application/xml' => Response::FORMAT_XML,
                ],
            ],
            'rateLimiter' => [
                'class' => RateLimiter::class,
            ],
            'authenticator' => [
                'class' => CompositeAuth::class,
                'authMethods' => [
                    HttpBearerAuth::class,
                    [
                        'class' => QueryParamAuth::class,
                        'tokenParam' => 'access-token'
                    ]
                ],
                'except' => ['options'],
            ]
        ];
    }
}