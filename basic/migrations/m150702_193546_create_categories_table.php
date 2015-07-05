<?php

use yii\db\Schema;
use yii\db\Migration;

class m150702_193546_create_categories_table extends Migration
{
    public function safeUp()
    {
		$this->createTable('categories', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
			'is_active' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
    }
    
    public function safeDown()
    {
		$this->dropTable('categories');
    }
    
}
