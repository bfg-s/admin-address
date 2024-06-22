<?php

namespace Admin\Extend\AdminAddress\Extension;

use Admin\Core\InstallExtensionProvider;
use Admin\Interfaces\ActionWorkExtensionInterface;

/**
 * Class Install
 * @package Admin\Extend\AdminAddress\Extension
 */
class Install extends InstallExtensionProvider implements ActionWorkExtensionInterface {

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->command->call('vendor:publish', [
            '--tag' => "admin-address-lang",
            '--force' => true,
        ]);
    }
}
