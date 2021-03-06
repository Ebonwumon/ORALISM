<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BaseMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	  
    Schema::create('persons', function($table) {
        $table->engine = 'MyISAM';

        $table->increments('person_id');
        $table->string('first_name', 24);
        $table->string('last_name', 24);
        $table->string('address', 128);
        $table->string('email', 128)->unique();
        $table->string('phone', 10);
        });

    DB::statement('ALTER TABLE persons
                   ADD FULLTEXT search(first_name,last_name)');
    
    Schema::create('users', function($table) {
        $table->engine = 'MyISAM';

        $table->integer('person_id')->unsigned();
        $table->string('user_name', 24);
        $table->string('password', 64);
        $table->string('class', 1);
        $table->dateTime('date_registered');
        $table->foreign('person_id')->references('person_id')->on('persons');
        $table->primary('user_name');
        });

    Schema::create('family_doctor', function($table) {
        $table->engine = 'MyISAM';

        $table->integer('doctor_id')->unsigned();
        $table->integer('patient_id')->unsigned();
        $table->foreign('doctor_id')->references('person_id')->on('persons');
        $table->foreign('patient_id')->references('person_id')->on('persons');
        });

    Schema::create('radiology_record', function($table) {
        $table->engine = 'MyISAM';

        $table->increments('record_id');
        $table->integer('patient_id')->unsigned();
        $table->integer('doctor_id')->unsigned();
        $table->integer('radiologist_id')->unsigned();
        $table->string('test_type', 24);
        $table->date('prescribing_date');
        $table->date('test_date');
        $table->string('diagnosis', 128);
        $table->string('description', 1024);
        $table->foreign('patient_id')->references('person_id')->on('persons');
        $table->foreign('doctor_id')->references('person_id')->on('persons');
        $table->foreign('radiologist_id')->references('person_id')->on('persons');
        });

    DB::statement('ALTER TABLE radiology_record
                   ADD FULLTEXT search(diagnosis,description)');

    Schema::create('pacs_images', function($table) {
        $table->engine = 'MyISAM';

        $table->increments('image_id');
        $table->integer('record_id')->unsigned();
        $table->binary('thumbnail');
        $table->binary('regular_size');
        $table->binary('full_size');
        $table->foreign('record_id')->references('record_id')->on('radiology_record');
        });
    
  }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::drop('pacs_images');
    Schema::drop('radiology_record');
    Schema::drop('family_doctor');
    Schema::drop('users');
    Schema::drop('persons');
	}

}
