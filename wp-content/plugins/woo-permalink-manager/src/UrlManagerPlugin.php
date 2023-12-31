<?php namespace Premmerce\UrlManager;

use Premmerce\UrlManager\Admin\Admin;
use Premmerce\UrlManager\Admin\Settings;
use Premmerce\UrlManager\Frontend\Frontend;
use Premmerce\SDK\V2\FileManager\FileManager;
use Premmerce\UrlManager\Addons\AddonManager;
use Premmerce\SDK\V2\Notifications\AdminNotifier;

/**
 * Class UrlManagerPlugin
 *
 * @package Premmerce\UrlManager
 */
class UrlManagerPlugin
{
    const DOMAIN = 'premmerce-url-manager';

    const VERSION = '2.3.5';

    /**
   * FileManager
     *
     * @var FileManager
     */
    private $fileManager;

    /**
     * Notifier
     *
     * @var AdminNotifier
     */
    private $notifier;

    /**
     * PluginManager constructor.
     *
     * @param $mainFile
     */
    public function __construct($mainFile)
    {
        $this->fileManager = new FileManager($mainFile);
        $this->notifier    = new AdminNotifier();

        add_action('init', array($this, 'loadTextDomain'));
        add_action('admin_init', array($this, 'checkRequirePlugins'));

        premmerce_wpm_fs()->add_filter('freemius_pricing_js_path', array($this, 'cutomFreemiusPricingPage'));

        add_action('before_woocommerce_init', array( $this, 'declareHPOSCompatibility' ));
    }

    /**
     * Get Plugin Version
     *
     * @return void
     */
    public static function getPluginVersion()
    {
        if (defined('self::VERSION')) {
            return self::VERSION;
        }
        return '1.0.0';
    }

    /**
     * Custom pricing page
     */
    public function cutomFreemiusPricingPage($default_pricing_js_path)
    {
        $pluginDir       = $this->fileManager->getPluginDirectory();
        $pricing_js_path = $pluginDir . '/assets/admin/js/pricing-page/freemius-pricing.js';

        return $pricing_js_path;
    }

    /**
     * Run plugin part
     */
    public function run()
    {
        $valid = count($this->validateRequiredPlugins()) === 0;
        ( new Updater() )->update();

        if (is_admin()) {
            new Admin($this->fileManager);
        }

        if ($valid) {
            if (! is_admin()) {
                new Frontend();
            }
            ( new PermalinkListener() )->registerFilters();
            ( new AddonManager() )->initAddons();
        }
    }

    /**
     * Fired when the plugin is activated
     */
    public function activate()
    {
        flush_rewrite_rules();
    }

    /**
     * Fired when the plugin is deactivated
     */
    public function deactivate()
    {
        $this->deleteUsersBannerMeta();
        flush_rewrite_rules();
    }

    /**
     * Fired during plugin uninstall
     */
    public static function uninstall()
    {
        delete_option(Updater::DB_OPTION);
        delete_option(Settings::OPTION_FLUSH);
        delete_option(Settings::OPTION_DISABLED);
        delete_option(Settings::OPTIONS);
        
        flush_rewrite_rules();
    }

    private function deleteUsersBannerMeta()
    {
        global $wpdb;

        $wpdb->delete($wpdb->usermeta, array('meta_key' => Admin::META_IGNORE_BANNER));
    }

    /**
     * Load plugin translations
     */
    public function loadTextDomain()
    {
        $name = $this->fileManager->getPluginName();
        load_plugin_textdomain('premmerce-url-manager', false, $name . '/languages/');
    }

    /**
     * Check required plugins and push notifications
     */
    public function checkRequirePlugins()
    {
        /* translators: %%1$s: our plugin name, %2$s another plugin name */
        $message = __('The %1$s plugin requires %2$s plugin to be active!', 'premmerce-url-manager');

        $plugins = $this->validateRequiredPlugins();

        if (count($plugins)) {
            foreach ($plugins as $plugin) {
                $error = sprintf($message, 'WooCommerce Permalink Manager', $plugin);
                $this->notifier->push($error, AdminNotifier::ERROR, false);
            }
        }
    }

    /**
     * Validate required plugins
     *
     * @return array
     */
    private function validateRequiredPlugins()
    {
        $plugins = array();

        if (! function_exists('is_plugin_active')) {
            include_once ABSPATH . 'wp-admin/includes/plugin.php';
        }

        /**
         * Check if WooCommerce is active
         **/
        if (! (is_plugin_active('woocommerce/woocommerce.php') || is_plugin_active_for_network('woocommerce/woocommerce.php'))) {
            $plugins[] = '<a target="_blank" href="https://wordpress.org/plugins/woocommerce/">WooCommerce</a>';
        }

        return $plugins;
    }

    /**
     * Declare compatibility for WC HPOS
     *
     * @link https://github.com/woocommerce/woocommerce/wiki/High-Performance-Order-Storage-Upgrade-Recipe-Book#declaring-extension-incompatibility
     * @return void
     */
    public function declareHPOSCompatibility()
    {
        if (class_exists(\Automattic\WooCommerce\Utilities\FeaturesUtil::class)) {
            \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility(
                'custom_order_tables',
                $this->fileManager->getMainFile(),
                true
            );
        }
    }
}
