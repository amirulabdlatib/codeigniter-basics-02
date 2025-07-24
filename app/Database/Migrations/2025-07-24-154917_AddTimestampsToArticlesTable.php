<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsToArticlesTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn("articles", [
            "created_at" => [
                "type" => "DATETIME",
                "null" => true,
            ],
            "updated_at" => [
                "type" => "DATETIME",
                "null" => true,
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('articles', ['created_at', 'updated_at']);
    }
}
