<?php

class UserFeatureCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');
    }

    // tests
    public function registerUser(AcceptanceTester $I)
    {
        $name = 'Test User';
        $I->amOnPage('/register');
        $I->fillField('[test=register-name]', 'Kate');
        $I->fillField('[test=register-email]', 'test@email.com');
        $I->fillField('[test=register-password]', 'asdfasdf');
        $I->fillField('[test=confirm-password]', 'asdfasdf');
        $I->click('[test=register-user]');

        # Assert
        $I->see('Kate');

        # Assert the existence of text within a specific element on the page
        $I->see('Logout', 'nav');
    }

    public function userCanLogIn(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/login');

        # Interact with form elements
        $I->fillField('[test=email-input]', 'jill@harvard.edu');
        $I->fillField('[test=password-input]', 'asdfasdf');
        $I->click('[test=login-button]');

        # Assert expected results
        $I->see('Jill Harvard');

        # Assert the existence of text within a specific element on the page
        $I->see('Logout', 'nav');
    }

    /**
     *
     */
    public function userCanLogout(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/');
        $I->click('[test=logout-button]');
        $I->seeElement('[test=login-link]');
    }

    /**
     *
     */
    public function loginIsValidated(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/login');
        $I->fillField('[test=email-input]', 'jill@harvard.edu');
        $I->fillField('[test=password-input]', 'bad-password');
        $I->click('[test=login-button]');

        # Assert
        $I->see('These credentials do not match our records.');
    }

    /**
     *
     */
    public function guestsCantVisitRestrictedPages(AcceptanceTester $I)
    {
        # Act - Visit /posts/create route without logging in first
        $I->amOnPage('/posts/create');

        # Assert we end up on login page because we can see the login button
        $I->seeElement('[test=login-button]');
    }
}