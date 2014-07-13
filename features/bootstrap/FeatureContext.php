<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

// Allow us to use PHPUnit's assertions
require_once(__DIR__ . '/../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php');

/**
 * Behat context class.
 */
class FeatureContext implements SnippetAcceptingContext
{
    private $alert;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context object.
     * You can also pass arbitrary arguments to the context constructor through behat.yml.
     */
    public function __construct()
    {
    }


    /**
     * @When I create a :type alert with :message
     */
    public function iCreateAAlertWith($type, $message)
    {
        $this->alert = \MindOfMicah\PHPTWBS\Alert::$type($message);
    }

    /**
     * @Then the output should match the stub for :stub
     */
    public function theOutputShouldMatchTheStubFor($stub)
    {
        $filename = (__DIR__ . '/../stubs/alerts/' . $stub . '.txt');
        if (!file_exists($filename)) {
            throw new PendingException();
        }

        assertEquals((string)$this->alert, trim(file_get_contents($filename)));
    }
}
