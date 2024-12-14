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

use App\Models\PluginControl;
use App\Models\PluginControlVersion;
use Zencart\PluginManager\PluginManager;

if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

class zcObserverGpsrObserver extends base
{
    protected bool $enabled = false;
    protected array $gpsr_data = [];

    protected string $zcPluginDir;

    public function __construct()
    {
        if (!empty($_GET['products_id'])) {
            $gpsr_products_id = (int)$_GET['products_id'];
            $this->enabled = !empty(zen_get_show_product_switch($gpsr_products_id, 'gpsr'));

            if (!$this->enabled) {
                return;
            }

            global $db;
            $sql = 'SELECT *
            FROM ' . TABLE_MANUFACTURERS . ' m
            WHERE manufacturers_id = ' . zen_get_products_manufacturers_id($gpsr_products_id);
            $manufacturer_data = $db->Execute($sql, 1);
            $this->gpsr_data = $manufacturer_data->fields;
        }

        // Determine this zc_plugin's installed directory
        $plugin_manager = new PluginManager(new PluginControl(), new PluginControlVersion());
        $this->zcPluginDir = str_replace(
            DIR_FS_CATALOG,
            '',
            $plugin_manager->getPluginVersionDirectory('GPSR', $plugin_manager->getInstalledPlugins()) . 'catalog/'
        );

        $this->attach(
            $this,
            [
                /* From /includes/templates/{template}/common/html_header.php */
                'NOTIFY_HTML_HEAD_END',
                /* From /includes/templates/{template}/common/tpl_main_page.php */
                'NOTIFY_FOOTER_END',
            ]
        );
    }

    // Issued at the end of the active template's html_header.php (just before
    // the </head> tag, enables the plugin's CSS files to be inserted.
    protected function notify_html_head_end(&$class)
    {
        global $current_page_base, $template;

        // -----
        // Load the plugin's default stylesheet from 'default'
        // and then look for an override in the site's active template.
        //
        $stylesheet = 'gpsr_styles.css';
        // load default css
        echo '<link rel="stylesheet" href="' . $this->getZcPluginDir() . DIR_WS_TEMPLATES . "default/css/$stylesheet" . '">' . "\n";
        // get template directory
        $stylesheet_dir = $template->get_template_dir($stylesheet, DIR_WS_TEMPLATE, $current_page_base, 'css');
        // prevent double loading of default and get template css
        if (!str_contains($stylesheet_dir, $this->getZcPluginDir()) && file_exists($stylesheet_dir . '/' . $stylesheet)) {
            echo '<link rel="stylesheet" href="' . $stylesheet_dir . '/' . $stylesheet . '">' . "\n";
        }
    }

    // Issued at the end of the active template's footer (just before
    // the </body> tag, enables the plugin's JS file to be inserted.
    protected function notify_footer_end(&$class, $current_page)
    {
        global $current_page_base, $flag_show_gpsr, $gpsr_data, $template;
        $flag_show_gpsr = $this->enabled;
        $gpsr_data = $this->gpsr_data;

        $javascript = 'gpsr_jscript.php';
        $jscript_dir = $template->get_template_dir($javascript, DIR_WS_TEMPLATE, $current_page_base, 'jscript');
        if (file_exists($jscript_dir . '/' . $javascript)) {
            require $jscript_dir . '/' . $javascript;
        } else {
            require $this->getZcPluginDir() . DIR_WS_TEMPLATES . 'default/jscript/gpsr_jscript.php';
        }
    }

    // Return the plugin's currently installed zc_plugin directory for the catalog.
    public function getZcPluginDir()
    {
        return $this->zcPluginDir;
    }

}
