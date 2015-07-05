<?php

use yii\db\Schema;
use yii\db\Migration;

class m150702_193622_create_articles_table extends Migration
{
    public function safeUp()
    {
		$this->createTable('articles', [
            'id' => Schema::TYPE_PK,
			'categories__id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
			'date_public' => Schema::TYPE_DATE . ' NOT NULL',
            'short_text' => Schema::TYPE_TEXT . ' NOT NULL',
			'full_text' => Schema::TYPE_TEXT . ' NOT NULL',
			'is_active' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
    }
    
    public function safeDown()
    {
		$this->dropTable('articles');
    }

}
