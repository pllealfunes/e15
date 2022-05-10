<?php

class WelcomePageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');
    }

    // tests
    public function clickCategoryToPost(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('[test=category-link]');
        $I->amOnPage('/category/creative');
        $I->see('Crochet 101');
        $I->click('[test=category-post]');
        $I->see('Crochet 101');
    }
}