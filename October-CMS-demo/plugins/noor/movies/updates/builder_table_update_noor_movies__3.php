<?php namespace Noor\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNoorMovies3 extends Migration
{
    public function up()
    {
        Schema::table('noor_movies_', function($table)
        {
            $table->dropColumn('actors');
        });
    }
    
    public function down()
    {
        Schema::table('noor_movies_', function($table)
        {
            $table->text('actors')->nullable();
        });
    }
}
