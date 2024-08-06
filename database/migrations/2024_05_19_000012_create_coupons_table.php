<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('coupon')->nullable();
            $table->integer('total_views_limit')->nullable();
            $table->integer('daily_views_limit')->nullable();
            $table->datetime('started_at')->nullable();
            $table->datetime('expire_at')->nullable();
            $table->boolean('expired')->default(0);
            $table->boolean('used')->default(0);
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }
}
