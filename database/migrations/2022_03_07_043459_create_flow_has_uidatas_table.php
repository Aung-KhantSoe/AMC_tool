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
            $table->foreignId('project_id')->constrained();
            $table->foreignId('card_item_id')->constrained();
            $table->foreignId('input_value_id')->constrained();
            $table->foreignId('dropdown_value_id')->constrained();
            $table->text('written_content_data')->nullable();
            $table->text('choiced_content_data')->nullable();
            $table->text('percentage_data')->nullable();
            $table->text('amount_data')->nullable();
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
        Schema::dropIfExists('flow_has_uidatas');
    }
}
