<?php

declare(strict_types=1);
/**
 * Plugin GPSR
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @author torvista
 * @updated 14/12/2024
 */
/** IDE
 * @var bool $flag_show_gpsr
 */
if ($flag_show_gpsr) {
    //use a buffer to make the layout design easier
    ob_start();
    if (!empty($gpsr_data['manufacturers_gpsr_company']) && !empty($gpsr_data['manufacturers_gpsr_contact'])) { ?>
        <!--bof GPSR -->
        <div id="gpsrInfo">
            <?php
            // click on the title link to show/hide details ?>
            <div id="gpsrInfoTitle"><a href="#"><?= TEXT_MANUFACTURER_GPSR_INFO ?></a></div>
            <?php
            // this div is hidden on the first page load ?>
            <div id="gpsrInfoDetails">
                <?php
                // parent div enclosing the two company divs, so they display side by side, and additional below ?>
                <div id="gpsrCompanies">
                    <?php
                    //always shown ?>
                    <div id="gpsrEu" class="gpsrDetails">
                        <p class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_CONTACT_MANUFACTURER ?></p>
                        <ul>
                            <li><span class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_COMPANY ?></span><?= $gpsr_data['manufacturers_gpsr_company'] ?></li>
                            <li><span class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_ADDRESS ?></span><br><?= nl2br($gpsr_data['manufacturers_gpsr_contact']) ?></li>
                            <?php
                            if (!empty($gpsr_data['manufacturers_gpsr_tel'])) { ?>
                                <li><span class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_TELEPHONE ?></span><a href="tel:<?= str_replace(' ', '', $gpsr_data['manufacturers_gpsr_tel']) ?>" target="_blank"><?= $gpsr_data['manufacturers_gpsr_tel'] ?></a></li>
                                <?php
                            }
                            if (!empty($gpsr_data['manufacturers_gpsr_email'])) { ?>
                                <li><span class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_EMAIL ?></span><a href="mailto:<?= $gpsr_data['manufacturers_gpsr_email'] ?>" target="_blank"><?= $gpsr_data['manufacturers_gpsr_email'] ?></a></li>
                                <?php
                            }
                            if (!empty($gpsr_data['manufacturers_gpsr_url'])) { ?>
                                <li><span class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_URL ?></span><a href="<?= $gpsr_data['manufacturers_gpsr_url'] ?>" target="_blank"><?= $gpsr_data['manufacturers_gpsr_url'] ?></a></li>
                                <?php
                            } ?>
                        </ul>
                    </div>
                    <?php
                    // optionally shown for non-EU companies
                    if (!empty($gpsr_data['manufacturers_gpsr_company_noneu'])) { ?>
                        <div id="gpsrNonEu" class="gpsrDetails">
                            <p class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_CONTACT_MANUFACTURER_NONEU ?></p>
                            <ul>
                                <li><span class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_COMPANY ?></span><?= $gpsr_data['manufacturers_gpsr_company_noneu'] ?></li>
                                <li><span class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_ADDRESS ?></span><br><?= nl2br($gpsr_data['manufacturers_gpsr_contact_noneu']) ?></li>
                                <?php
                                if (!empty($gpsr_data['manufacturers_gpsr_tel_noneu'])) { ?>
                                    <li><span class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_TELEPHONE ?></span><a href="tel:<?= str_replace(' ', '', $gpsr_data['manufacturers_gpsr_tel_noneu']); ?>" target="_blank"><?= $gpsr_data['manufacturers_gpsr_tel_noneu'] ?></a></li>
                                    <?php
                                }
                                if (!empty($gpsr_data['manufacturers_gpsr_email_noneu'])) { ?>
                                    <li><span class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_EMAIL ?></span><a href="mailto:<?= $gpsr_data['manufacturers_gpsr_email_noneu'] ?>" target="_blank"><?= $gpsr_data['manufacturers_gpsr_email_noneu'] ?></a></li>
                                    <?php
                                }
                                if (!empty($gpsr_data['manufacturers_gpsr_url_noneu'])) { ?>
                                    <li><span class="gpsrInfoContact"><?= TEXT_MANUFACTURER_GPSR_URL ?></span><a href="<?= $gpsr_data['manufacturers_gpsr_url_noneu'] ?>" target="_blank"><?= $gpsr_data['manufacturers_gpsr_url_noneu'] ?></a></li>
                                    <?php
                                } ?>
                            </ul>
                        </div>
                        <?php
                    } ?>
                </div>
                <?php
                // optionally shown
                if (!empty($gpsr_data['manufacturers_gpsr_add_1'])) { ?>
                    <div id="gpsrAdd" class="gpsrDetails">
                        <ul>
                            <li><?= TEXT_MANUFACTURER_GPSR_ADD_1 . $gpsr_data['manufacturers_gpsr_add_1'] ?></li>
                            <?= (!empty($gpsr_data['manufacturers_gpsr_add_2']) ? '<li>' . TEXT_MANUFACTURER_GPSR_ADD_2 . $gpsr_data['manufacturers_gpsr_add_2'] . '</li>' : '') ?>
                            <?= (!empty($gpsr_data['manufacturers_gpsr_add_3']) ? '<li>' . TEXT_MANUFACTURER_GPSR_ADD_3 . $gpsr_data['manufacturers_gpsr_add_3'] . '</li>' : '') ?>
                        </ul>
                    </div>
                    <?php
                } ?>
            </div>
        </div>
        <!--eof GPSR -->
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

            // set the display position
            // use wherever, adding this id in the page e.g. <span id="gpsrInsert"></span>
            if ($("#gpsrInsert").length > 0) {
                $('#gpsrInsert').append(gpsr_string);

                // or use an existing id
            } else {
                // e.g. after details next to price
                //$('#productDetailsList').append(gpsr_string);

                // e.g. after product description, but since Ask a Question is inside the description it will appear after AAQ
                $('#productDescription').append(gpsr_string);
            }

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

            // initial display of the GPSR details: normally hidden
            // comment next line out to always show
            $('#gpsrInfoDetails').hide();
            $('#gpsrInfoTitle a').text('<?= TEXT_MANUFACTURER_GPSR_INFO ?>');
        })
    </script>
    <?php
}
