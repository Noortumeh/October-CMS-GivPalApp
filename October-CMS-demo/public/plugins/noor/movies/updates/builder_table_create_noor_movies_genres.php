<?php namespace Noor\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNoorMoviesGenres extends Migration
{
    public function up()
    {
        Schema::create('noor_movies_genres', function($table)
        {
            $table->increments('id');
            $table->string('genre_title');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('noor_movies_genres');
    }
}
