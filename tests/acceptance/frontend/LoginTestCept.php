<?php 
$I = new AcceptanceTester($scenario);
$I->amOnPage('/');
$I->click('#login');
$I->submitForm('#loginForm', [
    'login' => 'admin', 
    'password' => '111'
]);
$I->see('Mainpage');


$I->amOnPage('/');
$I->click('Login');
$I->submitForm('#loginForm', [
    'login' => '', 
    'password' => ''
]);
$I->see('Authorisation Error');
