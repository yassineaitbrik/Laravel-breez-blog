<?php

namespace App\Models;

use App\Events\BlogCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperBlog
 */
class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'message'
    ];

    protected $dispatchesEvents=[
        'created' => BlogCreated::class,
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

}
