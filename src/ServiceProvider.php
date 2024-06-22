<?php

namespace Admin\Extend\AdminAddress;

use Admin\ExtendProvider;
use Admin\Core\ConfigExtensionProvider;
use Admin\Extend\AdminAddress\Extension\Config;
use Admin\Extend\AdminAddress\Extension\Install;
use Admin\Extend\AdminAddress\Extension\Navigator;
use Admin\Extend\AdminAddress\Extension\Uninstall;
use Admin\Extend\AdminAddress\Extension\Permissions;
use Exception;

/**
 * Class ServiceProvider
 * @package Admin\Extend\AdminAddress
 */
class ServiceProvider extends ExtendProvider
{
    /**
     * Extension ID name
     * @var string
     */
    public static string $name = "bfg/admin-address";

    /**
     * Extension call slug
     * @var string
     */
    static string $slug = "bfg_admin_address";

    /**
     * Extension description
     * @var string
     */
    public static string $description = "Bfg admin addresses";

    /**
     * @var string
     */
    protected string $navigator = Navigator::class;

    /**
     * @var string
     */
    protected string $install = Install::class;

    /**
     * @var string
     */
    protected string $uninstall = Uninstall::class;

    /**
     * @var ConfigExtensionProvider|string
     */
    protected string|ConfigExtensionProvider $config = Config::class;

    /**
     * @return void
     * @throws Exception
     */
    public function boot(): void
    {
        parent::boot();

        /**
         * Register publishers lang.
         */
        $this->publishes([
            __DIR__.'/../translations/en' => lang_path('en'),
            __DIR__.'/../translations/ru' => lang_path('ru'),
            __DIR__.'/../translations/uk' => lang_path('uk'),
        ], ['admin-address-lang']);
    }
}

