<?php namespace Noor\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNoorMoviesMoviesGenres extends Migration
{
    public function up()
    {
        Schema::create('noor_movies_movies_genres', function($table)
        {
            $table->integer('movie_id');
            $table->integer('genre_id');
            $table->primary(['movie_id','genre_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('noor_movies_movies_genres');
    }
}
