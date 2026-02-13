<?php namespace Noor\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNoorMovies extends Migration
{
    public function up()
    {
        Schema::table('noor_movies_', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('noor_movies_', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
