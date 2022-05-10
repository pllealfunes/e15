<?php

class CreatePostPageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');
    }

    // tests
    public function addNewPost(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/posts/create');

        $I->fillField('[test=title-input]', 'Test Post');
        $I->selectOption('[test=category-dropdown]', 'games');
        $I->fillField('[test=post-textarea]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pulvinar libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pulvinar libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.');
        $I->click('[test=new-post-button]');


        $I->see('Your Post was Added');
        $I->amOnPage('/');
        $I->see('Test Post');

    }

    public function showsValidation(AcceptanceTester $I)
    {
        # Setup
        $I->amOnPage('/test/login-as/1');

        # Act
        $I->amOnPage('/posts/create');
        $I->click('[test=new-post-button]');

        # Assert we see global error feedback
        $I->seeElement('[test=global-error-feedback]');

        # Assert we see at least one field valdiation
        $I->seeElement('[test=error-field-title]');
    }

}