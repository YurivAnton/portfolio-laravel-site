<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_report_user_roles', function (Blueprint $table) {
            $table->foreignId('service_report_id')->constrained('service_reports');
            $table->unique(['user_id', 'service_report_id']);
        });
    }

    public function down(): void
    {
        Schema::table('service_report_user_roles', function (Blueprint $table) {
            $table->dropUnique('service_report_user_roles_user_id_service_report_id_unique');
            $table->dropForeign(['service_report_id']);
            $table->dropColumn('service_report_id');
        });
    }
};
