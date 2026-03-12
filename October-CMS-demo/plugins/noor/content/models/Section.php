<?php

namespace Noor\Content\Models;

use Model;
use RainLab\Translate\Behaviors\TranslatableModel;

class Section extends Model
{
    public $table = 'sections';

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

    //
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive')->where('active', true);
    }

    public function scopeSearch($query, $search)
    {
        if (!$search) {
            return $query;
        }

        $locale = app()->getLocale();
        $modelType = static::class;
        
        $like = '%' . $search . '%';

        $query->where(function ($q) use ($like, $locale, $modelType) {
            $q->orWhere('title', 'like', $like)
              ->orWhere('subtitle', 'like', $like)
              ->orWhere('description', 'like', $like)
              ->orWhere('address', 'like', $like);

            $q->orWhereIn('id', function ($sub) use ($like, $locale, $modelType) {
                $sub->select('model_id')
                    ->from('rainlab_translate_attributes')
                    ->where('model_type', $modelType)
                    ->where('locale', $locale)
                    ->where('attribute_data', 'like', $like);
            });
        });

        return $query;
    }
}
