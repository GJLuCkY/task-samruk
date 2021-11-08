<?php

declare(strict_types=1);

namespace App\Core\Application\Interfaces\Queries;

interface QueryHandlerInterface
{
    public function handle(QueryInterface $query);
}
