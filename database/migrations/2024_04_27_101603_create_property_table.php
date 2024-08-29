<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->integer("sn");
            $table->string('code')->primary();
            $table->string('rcode');
            $table->string('property');
            $table->string('category');
            $table->string('area');
            $table->string('unit');
            $table->string('amount');
            $table->string('amounttype');
            $table->string('propertyfor');
            $table->string('description');
            $table->string('bhk');
            $table->string('state');
            $table->string('city');
            $table->string('uploaderaddress');
            $table->string('uploaderemail');
            $table->string('uploaderphone');
            $table->string('uploader');
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
        Schema::dropIfExists('property');
    }
};
