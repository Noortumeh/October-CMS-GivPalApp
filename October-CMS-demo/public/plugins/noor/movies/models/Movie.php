<?php namespace Noor\Movies\Models;

use Model;

/**
 * Model
 */
class Movie extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var bool timestamps are disabled.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'noor_movies_';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

    // protected $jsonable = ['actors'];

    // Relations
    // relation with pivot table (breack amny to many relation between movie and genre/ movie and actor)
    public $belongsToMany = [
        'genres' => [
            'noor\Movies\Models\Genre',
            'table' => 'noor_movies_movies_genres',
            'order' => 'genre_title'
        ],
        'actors' => [
            'noor\Movies\Models\Actor',
            'table' => 'noor_movies_actors_movies',
            'order' => 'name'
        ]
    ];

    public $attachOne = [
        'poster' => 'System\Models\File'
    ];

    public $attachMany = [
        'movie_gallery' => 'System\Models\File'
    ];

}
