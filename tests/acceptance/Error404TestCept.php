<?php 
$I = new AcceptanceTester($scenario);
$I->amOnPage('/notFoundController');
$I->seeResponseCodeIs(404);

$I->amOnPage('/index/notFoundAction');
$I->seeResponseCodeIs(404);
