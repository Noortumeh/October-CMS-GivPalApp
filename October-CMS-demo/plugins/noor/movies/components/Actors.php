<?php namespace Noor\Movies\Components;

use Cms\Classes\ComponentBase;
use Noor\Movies\Models\Actor;

class Actors extends ComponentBase{

    public function componentDetails()
    {
        return [
            'name' => 'Actor list',
            'description' => 'List of actors',
        ];
    }

    public function onRun()
    {
        $this->actors = $this->loadActors();
    }

    protected function loadActors(){
        // return Actor::all();
    }
}