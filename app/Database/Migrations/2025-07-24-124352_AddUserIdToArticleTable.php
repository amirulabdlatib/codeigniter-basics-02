<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToArticleTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn("articles", [
            "users_id" => [
                "type" => "INT",
                "null" => false,
                "unsigned" => true,
                "constraint" => 11,
                "after" => "id",
            ]
        ]);

        $this->db->query("
            ALTER TABLE articles
            ADD CONSTRAINT article_users_id_fk
            FOREIGN KEY (users_id) REFERENCES users(id)
            ON DELETE CASCADE ON UPDATE CASCADE
        ");
    }

    public function down()
    {
        // Drop the foreign key
        $this->db->query("ALTER TABLE articles DROP FOREIGN KEY article_users_id_fk");

        // Drop the column
        $this->forge->dropColumn("articles", "users_id");
    }
}
