<?php

declare(strict_types=1);
/**
 * Plugin GPSR
 * Loaded by product-type template to display GPSR manufacturer contact info on the product_info page.
 *
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */
echo 'gpsr_manufacturer_info.php';die;
if (!empty($manufacturers_gpsr_company)) { ?>
    <div id="gpsrInfo">
        <p><b><?= TEXT_MANUFACTURER_GPSR_INFO ?></b></p>
        <p><?= TABLE_HEADING_MANUFACTURER . ': ' . $manufacturers_name ?></p>
        <div id="gpsrEu" class="gpsrDetails">
            <p><?= TEXT_MANUFACTURER_GPSR_CONTACT_INFO ?></p>
            <p><?= TEXT_MANUFACTURER_GPSR_ADDRESS_INFO ?></p>
            <ul>
                <li><?= TEXT_MANUFACTURER_GPSR_COMPANY . $manufacturers_gpsr_company ?></li>
                <?= (!empty($manufacturers_gpsr_contact_person) ? '<li>' . TEXT_MANUFACTURER_GPSR_CONTACT_PERSON . $manufacturers_gpsr_contact_person . '</li>' : '') . "\n" ?>
                <?= (!empty($manufacturers_gpsr_street) ? '<li>' . TEXT_MANUFACTURER_GPSR_STREET . $manufacturers_gpsr_street . '</li>' : '') . "\n" ?>
                <?= (!empty($manufacturers_gpsr_city) ? '<li>' . TEXT_MANUFACTURER_GPSR_CITY . $manufacturers_gpsr_city . '</li>' : '') . "\n" ?>
                <?= (!empty($manufacturers_gpsr_postcode) ? '<li>' . TEXT_MANUFACTURER_GPSR_POSTCODE . $manufacturers_gpsr_postcode . '</li>' : '') . "\n" ?>
                <?= (!empty($manufacturers_gpsr_country) ? '<li>' . TEXT_MANUFACTURER_GPSR_COUNTRY . $manufacturers_gpsr_country . '</li>' : '') . "\n" ?>
            </ul>
            <?= (!empty($manufacturers_gpsr_url) ? '<p>' . TEXT_MANUFACTURER_GPSR_URL . $manufacturers_gpsr_url . '</p>' : '') . "\n" ?>
        </div>
        <?php
        if (!empty($manufacturers_gpsr_company_noneu)) { ?>
            <div id="gpsrNonEu" class="gpsrDetails">
                <p><?= TEXT_MANUFACTURER_GPSR_CONTACT_INFO_NONEU ?></p>
                <p><?= TEXT_MANUFACTURER_GPSR_ADDRESS_INFO ?></p>
                <ul>
                    <li><?= TEXT_MANUFACTURER_GPSR_COMPANY_NONEU . $manufacturers_gpsr_company_noneu ?></li>
                    <?= (!empty($manufacturers_gpsr_contact_person_noneu) ? '<li>' . TEXT_MANUFACTURER_GPSR_CONTACT_PERSON_NONEU . $manufacturers_gpsr_contact_person_noneu . '</li>' : '') . "\n" ?>
                    <?= (!empty($manufacturers_gpsr_street_noneu) ? '<li>' . TEXT_MANUFACTURER_GPSR_STREET_NONEU . $manufacturers_gpsr_street_noneu . '</li>' : '') . "\n" ?>
                    <?= (!empty($manufacturers_gpsr_city_noneu) ? '<li>' . TEXT_MANUFACTURER_GPSR_CITY_NONEU . $manufacturers_gpsr_city_noneu . '</li>' : '') . "\n" ?>
                    <?= (!empty($manufacturers_gpsr_postcode_noneu) ? '<li>' . TEXT_MANUFACTURER_GPSR_POSTCODE_NONEU . $manufacturers_gpsr_postcode_noneu . '</li>' : '') . "\n" ?>
                    <?= (!empty($manufacturers_gpsr_country_noneu) ? '<li>' . TEXT_MANUFACTURER_GPSR_COUNTRY_NONEU . $manufacturers_gpsr_country_noneu . '</li>' : '') . "\n" ?>
                </ul>
                <?= (!empty($manufacturers_gpsr_url_noneu) ? '<p>' . TEXT_MANUFACTURER_GPSR_URL_NONEU . $manufacturers_gpsr_url_noneu . '</p>' : '') . "\n" ?>
            </div>
            <?php
        }
        if (!empty($manufacturers_gpsr_additional_1)) { ?>
            <div id="gpsrAdditional" class="gpsrDetails">
                <ul>
                    <li><?= TEXT_MANUFACTURER_GPSR_ADDITIONAL_1 . $manufacturers_gpsr_additional_1 ?></li>
                    <?= (!empty($manufacturers_gpsr_additional_2) ? '<li>' . TEXT_MANUFACTURER_GPSR_ADDITIONAL_2 . $manufacturers_gpsr_additional_2 . '</li>' : '') . "\n" ?>
                    <?= (!empty($manufacturers_gpsr_additional_3) ? '<li>' . TEXT_MANUFACTURER_GPSR_ADDITIONAL_3 . $manufacturers_gpsr_additional_3 . '</li>' : '') . "\n" ?>
                </ul>
            </div>
            <?php
        } ?>
    </div>
    <?php
} ?>
<?php
