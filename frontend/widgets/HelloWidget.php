<?php

namespace frontend\widgets;

use framework\core\Widget;

class HelloWidget extends Widget
{
    /**
     * @var string
     */
    public $username = '';
 
    public function run()
    {
        $this->render('hello', [
            'username' => $this->username,
            'username2' => 'dsf ds gsdgf',
        ]);
    }
}