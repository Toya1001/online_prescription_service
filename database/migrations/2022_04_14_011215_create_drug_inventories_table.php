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
        Schema::create('drug_inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('drug_id')->constrained()->onDelete('cascade');
            $table->bigInteger('quantity')->unsigned();
            $table->string('batch_no');
            $table->date('expiration_date');
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
        Schema::dropIfExists('drugs_inventory');
    }
};
