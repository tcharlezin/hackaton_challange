<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexIntoSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skus', function (Blueprint $table) {
            $table->index('code');
        });
        Schema::table('attributes', function (Blueprint $table) {
            $table->index('name');
        });
        Schema::table('attribute_sku', function (Blueprint $table) {
            $table->index(['sku_id', 'attribute_id', 'featured']);
        });
        Schema::table('images', function (Blueprint $table) {
            $table->index('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
