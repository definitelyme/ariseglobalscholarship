<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->text('other_names')->nullable();

            $table->string('version');
            $table->foreign('version')
                ->references('version_id')
                ->on('scholarship_runs')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->text('phone')->nullable();
            $table->text('dob')->nullable();
            $table->text('age')->nullable();
            $table->text('gender')->nullable();
            $table->boolean('status')->nullable()->default(false);

            $table->text('marital_status')->nullable();
            $table->longText('address_street')->nullable();
            $table->text('address_country')->nullable();
            $table->text('address_state')->nullable();
            $table->text('address_lga')->nullable();
            $table->text('address_city')->nullable();
            $table->text('origin_country')->nullable();
            $table->text('origin_state')->nullable();
            $table->text('origin_lga')->nullable();
            $table->text('origin_hometown')->nullable();
            $table->text('kin_name')->nullable();
            $table->text('kin_phone')->nullable();
            $table->text('kin_relationship')->nullable();
            $table->boolean('is_on_scholarship')->nullable()->default(false);

            $table->text('course_of_study')->nullable();
            $table->text('year_of_admission')->nullable();
            $table->text('course_duration')->nullable();
            $table->text('current_level')->nullable();
            $table->text('year_of_graduation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarships');
    }
}
