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

if (!defined('IS_ADMIN_FLAG') || IS_ADMIN_FLAG !== true) {
    die('Illegal Access');
}

/**
 * This observer class enables the handling of GPSR data on the admin manufacturers page
 */
class zcObserverGpsrAdminObserver extends base
{

    protected array $gpsr_noneu_company_default;

    public function __construct()
    {
        $this->attach($this, [
            'NOTIFY_ADMIN_MANUFACTURERS_INSERT_UPDATE',        // add/update additional fields in the manufacturers table
            'NOTIFY_ADMIN_MANUFACTURERS_EXTRA_COLUMN_HEADING', // manufacturers listing page: add column headers for company and importer
            'NOTIFY_ADMIN_MANUFACTURERS_EXTRA_COLUMN_DATA',    // manufacturers listing page: add data for company and importer
            'NOTIFY_ADMIN_MANUFACTURERS_NEW',                  // add additional content to the sidebox form for a NEW company
            'NOTIFY_ADMIN_MANUFACTURERS_EDIT',                 // add additional content to the sidebox form for an EXISTING
        ]);
        /* todo aborted attempt to insert default details
        if (file_exists(DIR_WS_INCLUDES . 'extra_datafiles/gpsr_defaults.php')) {
            include(DIR_WS_INCLUDES . 'extra_datafiles/gpsr_defaults.php');
            if (!empty($gpsr_noneu_company_default)) {
                $this->gpsr_noneu_company_default = $gpsr_noneu_company_default;
            }
        } else {
            //echo DIR_WS_INCLUDES . 'extra_datafiles/gpsr_defaults.php does not exist';
        }
        */
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
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_company') . ' class="form-control"'
                        )
                ];

                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_CONTACT_MANUFACTURER, 'manufacturers_gpsr_contact', 'class="control-label"') . zen_draw_textarea_field(
                            'manufacturers_gpsr_contact',
                            '',
                            20,
                            7,
                            htmlspecialchars($p1->manufacturers_gpsr_contact ?? '', ENT_COMPAT, CHARSET, true),
                            'class="form-control"'
                        )
                ];

            $p2[] = [
                'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_TELEPHONE, 'manufacturers_gpsr_tel', 'class="control-label"') . zen_draw_input_field(
                        'manufacturers_gpsr_tel',
                        htmlspecialchars($p1->manufacturers_gpsr_tel ?? '', ENT_COMPAT, CHARSET, true),
                        zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_tel') . ' class="form-control"'
                    )
            ];

            $p2[] = [
                'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_EMAIL, 'manufacturers_gpsr_email', 'class="control-label"') . zen_draw_input_field(
                        'manufacturers_gpsr_email',
                        htmlspecialchars($p1->manufacturers_gpsr_email ?? '', ENT_COMPAT, CHARSET, true),
                        zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_email') . ' class="form-control"'
                    )
            ];

                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_URL, 'manufacturers_gpsr_url', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_url',
                            htmlspecialchars($p1->manufacturers_gpsr_url ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_url') . ' class="form-control"'
                        )
                ];

                // non-EU manufacturer importer details
                $p2[] = ['text' => TEXT_MANUFACTURERS_GPSR_NONEU];

            $p2[] = [
                'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_COMPANY_NONEU, 'manufacturers_gpsr_company_noneu', 'class="control-label"') . zen_draw_input_field(
                        'manufacturers_gpsr_company_noneu',
                        htmlspecialchars($p1->manufacturers_gpsr_company_noneu ?? '', ENT_COMPAT, CHARSET, true),
                        zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_company_noneu') . ' class="form-control"'
                    )
            ];

            $p2[] = [
                'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_CONTACT_MANUFACTURER_NONEU, 'manufacturers_gpsr_contact_noneu', 'class="control-label"') . zen_draw_textarea_field(
                        'manufacturers_gpsr_contact_noneu',
                        '',
                        20,
                        7,
                        htmlspecialchars($p1->manufacturers_gpsr_contact_noneu ?? '', ENT_COMPAT, CHARSET, true),
                        'class="form-control"'
                    )
            ];

            $p2[] = [
                'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_TELEPHONE, 'manufacturers_gpsr_tel_noneu', 'class="control-label"') . zen_draw_input_field(
                        'manufacturers_gpsr_tel_noneu',
                        htmlspecialchars($p1->manufacturers_gpsr_tel_noneu ?? '', ENT_COMPAT, CHARSET, true),
                        zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_tel_noneu') . ' class="form-control"'
                    )
            ];

            $p2[] = [
                'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_EMAIL, 'manufacturers_gpsr_email_noneu', 'class="control-label"') . zen_draw_input_field(
                        'manufacturers_gpsr_email_noneu',
                        htmlspecialchars($p1->manufacturers_gpsr_email_noneu ?? '', ENT_COMPAT, CHARSET, true),
                        zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_email_noneu') . ' class="form-control"'
                    )
            ];

            $p2[] = [
                'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_URL, 'manufacturers_gpsr_url_noneu', 'class="control-label"') . zen_draw_input_field(
                        'manufacturers_gpsr_url_noneu',
                        htmlspecialchars($p1->manufacturers_gpsr_url_noneu ?? '', ENT_COMPAT, CHARSET, true),
                        zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_url_noneu') . ' class="form-control""'
                    )
            ];

                $p2[] = ['text' => TEXT_MANUFACTURERS_GPSR_ADDITIONAL];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_ADDITIONAL_1, 'manufacturers_gpsr_add_1', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_add_1',
                            htmlspecialchars($p1->manufacturers_gpsr_add_1 ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_add_1') . ' class="form-control"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_ADDITIONAL_2, 'manufacturers_gpsr_add_2', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_add_2',
                            htmlspecialchars($p1->manufacturers_gpsr_add_2 ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_add_2') . ' class="form-control"'
                        )
                ];
                $p2[] = [
                    'text' => zen_draw_label(TEXT_MANUFACTURERS_GPSR_ADDITIONAL_3, 'manufacturers_gpsr_add_3', 'class="control-label"') . zen_draw_input_field(
                            'manufacturers_gpsr_add_3',
                            htmlspecialchars($p1->manufacturers_gpsr_add_3 ?? '', ENT_COMPAT, CHARSET, true),
                            zen_set_field_length(TABLE_MANUFACTURERS, 'manufacturers_gpsr_add_3') . ' class="form-control"'
                        )
                ];
                $p2[] = [
                    'text' => '<hr>'
                ];
                break;

            case 'NOTIFY_ADMIN_MANUFACTURERS_INSERT_UPDATE':
                $manufacturers_gpsr_company = zen_db_prepare_input($_POST['manufacturers_gpsr_company']);
                $manufacturers_gpsr_contact = zen_db_prepare_input($_POST['manufacturers_gpsr_contact']);
                $manufacturers_gpsr_tel = zen_db_prepare_input($_POST['manufacturers_gpsr_tel']);
                $manufacturers_gpsr_email = zen_db_prepare_input($_POST['manufacturers_gpsr_email']);
                $manufacturers_gpsr_url = zen_db_prepare_input($_POST['manufacturers_gpsr_url']);

                $manufacturers_gpsr_company_noneu = zen_db_prepare_input($_POST['manufacturers_gpsr_company_noneu']);
                $manufacturers_gpsr_contact_noneu = zen_db_prepare_input($_POST['manufacturers_gpsr_contact_noneu']);
                $manufacturers_gpsr_tel_noneu = zen_db_prepare_input($_POST['manufacturers_gpsr_tel_noneu']);
                $manufacturers_gpsr_email_noneu = zen_db_prepare_input($_POST['manufacturers_gpsr_email_noneu']);
                $manufacturers_gpsr_url_noneu = zen_db_prepare_input($_POST['manufacturers_gpsr_url_noneu']);

                $manufacturers_gpsr_add_1 = zen_db_prepare_input($_POST['manufacturers_gpsr_add_1']);
                $manufacturers_gpsr_add_2 = zen_db_prepare_input($_POST['manufacturers_gpsr_add_2']);
                $manufacturers_gpsr_add_3 = zen_db_prepare_input($_POST['manufacturers_gpsr_add_3']);

                $sql_data_array_gpsr = [
                    'manufacturers_gpsr_company' => $manufacturers_gpsr_company,
                    'manufacturers_gpsr_contact' => $manufacturers_gpsr_contact,
                    'manufacturers_gpsr_tel' => $manufacturers_gpsr_tel,
                    'manufacturers_gpsr_email' => $manufacturers_gpsr_email,
                    'manufacturers_gpsr_url' => $manufacturers_gpsr_url,

                    'manufacturers_gpsr_company_noneu' => $manufacturers_gpsr_company_noneu,
                    'manufacturers_gpsr_contact_noneu' => $manufacturers_gpsr_contact_noneu,
                    'manufacturers_gpsr_tel_noneu' => $manufacturers_gpsr_tel_noneu,
                    'manufacturers_gpsr_email_noneu' => $manufacturers_gpsr_email_noneu,
                    'manufacturers_gpsr_url_noneu' => $manufacturers_gpsr_url_noneu,

                    'manufacturers_gpsr_add_1' => $manufacturers_gpsr_add_1,
                    'manufacturers_gpsr_add_2' => $manufacturers_gpsr_add_2,
                    'manufacturers_gpsr_add_3' => $manufacturers_gpsr_add_3,
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
