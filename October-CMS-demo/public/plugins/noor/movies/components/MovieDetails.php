<?php namespace Noor\Movies\Components;

use Cms\Classes\ComponentBase;
use Noor\Movies\Models\Movie;

class MovieDetails extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Movie Details',
            'description' => 'Display single Movie'
        ];
    }

    public function onRun()
    {
        $this->page['record'] = Movie::find($this->param('id'));
    }
}
