<?php 
$I = new AcceptanceTester($scenario);
$I->amOnPage('/');
$I->click('#login');
$I->submitForm('#loginForm', [
    'login' => 'user', 
    'password' => '111111'
]);
$I->see('Mainpage');


$I->amOnPage('/');
$I->click('#logout');


$I->amOnPage('/');
$I->click('Login');
$I->submitForm('#loginForm', [
    'login' => '', 
    'password' => ''
]);
$I->see('Authorisation Error');
