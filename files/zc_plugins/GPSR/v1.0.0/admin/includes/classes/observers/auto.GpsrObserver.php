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

if (!defined('IS_ADMIN_FLAG') || IS_ADMIN_FLAG !== true) {
    die('Illegal Access');
}

/**
 * This observer class enables the handling of GPSR data on the admin manufacturers page
 */
class zcObserverGpsrObserver extends base
{

    public function __construct()
    {
        $this->attach($this, [
            'NOTIFY_ADMIN_MANUFACTURERS_INSERT_UPDATE',        // add/update additional fields in the manufacturers table
            'NOTIFY_ADMIN_MANUFACTURERS_EXTRA_COLUMN_HEADING', // manufacturers listing page: add column headers for company and importer
            'NOTIFY_ADMIN_MANUFACTURERS_EXTRA_COLUMN_DATA',    // manufacturers listing page: add data for company and importer
            'NOTIFY_ADMIN_MANUFACTURERS_NEW',                  // add additional content to the sidebox form for a NEW company
            'NOTIFY_ADMIN_MANUFACTURERS_EDIT',                 // add additional content to the sidebox form for an EXISTING
        ]);
    }

    public function update(&$class, $eventID, $p1, &$p2, &$p3, &$p4): void
    {
        switch ($eventID) {
            case 'NOTIFY_ADMIN_MANUFACTURERS_NEW':
            case 'NOTIFY_ADMIN_MANUFACTURERS_EDIT':
                if ($p2 === false) {
                    $p2 = [];
                }
                $p2[] = ['text' => '<hr>' . TEXT_MANUFACTURERS_GPSR_GENERAL];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_COMPANY, 'manufacturers_gpsr_company', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_company',
                            htmlspecialchars($p1->manufacturers_gpsr_company ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_company') . ' class="form-control" id="manufacturers_gpsr_company"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_CONTACT_PERSON, 'manufacturers_gpsr_contact_person', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_contact_person',
                            htmlspecialchars($p1->manufacturers_gpsr_contact_person ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_contact_person') . ' class="form-control" id="manufacturers_gpsr_contact_person"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_STREET, 'manufacturers_gpsr_street', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_street',
                            htmlspecialchars($p1->manufacturers_gpsr_street ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_street') . ' class="form-control" id="manufacturers_gpsr_street"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_POSTCODE, 'manufacturers_gpsr_postcode', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_postcode',
                            htmlspecialchars($p1->manufacturers_gpsr_postcode ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_postcode') . ' class="form-control" id="manufacturers_gpsr_postcode"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_CITY, 'manufacturers_gpsr_city', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_city',
                            htmlspecialchars($p1->manufacturers_gpsr_city ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_city') . ' class="form-control" id="manufacturers_gpsr_city"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_COUNTRY, 'manufacturers_gpsr_country', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_country',
                            htmlspecialchars($p1->manufacturers_gpsr_country ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_country') . ' class="form-control" id="manufacturers_gpsr_country"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_URL, 'manufacturers_gpsr_url', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_url',
                            htmlspecialchars($p1->manufacturers_gpsr_url ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_url') . ' class="form-control" id="manufacturers_gpsr_url"'
                        )
                ];

                $p2[] = ['text' => TEXT_MANUFACTURERS_GPSR_NONEU];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_COMPANY_NONEU, 'manufacturers_gpsr_company_noneu', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_company_noneu',
                            htmlspecialchars($p1->manufacturers_gpsr_company_noneu ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_company_noneu') . ' class="form-control" id="manufacturers_gpsr_company_noneu"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_CONTACT_PERSON_NONEU, 'manufacturers_gpsr_contact_person_noneu', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_contact_person_noneu',
                            htmlspecialchars($p1->manufacturers_gpsr_contact_person_noneu ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_contact_person_noneu') . ' class="form-control" id="manufacturers_gpsr_contact_person_noneu"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_STREET, 'manufacturers_gpsr_street_noneu', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_street_noneu',
                            htmlspecialchars($p1->manufacturers_gpsr_street_noneu ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_street_noneu') . ' class="form-control" id="manufacturers_gpsr_street_noneu"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_POSTCODE, 'manufacturers_gpsr_postcode_noneu', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_postcode_noneu',
                            htmlspecialchars($p1->manufacturers_gpsr_postcode_noneu ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_postcode_noneu') . ' class="form-control" id="manufacturers_gpsr_postcode_noneu"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_CITY, 'manufacturers_gpsr_city_noneu', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_city_noneu',
                            htmlspecialchars($p1->manufacturers_gpsr_city_noneu ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_city_noneu') . ' class="form-control" id="manufacturers_gpsr_city_noneu"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_COUNTRY, 'manufacturers_gpsr_country_noneu', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_country_noneu',
                            htmlspecialchars($p1->manufacturers_gpsr_country_noneu ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_country_noneu') . ' class="form-control" id="manufacturers_gpsr_country_noneu"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_URL, 'manufacturers_gpsr_url_noneu', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_url_noneu',
                            htmlspecialchars($p1->manufacturers_gpsr_url_noneu ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_url_noneu') . ' class="form-control" id="manufacturers_gpsr_url_noneu"'
                        )
                ];

                $p2[] = ['text' => TEXT_MANUFACTURERS_GPSR_ADDITIONAL];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_ADDITIONAL_1, 'manufacturers_gpsr_additional_1', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_additional_1',
                            htmlspecialchars($p1->manufacturers_gpsr_additional_1 ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_additional_1') . ' class="form-control" id="manufacturers_gpsr_additional_1"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_ADDITIONAL_2, 'manufacturers_gpsr_additional_2', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_additional_2',
                            htmlspecialchars($p1->manufacturers_gpsr_additional_2 ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_additional_2') . ' class="form-control" id="manufacturers_gpsr_additional_2"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_ADDITIONAL_3, 'manufacturers_gpsr_additional_3', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_additional_3',
                            htmlspecialchars($p1->manufacturers_gpsr_additional_3 ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_additional_3') . ' class="form-control" id="manufacturers_gpsr_additional_3"'
                        )
                ];
                $p2[] = [
                    'text' => '<hr>'
                ];
                break;

            case 'NOTIFY_ADMIN_MANUFACTURERS_INSERT_UPDATE':
                $manufacturers_gpsr_company = zen_db_prepare_input($_POST['manufacturers_gpsr_company']);
                $manufacturers_gpsr_contact_person = zen_db_prepare_input($_POST['manufacturers_gpsr_contact_person']);
                $manufacturers_gpsr_street = zen_db_prepare_input($_POST['manufacturers_gpsr_street']);
                $manufacturers_gpsr_postcode = zen_db_prepare_input($_POST['manufacturers_gpsr_postcode']);
                $manufacturers_gpsr_city = zen_db_prepare_input($_POST['manufacturers_gpsr_city']);
                $manufacturers_gpsr_country = zen_db_prepare_input($_POST['manufacturers_gpsr_country']);
                $manufacturers_gpsr_url = zen_db_prepare_input($_POST['manufacturers_gpsr_url']);
                $manufacturers_gpsr_company_noneu = zen_db_prepare_input($_POST['manufacturers_gpsr_company_noneu']);
                $manufacturers_gpsr_contact_person_noneu = zen_db_prepare_input($_POST['manufacturers_gpsr_contact_person_noneu']);
                $manufacturers_gpsr_street_noneu = zen_db_prepare_input($_POST['manufacturers_gpsr_street_noneu']);
                $manufacturers_gpsr_postcode_noneu = zen_db_prepare_input($_POST['manufacturers_gpsr_postcode_noneu']);
                $manufacturers_gpsr_city_noneu = zen_db_prepare_input($_POST['manufacturers_gpsr_city_noneu']);
                $manufacturers_gpsr_country_noneu = zen_db_prepare_input($_POST['manufacturers_gpsr_country_noneu']);
                $manufacturers_gpsr_url_noneu = zen_db_prepare_input($_POST['manufacturers_gpsr_url_noneu']);
                $manufacturers_gpsr_additional_1 = zen_db_prepare_input($_POST['manufacturers_gpsr_additional_1']);
                $manufacturers_gpsr_additional_2 = zen_db_prepare_input($_POST['manufacturers_gpsr_additional_2']);
                $manufacturers_gpsr_additional_3 = zen_db_prepare_input($_POST['manufacturers_gpsr_additional_3']);

                $sql_data_array_gpsr = [
                    'manufacturers_gpsr_company' => $manufacturers_gpsr_company,
                    'manufacturers_gpsr_contact_person' => $manufacturers_gpsr_contact_person,
                    'manufacturers_gpsr_street' => $manufacturers_gpsr_street,
                    'manufacturers_gpsr_postcode' => $manufacturers_gpsr_postcode,
                    'manufacturers_gpsr_city' => $manufacturers_gpsr_city,
                    'manufacturers_gpsr_country' => $manufacturers_gpsr_country,
                    'manufacturers_gpsr_url' => $manufacturers_gpsr_url,
                    'manufacturers_gpsr_company_noneu' => $manufacturers_gpsr_company_noneu,
                    'manufacturers_gpsr_contact_person_noneu' => $manufacturers_gpsr_contact_person_noneu,
                    'manufacturers_gpsr_street_noneu' => $manufacturers_gpsr_street_noneu,
                    'manufacturers_gpsr_postcode_noneu' => $manufacturers_gpsr_postcode_noneu,
                    'manufacturers_gpsr_city_noneu' => $manufacturers_gpsr_city_noneu,
                    'manufacturers_gpsr_country_noneu' => $manufacturers_gpsr_country_noneu,
                    'manufacturers_gpsr_url_noneu' => $manufacturers_gpsr_url_noneu,
                    'manufacturers_gpsr_additional_1' => $manufacturers_gpsr_additional_1,
                    'manufacturers_gpsr_additional_2' => $manufacturers_gpsr_additional_2,
                    'manufacturers_gpsr_additional_3' => $manufacturers_gpsr_additional_3,
                ];
                $p2 = $p2 + $sql_data_array_gpsr;
                break;

            case 'NOTIFY_ADMIN_MANUFACTURERS_EXTRA_COLUMN_HEADING':
                if ($p2 === false) {
                    $p2 = [];
                }
                $align = 'center';
                $text = TABLE_HEADING_MANUFACTURERS_GPSR_COMPANY;
                $p2[] = compact('align', 'text');

                $align = 'center';
                $text = TABLE_HEADING_MANUFACTURERS_GPSR_IMPORT_COMPANY;
                $p2[] = compact('align', 'text');
                break;

            case 'NOTIFY_ADMIN_MANUFACTURERS_EXTRA_COLUMN_DATA':
                if ($p2 === false) {
                    $p2 = [];
                }
                $align = 'center';
                $text = $p1['manufacturers_gpsr_company'];
                $p2[] = compact('align', 'text');

                $align = 'center';
                $text = $p1['manufacturers_gpsr_company_noneu'];
                $p2[] = compact('align', 'text');
                break;
        }
    }
}
