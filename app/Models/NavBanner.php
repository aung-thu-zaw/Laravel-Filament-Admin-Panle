<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class NavBanner extends Model
{
    use HasFactory;
    use Searchable;

    protected $casts = [
        'id' => 'integer',
        'is_active' => 'boolean',
        'is_manually_set' => 'boolean',
    ];

    /**
     * @return array<string>
     */
    public function toSearchableArray(): array
    {
        return [
            'description' => $this->description,
        ];
    }
}
