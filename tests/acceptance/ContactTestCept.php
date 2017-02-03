<?php 
$I = new AcceptanceTester($scenario);
$I->amOnPage('/');
$I->click('#contact');
$I->see('Contacts');
