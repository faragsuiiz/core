<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // referral_program columns
        if ((config('referral_program.enabled', false))) {
            try {
                $this->createOrChangeTableColumn(
                    table:'users',
                    changeIfExists:true,
                    column:'points',
                    callback:fn(Blueprint $table) => $table->integer('points')->nullable()
                );
            } catch (\Throwable$th) {}
            try {
                $this->createOrChangeTableColumn(
                    table:'users',
                    changeIfExists:true,
                    column:config('referral_program.referred_by_column'),
                    callback:fn(Blueprint $table) => $table->foreignId(config('referral_program.referred_by_column'))->nullable()->constrained('users')->onDelete('SET NULL')->onUpdate('NO ACTION')
                );
            } catch (\Throwable$th) {}
            try {

                $this->createOrChangeTableColumn(
                    table:'users',
                    changeIfExists:true,
                    column:config('referral_program.referral_link_column'),
                    callback:fn(Blueprint $table) => $table->string(config('referral_program.referral_link_column'))->nullable()
                );
            } catch (\Throwable$th) {}
            try {
                $this->createOrChangeTableColumn(
                    table:'users',
                    changeIfExists:true,
                    column:config('referral_program.referee_reward_column'),
                    callback:fn(Blueprint $table) => $table->integer(config('referral_program.referee_reward_column'))->default(config('referral_program.referee_default_reward', 0)),
                );
            } catch (\Throwable$th) {}
            try {
                $this->createOrChangeTableColumn(
                    table:'users',
                    changeIfExists:true,
                    column:config('referral_program.referrer_reward_column'),
                    callback:fn(Blueprint $table) => $table->integer(config('referral_program.referrer_reward_column'))->default(config('referral_program.referrer_default_reward', 0)),
                );
            } catch (\Throwable$th) {}
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ((config('referral_program.enabled', false))) {
            $columns = [
                config('referral_program.referee_reward_column'),
                config('referral_program.referrer_reward_column'),
                config('referral_program.referred_by_column'),
            ];

            array_walk($columns, fn($column) => $this->dropColumnIfExists(
                table:'users',
                column:$column
            ));
        }
    }

    /**
     * Create or change table column.
     *
     * @param  string   $table
     * @param  string   $column
     * @param  \Closure $callback
     * @param  bool     $changeIfExists
     * @return void
     */
    public function createOrChangeTableColumn(string $table, string $column, Closure $callback, bool $changeIfExists = true): void
    {
        if (Schema::hasColumn($table, $column) && $changeIfExists) {
            $callback = function (Blueprint $table) use ($callback) {
                return $callback($table)->change();
            };

            Schema::table($table, $callback);
        }

        if (Schema::hasColumn($table, $column) && !$changeIfExists) {
            return;
        }

        Schema::table($table, $callback);
    }

    /**
     * Drop column if exists.
     *
     * @param  string $table
     * @param  string $column
     * @return void
     */
    public function dropColumnIfExists(string $table, string $column): void
    {
        if (!Schema::hasColumn($table, $column)) {
            return;
        }

        Schema::table($table, fn(Blueprint $table) => $table->dropColumn([$column]));
    }
};
