<?php

namespace App\Models;

use App\Models\User;
use App\Models\PaperClip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UploadImage extends Model implements \Czim\Paperclip\Contracts\AttachableInterface
{
    use \Czim\Paperclip\Model\PaperclipTrait;
    use HasFactory,SoftDeletes,Notifiable;

    protected $fillalbe = [
        'user_id',
        'image',
    ];

    /**
     * paperclip image upload 
     */
    public function __construct(array $attributes = [])
    {
        $this->hasAttachedFile('image', [
            'variants' => [
                'medium' => [
                    'auto-orient' => [],
                    'resize'      => ['dimensions' => '300x300'],
                ],
                'thumb' => '100x100',
            ],
            'attributes' => [
                'variants' => true,
            ],
        ]);

        parent::__construct($attributes);
    }

    /* Relation with user */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
