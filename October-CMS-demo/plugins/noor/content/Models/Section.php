<?php

namespace Noor\Content\Models;

use Model;
// use October\Rain\Database\Traits\Validation;
use RainLab\Translate\Behaviors\TranslatableModel;
use RainLab\Translate\Models\Attribute;

class Section extends Model
{
    // use \October\Rain\Database\Traits\Validation;

    public $table = 'sections';

    /**
     * Relation declarations for October backend Form widgets
     */
    public $belongsTo = [
        'parent' => [self::class, 'key' => 'parent_id'],
    ];

    public $hasMany = [
        'children' => [self::class, 'key' => 'parent_id'],
        'translations' => ['RainLab\\Translate\\Models\\Attribute', 'key' => 'model_id'],
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

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('order');
    }

    public function translations(){
        return $this->hasMany(Attribute::class, 'model_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with(['childrenRecursive', 'translations'])->where('active', true);
    }

    /**
     * Get translated values automatically in JSON response
     */
    public function toArray()
    {
        $array = parent::toArray();
        $locale = app()->getLocale();
        
        if ($locale !== 'en' && $this->relationLoaded('translations')) {
            $translation = $this->translations
                ->where('locale', $locale)
                ->first();
            
            if ($translation && $translation->attribute_data) {
                $translatedData = json_decode($translation->attribute_data, true);
                foreach ($this->translatable as $field) {
                    if (isset($translatedData[$field])) {
                        $array[$field] = $translatedData[$field];
                    }
                }
            }
        }
        
        unset($array['translations']);
        
        return $array;
    }
}
