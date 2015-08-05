<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Steps definitions related with the dataform activity.
 *
 * @package    block_mhaairs
 * @category   tests
 * @copyright  2015 Itamar Tzadok
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// NOTE: no MOODLE_INTERNAL test here, this file may be required by behat before including /config.php.

require_once(__DIR__ . '/../../../../lib/behat/behat_base.php');

use Behat\Behat\Context\Step\Given as Given;
use Behat\Gherkin\Node\TableNode as TableNode;
use Behat\Gherkin\Node\PyStringNode as PyStringNode;

/**
 * Mhaairs block steps definitions.
 *
 * @package    block_mhaairs
 * @category   tests
 * @copyright  2015 Itamar Tzadok
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class behat_block_mhaairs extends behat_base {

    /**
     * Sets the customer number and shared secret from bht config.
     *
     * @Given /^I set the mhaairs customer number and shared secret$/
     */
    public function set_the_mhaairs_customer_number_and_shared_secret() {
        $customernumber = get_config(null, 'behat_mhaairs_customer_number');
        $sharedsecret = get_config(null, 'behat_mhaairs_shared_secret');

        $data = array(
            "| Customer Number | $customernumber |",
            "| Shared Secret   | $sharedsecret   |",
        );
        $table = new TableNode(implode("\n", $data));
        $steps[] = new Given('I set the following fields to these values:', $table);

        return $steps;
    }

}