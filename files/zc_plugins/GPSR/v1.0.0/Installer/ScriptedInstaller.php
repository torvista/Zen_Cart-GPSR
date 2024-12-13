<?php

declare(strict_types=1);
/**
 * Plugin GPSR
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @author torvista
 * @updated 12/12/2024
 */

use Zencart\PluginSupport\ScriptedInstaller as ScriptedInstallBase;

class ScriptedInstaller extends ScriptedInstallBase
{
    protected function executeInstall(): void
    {
        $sql =
            'ALTER TABLE manufacturers
                ADD COLUMN manufacturers_gpsr_company VARCHAR(64),
                ADD COLUMN manufacturers_gpsr_contact VARCHAR(255),
                ADD COLUMN manufacturers_gpsr_tel VARCHAR(32),
                ADD COLUMN manufacturers_gpsr_email VARCHAR(96),
                ADD COLUMN manufacturers_gpsr_url VARCHAR(255),
               
                ADD COLUMN manufacturers_gpsr_company_noneu VARCHAR(64),
                ADD COLUMN manufacturers_gpsr_contact_noneu VARCHAR(255),
                ADD COLUMN manufacturers_gpsr_tel_noneu VARCHAR(32),
                ADD COLUMN manufacturers_gpsr_email_noneu VARCHAR(96),
                ADD COLUMN manufacturers_gpsr_url_noneu VARCHAR(255),
                
                ADD COLUMN manufacturers_gpsr_add_1 VARCHAR(255),
                ADD COLUMN manufacturers_gpsr_add_2 VARCHAR(255),
                ADD COLUMN manufacturers_gpsr_add_3 VARCHAR(255)';
        $this->executeInstallerSql($sql);

        //add Admin switch to Product General Layout
        $sql = "INSERT IGNORE INTO product_type_layout (configuration_title, configuration_key, configuration_value, configuration_description, product_type_id, sort_order, date_added, set_function, last_modified)
               VALUES
               ('Show GPSR Manufacturer Info', 'SHOW_PRODUCT_INFO_GPSR', '1', 'Should the extended GPSR manufacturer info be displayed on the product page?', 1, 3, NOW(), 'zen_cfg_select_drop_down(array(array(\'id\'=>\'1\', \'text\'=>\'True\'), array(\'id\'=>\'0\', \'text\'=>\'False\')), ', NOW())";
        $this->executeInstallerSql($sql);

        //add Admin switch to Product Kit Layout if exists
        $product_kit_check = $this->executeInstallerSelectSql(
            'SELECT type_id FROM ' . TABLE_PRODUCT_TYPES . " WHERE type_handler='product_kit'"
        );
        if ( ! $product_kit_check->EOF) {
            $product_kit_type_id = (int)$product_kit_check->fields['type_id'];
            $sql = "INSERT IGNORE INTO product_type_layout (configuration_title, configuration_key, configuration_value, configuration_description, product_type_id, sort_order, date_added, set_function, last_modified)
               VALUES
               ('Show GPSR Manufacturer Info', 'SHOW_PRODUCT_KIT_INFO_GPSR', '1', 'Should the extended GPSR manufacturer info be displayed on the product page?', " . $product_kit_type_id . ", 3, NOW(), 'zen_cfg_select_drop_down(array(array(\'id\'=>\'1\', \'text\'=>\'True\'), array(\'id\'=>\'0\', \'text\'=>\'False\')), ', NOW())";
            $this->executeInstallerSql($sql);
        }
        //eof Product Kit
    }

    protected function executeUninstall(): void
    {
        $sql =
            'ALTER TABLE manufacturers
                DROP COLUMN manufacturers_gpsr_company,
                DROP COLUMN manufacturers_gpsr_contact,
                DROP COLUMN manufacturers_gpsr_tel,
                DROP COLUMN manufacturers_gpsr_email,
                DROP COLUMN manufacturers_gpsr_url,
                DROP COLUMN manufacturers_gpsr_company_noneu,
                DROP COLUMN manufacturers_gpsr_contact_noneu,
                DROP COLUMN manufacturers_gpsr_tel_noneu,
                DROP COLUMN manufacturers_gpsr_email_noneu,
                DROP COLUMN manufacturers_gpsr_url_noneu,
                DROP COLUMN manufacturers_gpsr_add_1,
                DROP COLUMN manufacturers_gpsr_add_2,
                DROP COLUMN manufacturers_gpsr_add_3';
        $this->executeInstallerSql($sql);
    }

    // purloined from POSM
    protected function executeInstallerSelectSql(string $sql): false|queryFactoryResult
    {
        $this->dbConn->dieOnErrors = false;
        $result = $this->dbConn->Execute($sql);
        if ($this->dbConn->error_number !== 0) {
            $this->errorContainer->addError(0, $this->dbConn->error_text, true, PLUGIN_INSTALL_SQL_FAILURE);
            return false;
        }
        $this->dbConn->dieOnErrors = true;
        return $result;
    }
}
