<?php

namespace App\Models;

use App\Models\Concerns\ScopesToOrganizationStore;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'organization_id', 'store_id', 'advertising_channel_account_id', 'provider',
    'external_account_id', 'metric_date', 'spend', 'attributed_sales', 'conversion_value_by_conversion_date',
    'impressions', 'clicks', 'conversions', 'all_conversions', 'all_conversions_value',
    'all_conversions_value_by_conversion_date', 'add_to_cart', 'initiate_checkout', 'raw_payload', 'synced_at',
])]
class AdvertisingChannelDailyMetric extends Model
{
    use ScopesToOrganizationStore;

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(AdvertisingChannelAccount::class, 'advertising_channel_account_id');
    }

    protected function casts(): array
    {
        return [
            'metric_date' => 'date',
            'spend' => 'decimal:6',
            'attributed_sales' => 'decimal:6',
            'conversion_value_by_conversion_date' => 'decimal:6',
            'impressions' => 'integer',
            'clicks' => 'integer',
            'conversions' => 'decimal:6',
            'all_conversions' => 'decimal:6',
            'all_conversions_value' => 'decimal:6',
            'all_conversions_value_by_conversion_date' => 'decimal:6',
            'add_to_cart' => 'decimal:6',
            'initiate_checkout' => 'decimal:6',
            'raw_payload' => 'array',
            'synced_at' => 'datetime',
        ];
    }
}
