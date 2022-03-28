<?php

namespace App\Service;

use App\Service\Dao\FruitDao;
use App\Service\Formatter\FruitFormatter;
use Han\Utils\Service;
use Hyperf\Di\Annotation\Inject;

class FruitService extends Service
{
    #[Inject]
    protected FruitFormatter $formatter;

    #[Inject]
    protected FruitDao $dao;


}