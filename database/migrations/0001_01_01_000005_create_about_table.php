<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('about_us', function (Blueprint $table) {
        $table->id();
        $table->longText('description');
        $table->timestamps();
    });
}
};
