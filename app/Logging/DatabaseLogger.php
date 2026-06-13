<?php

namespace App\Logging;

use Monolog\Logger;
use Monolog\Level;

class DatabaseLogger
{
    public function __invoke(array $config)
    {
        $logger = new Logger('database');
        $logger->pushHandler(new DatabaseHandler(
            level: $config['level'] ?? Level::Debug
        ));
        if (isset($config['processors']) && is_array($config['processors'])) {
            foreach ($config['processors'] as $processor) {
                if (is_string($processor)) {
                    $logger->pushProcessor(new $processor());
                } elseif (is_array($processor) && isset($processor['processor'])) {
                    $logger->pushProcessor(
                        new $processor['processor'](...$processor['with'] ?? []));
                }
            }
        }
        return $logger;
    }
}
