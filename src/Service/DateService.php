<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class DateService
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function getYears($year) {
        $this->logger->info("Service was used.");
        $then = strtotime($year);
        $then_year = date('Y', $then);
        $age = date('Y') - $then_year;
        if(strtotime('+' . $age . ' years', $then) > time()) {
            $age--;
        }

        return $age;
    }
}