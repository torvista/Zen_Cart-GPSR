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

use Zencart\PluginSupport\ScriptedInstaller as ScriptedInstallBase;

class ScriptedInstaller extends ScriptedInstallBase
{
    protected function executeInstall(): void
    {
        $sql =
            'ALTER TABLE manufacturers
                ADD COLUMN manufacturers_gpsr_company VARCHAR(64) AFTER manufacturers_image,
                ADD COLUMN manufacturers_gpsr_contact_person VARCHAR(64) AFTER manufacturers_gpsr_company,
                ADD COLUMN manufacturers_gpsr_street VARCHAR(128) AFTER manufacturers_gpsr_contact_person,
                ADD COLUMN manufacturers_gpsr_postcode VARCHAR(64) AFTER manufacturers_gpsr_street,
                ADD COLUMN manufacturers_gpsr_city VARCHAR(128) AFTER manufacturers_gpsr_postcode,
                ADD COLUMN manufacturers_gpsr_country VARCHAR(255) AFTER manufacturers_gpsr_city,
                ADD COLUMN manufacturers_gpsr_url VARCHAR(255) AFTER manufacturers_gpsr_country,
                ADD COLUMN manufacturers_gpsr_company_noneu VARCHAR(64) AFTER manufacturers_gpsr_url,
                ADD COLUMN manufacturers_gpsr_contact_person_noneu VARCHAR(64) AFTER manufacturers_gpsr_company_noneu,
                ADD COLUMN manufacturers_gpsr_street_noneu VARCHAR(128) AFTER manufacturers_gpsr_contact_person_noneu,
                ADD COLUMN manufacturers_gpsr_postcode_noneu VARCHAR(64) AFTER manufacturers_gpsr_street_noneu,
                ADD COLUMN manufacturers_gpsr_city_noneu VARCHAR(128) AFTER manufacturers_gpsr_postcode_noneu,
                ADD COLUMN manufacturers_gpsr_country_noneu VARCHAR(255) AFTER manufacturers_gpsr_city_noneu,
                ADD COLUMN manufacturers_gpsr_url_noneu VARCHAR(255) AFTER manufacturers_gpsr_country_noneu,
                ADD COLUMN manufacturers_gpsr_additional_1 VARCHAR(255) AFTER manufacturers_gpsr_url_noneu,
                ADD COLUMN manufacturers_gpsr_additional_2 VARCHAR(255) AFTER manufacturers_gpsr_additional_1,
                ADD COLUMN manufacturers_gpsr_additional_3 VARCHAR(255) AFTER manufacturers_gpsr_additional_2';
        $this->executeInstallerSql($sql);

        $sql = "INSERT IGNORE INTO product_type_layout (configuration_title, configuration_key, configuration_value, configuration_description, product_type_id, sort_order, date_added, set_function, last_modified)
               VALUES
               ('Show GPSR Manufacturer Info', 'SHOW_PRODUCT_INFO_GPSR', '0', 'Should the extended GPSR manufacturer info be displayed on the product page?', 1, 3, NOW(), 'zen_cfg_select_drop_down(array(array(\'id\'=>\'1\', \'text\'=>\'True\'), array(\'id\'=>\'0\', \'text\'=>\'False\')), ', NOW())";
        $this->executeInstallerSql($sql);
    }

    protected function executeUninstall(): void
    {
        $sql =
            'ALTER TABLE manufacturers
                DROP COLUMN manufacturers_gpsr_company,
                DROP COLUMN manufacturers_gpsr_contact_person,
                DROP COLUMN manufacturers_gpsr_street,
                DROP COLUMN manufacturers_gpsr_postcode,
                DROP COLUMN manufacturers_gpsr_city,
                DROP COLUMN manufacturers_gpsr_country,
                DROP COLUMN manufacturers_gpsr_url,
                DROP COLUMN manufacturers_gpsr_company_noneu,
                DROP COLUMN manufacturers_gpsr_contact_person_noneu,
                DROP COLUMN manufacturers_gpsr_street_noneu,
                DROP COLUMN manufacturers_gpsr_postcode_noneu,
                DROP COLUMN manufacturers_gpsr_city_noneu,
                DROP COLUMN manufacturers_gpsr_country_noneu,
                DROP COLUMN manufacturers_gpsr_url_noneu,
                DROP COLUMN manufacturers_gpsr_additional_1,
                DROP COLUMN manufacturers_gpsr_additional_2,
                DROP COLUMN manufacturers_gpsr_additional_3';
        $this->executeInstallerSql($sql);
    }
}
