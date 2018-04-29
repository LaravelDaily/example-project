<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTogglReportsTable extends Migration
{    protected $fillable = [
    'start_date',
    'end_date',
    'report_title',
    'user_name',
    'file_name'
];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toggl_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('file_name');
            $table->string('user_name');
            $table->date('start_date');
            $table->date('end_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('toggl_reports');
    }
}
