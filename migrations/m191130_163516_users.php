<?php

use yii\db\Migration;

/**
 * Class m191130_163516_users
 */
class m191130_163516_users extends Migration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'password' => $this->string(),
            'email' => $this->string()->notNull()->unique(),
        ]);

    }

    public function down()
    {
        $this->dropTable('users');

        echo "m191130_163716_users reverted.\n";
    }
}
