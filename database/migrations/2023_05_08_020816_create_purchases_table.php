<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            // constrainedはuserテーブルにあるIDのみって意味　onDelete('cascade'),onUpdateは外部キーが削除更新されたら伴って更新削除がされる 購入履歴が削除されると困るからonDeleteはいらない
            $table->foreignId('customer_id')->constrained()->onUpdate('cascade');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
