<?php

class ShowPostPageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');
    }


    // tests
    
    public function showPostNotLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('[test=post-link-1]');
        $I->see('Crochet 101');
        $I->see('Login to add a comment!');
    }

    public function goUserProfile(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('[test=post-link-1]');
        $I->see('Crochet 101');
        $I->click('[test=user-profile-link]');
        $I->see('Jill Harvard Profile');
    }


    public function loginFailComment(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/');
        $I->click('[test=post-link-1]');
        $I->click('[test=new-comment-button]');

         # Assert we see global error feedback
         $I->seeElement('[test=global-error-feedback]');

         # Assert we see at least one field valdiation
         $I->seeElement('[test=error-field-comment]');
    }


    public function loginAddComment(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/');
        $I->click('[test=post-link-1]');
        $I->fillField('[test=comment-textarea]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pulvinar libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pulvinar libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.');
        $I->click('[test=new-comment-button]');

        $I->see('Your Comment was Added');
    }
    
    
    public function loginDeleteComment(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/');
        $I->click('[test=post-link-1]');
        $I->click('[test=new-comment-button]');

        $I->click('[test=delete-comment-button]');
        $I->see('Your Comment was Deleted');
    }

    public function loginDeletePost(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/');
        $I->click('[test=post-link-1]');
        $I->see('Crochet 101');
        $I->click('[test=delete-post-button]');
       
        //$url = $I->grabFromCurrentUrl();
        //$I->assertEquals('/', $url);
        $I->see('Your Post was Deleted');
    }
}