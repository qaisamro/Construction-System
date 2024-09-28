<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDailyWageAndCurrencyToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            if (!Schema::hasColumn('employees', 'daily_wage')) {
                $table->decimal('daily_wage', 10, 2)->after('company_id')->nullable();
            }
            if (!Schema::hasColumn('employees', 'currency')) {
                $table->string('currency')->after('daily_wage')->default('ILS');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            if (Schema::hasColumn('employees', 'daily_wage')) {
                $table->dropColumn('daily_wage');
            }
            if (Schema::hasColumn('employees', 'currency')) {
                $table->dropColumn('currency');
            }
        });
    }
}
