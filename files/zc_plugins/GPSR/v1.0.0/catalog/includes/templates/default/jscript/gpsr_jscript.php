<?php

declare(strict_types=1);
/**
 * Plugin GPSR
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @author webchills, torvista
 * @updated 11/12/2024
 */
/** phpstorm
 * @var bool $flag_show_gpsr
 */
if ($flag_show_gpsr) {
    //use a buffer to ease the design of the layout
    ob_start();

    if (!empty($gpsr_data['manufacturers_gpsr_company'])) { ?>
        <div id="gpsrInfo">
            <?php
            // click on the title link to show/hide details ?>
            <span id="gpsrInfoTitle"><a href="#"><?= TEXT_MANUFACTURER_GPSR_INFO ?></a></span>

            <?php
            // this div is hidden on the first page load ?>
            <div id="gpsrInfoDetails">

                <p id="gpsrInfoManuName"><?= TABLE_HEADING_MANUFACTURER . ': ' . $gpsr_data['manufacturers_name'] ?></p>

                <div id="gpsrEu" class="gpsrDetails">
                    <p class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_CONTACT_INFO ?></p>
                    <p class="gpsrInfoAddress"><?= TEXT_MANUFACTURER_GPSR_ADDRESS_INFO ?></p>
                    <ul>
                        <li><?= TEXT_MANUFACTURER_GPSR_COMPANY . $gpsr_data['manufacturers_gpsr_company'] ?></li>
                        <?= (!empty($gpsr_data['manufacturers_gpsr_contact_person']) ? '<li>' . TEXT_MANUFACTURER_GPSR_CONTACT_PERSON . $gpsr_data['manufacturers_gpsr_contact_person'] . '</li>' : '') ?>
                        <?= (!empty($gpsr_data['manufacturers_gpsr_street']) ? '<li>' . TEXT_MANUFACTURER_GPSR_STREET . $gpsr_data['manufacturers_gpsr_street'] . '</li>' : '') ?>
                        <?= (!empty($gpsr_data['manufacturers_gpsr_city']) ? '<li>' . TEXT_MANUFACTURER_GPSR_CITY . $gpsr_data['manufacturers_gpsr_city'] . '</li>' : '') ?>
                        <?= (!empty($gpsr_data['manufacturers_gpsr_postcode']) ? '<li>' . TEXT_MANUFACTURER_GPSR_POSTCODE . $gpsr_data['manufacturers_gpsr_postcode'] . '</li>' : '') ?>
                        <?= (!empty($gpsr_data['manufacturers_gpsr_country']) ? '<li>' . TEXT_MANUFACTURER_GPSR_COUNTRY . $gpsr_data['manufacturers_gpsr_country'] . '</li>' : '') ?>
                    </ul>
                    <?php
                    if (!empty($gpsr_data['manufacturers_gpsr_url'])) { ?>
                        <p class="gpsrInfoUrl"><?= TEXT_MANUFACTURER_GPSR_URL ?> <a href="<?= $gpsr_data['manufacturers_gpsr_url'] ?>" target="_blank"><?= $gpsr_data['manufacturers_gpsr_url'] ?></a></p>
                        <?php
                    } ?>
                </div>

                <?php
                if (!empty($gpsr_data['manufacturers_gpsr_company_noneu'])) { ?>
                    <div id="gpsrNonEu" class="gpsrDetails">
                        <p class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_CONTACT_INFO_NONEU ?></p>
                        <p class="gpsrInfoAddress"><?= TEXT_MANUFACTURER_GPSR_ADDRESS_INFO ?></p>
                        <ul>
                            <li><?= TEXT_MANUFACTURER_GPSR_COMPANY_NONEU . $gpsr_data['manufacturers_gpsr_company_noneu'] ?></li>
                            <?= (!empty($gpsr_data['manufacturers_gpsr_contact_person_noneu']) ? '<li>' . TEXT_MANUFACTURER_GPSR_CONTACT_PERSON_NONEU . $gpsr_data['manufacturers_gpsr_contact_person_noneu'] . '</li>' : '') ?>
                            <?= (!empty($gpsr_data['manufacturers_gpsr_street_noneu']) ? '<li>' . TEXT_MANUFACTURER_GPSR_STREET_NONEU . $gpsr_data['manufacturers_gpsr_street_noneu'] . '</li>' : '') ?>
                            <?= (!empty($gpsr_data['manufacturers_gpsr_city_noneu']) ? '<li>' . TEXT_MANUFACTURER_GPSR_CITY_NONEU . $gpsr_data['manufacturers_gpsr_city_noneu'] . '</li>' : '') ?>
                            <?= (!empty($gpsr_data['manufacturers_gpsr_postcode_noneu']) ? '<li>' . TEXT_MANUFACTURER_GPSR_POSTCODE_NONEU . $gpsr_data['manufacturers_gpsr_postcode_noneu'] . '</li>' : '') ?>
                            <?= (!empty($gpsr_data['manufacturers_gpsr_country_noneu']) ? '<li>' . TEXT_MANUFACTURER_GPSR_COUNTRY_NONEU . $gpsr_data['manufacturers_gpsr_country_noneu'] . '</li>' : '') ?>
                        </ul>
                        <?php
                        if (!empty($gpsr_data['manufacturers_gpsr_url_noneu'])) { ?>
                            <p class="gpsrInfoUrl"><?= TEXT_MANUFACTURER_GPSR_URL_NONEU ?> <a href="<?= $gpsr_data['manufacturers_gpsr_url_noneu'] ?>" target="_blank"><?= $gpsr_data['manufacturers_gpsr_url_noneu'] ?></a></p>
                            <?php
                        } ?>
                    </div>
                    <?php
                }
                if (!empty($gpsr_data['manufacturers_gpsr_additional_1'])) { ?>
                    <div id="gpsrAdditional" class="gpsrDetails">
                        <ul>
                            <li><?= TEXT_MANUFACTURER_GPSR_ADDITIONAL_1 . $gpsr_data['manufacturers_gpsr_additional_1'] ?></li>
                            <?= (!empty($gpsr_data['manufacturers_gpsr_additional_2']) ? '<li>' . TEXT_MANUFACTURER_GPSR_ADDITIONAL_2 . $gpsr_data['manufacturers_gpsr_additional_2'] . '</li>' : '') ?>
                            <?= (!empty($gpsr_data['manufacturers_gpsr_additional_3']) ? '<li>' . TEXT_MANUFACTURER_GPSR_ADDITIONAL_3 . $gpsr_data['manufacturers_gpsr_additional_3'] . '</li>' : '') ?>
                        </ul>
                    </div>
                    <?php
                } ?>
            </div>
        </div>
        <?php
    }
    // retrieve buffer contents and empty it
    $gpsr_string = ob_get_clean();
    // remove line feeds or get console errors
    $gpsr_string = str_replace(["\r", "\n"], '', $gpsr_string);
    ?>
    <script title="gpsr_jscript">
        $(function (token) {
            // assign GPSR buffer text to a string
            let gpsr_string = '<?= $gpsr_string ?>';

            // append to an ID: enable only one!
            // e.g. after details next to price
            //$('#productDetailsList').append(gpsr_string);
            // e.g. after product description
            $('#productDescription').append(gpsr_string);

            // show/hide toggle
            $('#gpsrInfoTitle a').on('click', function (event) {
                event.preventDefault();
                $('#gpsrInfoDetails').toggle(token);
                if ($('#gpsrInfoTitle a').text() === '<?= TEXT_MANUFACTURER_GPSR_INFO_HIDE ?>') {
                    $('#gpsrInfoTitle a').text('<?= TEXT_MANUFACTURER_GPSR_INFO ?>')
                } else {
                    $('#gpsrInfoTitle a').text('<?= TEXT_MANUFACTURER_GPSR_INFO_HIDE ?>')
                }
            });
            // initial state: hidden
            $('#gpsrInfoDetails').hide();
            $('#gpsrInfoTitle a').text('<?= TEXT_MANUFACTURER_GPSR_INFO ?>');
        })
    </script>
    <?php
}
/*
 * # Zen Cart - GPSR

Encapsulated plugin compatible with the Zen Cart Plugin Manager.
Tested with Zen Cart 2.1.0 and php 8.4.1.

Do not expect this to magically display as you would like, so test it and customise it ON YOUR DEVELOPMENT SERVER FIRST.

## Description
Adds fields for GPSR manufacturer data to the manufacturers table.
Shows this GPSR data on the product pages.

By default the data is displayed after the product description.
It could be displayed anywhere, such as after the product details  (Model/Shipping Weight/Units in Stock/Manufactured by...) list.

It is displayed as a link with the details hidden, that toggles show/hide when clicked.

## Installation
Via the Admin Plugin Manager.
Installs new fields in the manufacturers table.
Installs a new constant SHOW_PRODUCT_INFO_GPSR in Catalog->Product Types->Product - General->Layout Settings->Show GPSR Manufacturer Info.
By default, this is only for Product General.
See below for customisation.

## Use
1. Add GPSR data via the Admin->Catalog->Manufacturers page.
If the GPSR company name is empty, nothing is displayed.

1. Enable the display of the data from Catalog->Product Types->Product - General->Layout Settings->Show GPSR Manufacturer Info.

See below for customisation of position, layout etc.

## Customisation

### Additional Product Types
These will require a constant for each to be added to the configuration table.
E.g. SHOW_PRODUCT_MUSIC_INFO_GPSR

"INSERT IGNORE INTO product_type_layout (configuration_title, configuration_key, configuration_value, configuration_description, product_type_id, sort_order, date_added, set_function, last_modified)
               VALUES
               ('Show GPSR Manufacturer Info', 'SHOW_PRODUCT_MUSIC_INFO_GPSR', '0', 'Should the extended GPSR manufacturer info be displayed on the product page?', 1, 3, NOW(), 'zen_cfg_select_drop_down(array(array(\'id\'=>\'1\', \'text\'=>\'True\'), array(\'id\'=>\'0\', \'text\'=>\'False\')), ', NOW())";

### Positioning/Layout/Style
The structure of the data as lists and the position of the insertion of the data by javascript is done in
zc_plugins\GPSR\vxxx\catalog\includes\templates\default\jscript\gpsr_jscript.php
You may copy this file to your template /jscript folder and it will be loaded instead of the default.

Basic css styling has been done in zc_plugins\GPSR\vxxx\catalog\includes\templates\default\css\gpsr_styles.css
You may create a new file in your template /css to override the default styles (both files are loaded).

### Problems/Suggestions/Improvements
Via the GitHub Issues or PRs.

## History
11/12/2024: torvista
Completely reworked as an encapsulated plugin.

Originally based on the work done by webchills for the german Zen Cart: https://github.com/zencartpro/157-modul-gpsr

 */
