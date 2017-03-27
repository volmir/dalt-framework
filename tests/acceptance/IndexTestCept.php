<?php 
$I = new AcceptanceTester($scenario);
$I->amOnPage('/');
$I->see('Dalt Framework');
$I->seeResponseCodeIs(200);

