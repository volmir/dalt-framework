<?php

namespace Dalt\Logger\routes;

use Dalt\Logger\Route;

/**
 * Class FileRoute
 */
class FileRoute extends Route 
{

    /**
     * @var string 
     */
    public $filePath;

    /**
     * @var string
     */
    public $template = "{date} {level} {message} {context}";

    /**
     * @inheritdoc
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (!file_exists($this->filePath)) {
            touch($this->filePath);
        }
    }

    /**
     * @inheritdoc
     */
    public function log($level, $message, array $context = []) {
        file_put_contents(
            $this->filePath . date('Y-m-d.') . $level . '.log', 
            trim(strtr($this->template, [
                '{date}' => $this->getDate(),
                '{level}' => $level,
                '{message}' => $message,
                '{context}' => $this->contextStringify($context),
            ])) . PHP_EOL, 
            FILE_APPEND
        );
    }

}
