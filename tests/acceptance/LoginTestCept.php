<?php 
$I = new AcceptanceTester($scenario);
$I->amOnPage('/');
$I->click('#login');
$I->submitForm('#loginForm', [
    'login' => 'admin', 
    'password' => '111'
]);
$I->see('Admin zone');


$I->amOnPage('/');
$I->click('Login');
$I->submitForm('#loginForm', [
    'login' => '', 
    'password' => ''
]);
$I->see('Authorisation Error');
