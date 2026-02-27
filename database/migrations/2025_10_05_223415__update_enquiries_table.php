<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('enquiries', function (Blueprint $table) {
            $table->foreignId('college_id')->nullable()->after('university_id')->constrained()->onDelete('set null');
            $table->foreignId('course_id')->nullable()->after('college_id')->constrained()->onDelete('set null');
            $table->index('college_id');
            $table->index('course_id');
        });
    }

    public function down()
    {
        Schema::table('enquiries', function (Blueprint $table) {
            $table->dropForeign(['college_id']);
            $table->dropForeign(['course_id']);
            $table->dropIndex(['college_id']);
            $table->dropIndex(['course_id']);
            $table->dropColumn(['college_id', 'course_id']);
        });
    }
};