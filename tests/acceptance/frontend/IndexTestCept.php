<?php 
$I = new AcceptanceTester($scenario);
$I->amOnPage('/');
$I->see('Simple Framework');
$I->seeResponseCodeIs(200);

