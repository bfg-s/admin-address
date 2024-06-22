<?php

namespace Admin\Extend\AdminAddress\Extension;

use Admin\Core\ConfigExtensionProvider;
use Admin\Delegates\Form;
use Admin\Delegates\ModelRelation;
use Admin\Delegates\Tab;

/**
 * Class Config
 * @package Admin\Extend\AdminAddress\Extension
 */
class Config extends ConfigExtensionProvider {

    public function boot()
    {
        parent::boot();

        Form::macro('tabAddresses', function (...$delegates) {
            $tab = new Tab();
            $modelRelation = new ModelRelation();

            return $this->tab(
                $tab->title('admin-address.address')->icon_address_book(),
                $tab->model_relation('addresses')->title('admin-address.address')->template(
                    $modelRelation->input('city', 'admin-address.city')
                        ->required(),
                    $modelRelation->input('postcode', 'admin-address.postcode')
                        ->required(),
                    $modelRelation->input('address_line1', 'admin-address.address_line1')
                        ->required(),
                    $modelRelation->input('address_line2', 'admin-address.address_line2'),
                    $modelRelation->input('phone', 'admin-address.phone')->icon_phone(),
                    $modelRelation->email('email', 'admin-address.email'),
                    $modelRelation->input('latitude', 'admin-address.latitude'),
                    $modelRelation->input('longitude', 'admin-address.longitude'),

                    $modelRelation->fullControl(),
                    ...$delegates
                ),
            );
        });
    }
}
