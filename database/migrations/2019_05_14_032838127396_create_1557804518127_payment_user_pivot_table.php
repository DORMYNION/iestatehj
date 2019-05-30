<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557804518127PaymentUserPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('payment_user')) {
            Schema::create('payment_user', function (Blueprint $table) {
                $table->unsignedInteger('payment_id');
                $table->foreign('payment_id', 'payment_id_fk_53842')->references('id')->on('payments');
                $table->unsignedInteger('user_id');
                $table->foreign('user_id', 'user_id_fk_53842')->references('id')->on('users');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('payment_user');
    }
}
