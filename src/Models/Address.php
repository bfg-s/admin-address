<?php

namespace Admin\Extend\AdminAddress\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Admin\Extend\AdminShopify\Models\Address
 *
 * @property int $id
 * @property string $city
 * @property string $postcode
 * @property string $address_line1
 * @property string|null $address_line2
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string $addressed_type
 * @property int $addressed_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddressLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddressLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddressedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddressedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @property bool $active
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereActive($value)
 * @property int $order
 * @property-read Model|\Eloquent $addressed
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereOrder($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'city',
        'postcode',
        'address_line1',
        'address_line2',
        'phone',
        'email',
        'latitude',
        'longitude',
        'addressed_id',
        'addressed_type',
        'order',
        'active',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'city' => 'string',
        'postcode' => 'string',
        'address_line1' => 'string',
        'address_line2' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'latitude' => 'float',
        'longitude' => 'float',
        'addressed_id' => 'integer',
        'addressed_type' => 'string',
        'order' => 'integer',
        'active' => 'boolean',
    ];

    /**
     * @return MorphTo
     */
    public function addressed(): MorphTo
    {
        return $this->morphTo('addressed');
    }
}
