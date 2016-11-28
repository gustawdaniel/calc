<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @param String $field
     * @param String $value
     * @Given I set :field as :value
     */
    public function iSetAs($field, $value)
    {
        $javascript = 'document.getElementById("'.$field.'").value='.$value;
        $this->getSession()->executeScript($javascript);
    }

    /**
     * @Then Result should be :value
     */
    public function resultShouldBe($value)
    {
        $javascript = 'document.getElementById("c").value';
        $realResult = $this->getSession()->evaluateScript($javascript);

        if ( $value !== $realResult) {
            throw new Exception(
                "Actual result is:\n" . $realResult
            );
        }
    }



    /**
     * @param String $number
     * @When I wait :number ms
     */
    public function iWaitMs($number)
    {
        $this->getSession()->wait($number);
    }

    /**
     * @param String $number
     * @When I wait :number ms for jQuery
     */
    public function iWaitMsForJQuery($number)
    {
        $this->getSession()->wait($number, '(0 === jQuery.active)');
    }


}
