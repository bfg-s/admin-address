<?php

namespace Admin\Extend\AdminAddress\Controllers;

use Admin\Delegates\Card;
use Admin\Delegates\Form;
use Admin\Delegates\ModelInfoTable;
use Admin\Delegates\ModelTable;
use Admin\Delegates\SearchForm;
use Admin\Delegates\Tab;
use Admin\Extend\AdminAddress\Models\Address;
use Admin\Page;
use App\Admin\Controllers\Controller;

class AddressesController extends Controller
{
    /**
     * Static variable Model
     * @var string
     */
    static $model = Address::class;

    /**
     * @param Page $page
     * @param Card $card
     * @param SearchForm $searchForm
     * @param ModelTable $modelTable
     * @return Page
     */
    public function index(Page $page, Card $card, SearchForm $searchForm, ModelTable $modelTable) : Page
    {
        return $page->card(
            $card->search_form(
                $searchForm->id(),
                $searchForm->input('city', 'admin-shopify.city'),
                $searchForm->input('postcode', 'admin-shopify.postcode'),
                $searchForm->input('address_line1', 'admin-shopify.address_line1'),
                $searchForm->input('address_line2', 'admin-shopify.address_line2'),
                $searchForm->input('phone', 'admin-shopify.phone'),
                $searchForm->input('email', 'admin-shopify.email')->icon_envelope(),
                $searchForm->input('latitude', 'admin-shopify.latitude'),
                $searchForm->input('longitude', 'admin-shopify.longitude'),
                $searchForm->input('addressed_id', 'admin-shopify.addressed_id'),
                $searchForm->input('addressed_type', 'admin-shopify.addressed_type'),
                $searchForm->at(),
            ),
            $card->sortedModelTable(
                $modelTable->col('admin-shopify.city', 'city')->sort()->copied,
                $modelTable->col('admin-shopify.postcode', 'postcode')->sort()->copied,
                $modelTable->col('admin-shopify.address_line1', 'address_line1')->sort()->copied,
                $modelTable->col('admin-shopify.phone', 'phone')->sort()->copied,
                $modelTable->col('admin-shopify.email', 'email')->sort()->copied,
                $modelTable->col('admin-shopify.latitude_longitude', function (Address $address) {
                    return $address->latitude . ', ' . $address->longitude;
                })->sort()->copied,
                $modelTable->col('admin-shopify.active', 'active')->sort()->input_switcher,
            ),
        );
    }

    /**
     * @param Page $page
     * @param Card $card
     * @param Form $form
     * @param Tab $tab
     * @return Page
     */
    public function matrix(Page $page, Card $card, Form $form, Tab $tab) : Page
    {
        return $page->card(
            $card->form(
                $form->tabGeneral(
                  $tab->input('city', 'admin-shopify.city'),
                  $tab->input('postcode', 'admin-shopify.postcode'),
                  $tab->input('address_line1', 'admin-shopify.address_line1'),
                  $tab->input('address_line2', 'admin-shopify.address_line2')->nullable(),
                  $tab->input('phone', 'admin-shopify.phone')->nullable(),
                  $tab->email('email', 'admin-shopify.email')->nullable(),
                  $tab->input('latitude', 'admin-shopify.latitude')->nullable(),
                  $tab->input('longitude', 'admin-shopify.longitude')->nullable(),
                  $tab->input('order', 'admin-shopify.order')->default(0),
                  $tab->switcher('active', 'admin-shopify.active')->default(1),
                ),
            ),
            $card->footer_form(),
        );
    }

    /**
     * @param Page $page
     * @param Card $card
     * @param ModelInfoTable $modelInfoTable
     * @return Page
     */
    public function show(Page $page, Card $card, ModelInfoTable $modelInfoTable) : Page
    {
        return $page->card(
            $card->model_info_table(
                $modelInfoTable->id(),
                $modelInfoTable->row('admin-shopify.city', 'city'),
                $modelInfoTable->row('admin-shopify.postcode', 'postcode'),
                $modelInfoTable->row('admin-shopify.address_line1', 'address_line1'),
                $modelInfoTable->row('admin-shopify.address_line2', 'address_line2'),
                $modelInfoTable->row('admin-shopify.phone', 'phone'),
                $modelInfoTable->row('admin-shopify.email', 'email'),
                $modelInfoTable->row('admin-shopify.latitude', 'latitude'),
                $modelInfoTable->row('admin-shopify.longitude', 'longitude'),
                $modelInfoTable->row('admin-shopify.addressed_id', 'addressed_id'),
                $modelInfoTable->row('admin-shopify.addressed_type', 'addressed_type'),
                $modelInfoTable->row('admin-shopify.order', 'order'),
                $modelInfoTable->row('admin-shopify.active', 'active'),
                $modelInfoTable->at(),
            ),
        );
    }

}
