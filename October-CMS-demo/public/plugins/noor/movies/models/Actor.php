<?php namespace Noor\Movies\Models;

use Model;

/**
 * Model
 */
class Actor extends Model
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
    public $table = 'noor_movies_actors';

    public $belongsToMany = [
        'movies' => [
            'noor\Movies\Models\Movie',
            'table' => 'noor_movies_actors_movies',
            'order' => 'name'
        ],
    ];

    public function getFullNameAttribute(){
        return $this->name . " " . $this->lastname;
    }

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

}
