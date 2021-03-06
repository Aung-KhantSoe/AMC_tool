<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowHasUidatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flow_has_uidatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flow_id')->constrained();
            $table->text('written_content_data')->nullable();
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
        Schema::dropIfExists('flow_has_uidatas');
        Schema::table('flow_has_uidatas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
