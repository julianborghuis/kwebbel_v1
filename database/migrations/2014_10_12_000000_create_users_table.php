<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // TODO: Remove nullable at new columns.
            $table->bigIncrements('id');
            $table->string('username')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->longText('avatar')->default('iVBORw0KGgoAAAANSUhEUgAAASwAAAEsCAAAAABcFtGpAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpFNzg0MTZGRTE3M0UxMUUzOTYyOEE4QkM2OUVGODdCNyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpFNzg0MTZGRjE3M0UxMUUzOTYyOEE4QkM2OUVGODdCNyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkU3ODQxNkZDMTczRTExRTM5NjI4QThCQzY5RUY4N0I3IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkU3ODQxNkZEMTczRTExRTM5NjI4QThCQzY5RUY4N0I3Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+b5NvTwAABstJREFUeNrt3duq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');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
