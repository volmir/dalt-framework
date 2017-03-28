<?php

namespace Dalt\Logger;

use DateTime;
use ReflectionClass;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

/**
 * 
 * Class Route
 */
abstract class Route extends AbstractLogger implements LoggerInterface 
{

    /**
     * @var bool
     */
    public $enabled = true;

    /**
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = []) 
    {
        $reflection = new ReflectionClass($this);
        foreach ($attributes as $attribute => $value) {
            $property = $reflection->getProperty($attribute);
            if ($property->isPublic()) {
                $property->setValue($this, $value);
            }
        }
    }
    
    /**
     *
     * @return string
     */
    public function getDate($format = DateTime::RFC2822)
    {
        return (new DateTime())->format($format);
    }    

    /**
     *
     * @param array $context
     * @return string
     */
    protected function contextStringify(array $context = []) 
    {
        return !empty($context) ? json_encode($context) : null;
    }

}
