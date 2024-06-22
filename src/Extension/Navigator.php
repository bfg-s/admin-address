<?php

namespace Admin\Extend\AdminAddress\Extension;

use Admin\Core\NavigatorExtensionProvider;
use Admin\Extend\AdminAddress\Controllers\AddressesController;
use Admin\Interfaces\ActionWorkExtensionInterface;

/**
 * Class Navigator
 * @package Admin\Extend\AdminAddress\Extension
 */
class Navigator extends NavigatorExtensionProvider implements ActionWorkExtensionInterface {

    /**
     * @return void
     */
    public function handle(): void
    {
        $appAddressesController = "App\\Admin\\Controllers\\AddressesController";
        $this->item('admin-shopify.all_addresses')
            ->resource('addresses', class_exists($appAddressesController) ? $appAddressesController : AddressesController::class)
            ->icon_address_book();
    }
}
