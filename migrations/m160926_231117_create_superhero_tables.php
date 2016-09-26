<?php

use yii\db\Migration;

class m160926_231117_create_superhero_tables extends Migration
{
    public function up()
    {
        $this->createTable('superteams', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()->notNull()->unique(),
        ]);

        $this->createTable('superheroes', [
            'id' => $this->primaryKey()->unsigned(),
            'team_id' => $this->integer()->unsigned(),
            'codename' => $this->string()->notNull()->unique(),
            'powers' => $this->string()->notNull(),
            'origin' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('superheroes');
        $this->dropTable('superteams');
    }
}
