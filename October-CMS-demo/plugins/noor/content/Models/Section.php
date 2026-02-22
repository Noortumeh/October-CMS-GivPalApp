<?php

namespace Noor\Content\Models;

use Model;
use RainLab\Translate\Behaviors\TranslatableModel;

class Section extends Model
{
    public $table = 'sections';

    /**
     * Relation declarations for October backend Form widgets
     */
    public $belongsTo = [
        'parent' => [self::class, 'key' => 'parent_id'],
    ];

    public $hasMany = [
        'children' => [self::class, 'key' => 'parent_id'],
    ];

    public $attachOne = [
        'file' => ['System\Models\File']
    ];

    public $implement = [TranslatableModel::class];

    public $translatable = [
        'title',
        'subtitle',
        'description',
        'address',
        'date'
    ];

    protected $fillable = [
        'parent_id',
        'section',
        'type',
        'file_path',
        'file_type',
        'order',
        'items_count',
        'active',
        'title',
        'subtitle',
        'description',
        'address',
        'date'
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive')->where('active', true);
    }
}
