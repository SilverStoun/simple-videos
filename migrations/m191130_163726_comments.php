<?php

use yii\db\Migration;

/**
 * Class m191130_163726_comments
 */
class m191130_163726_comments extends Migration
{
    public function up()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->comment('id пользователя оставившего комментарий'),
            'post_id' => $this->integer()->notNull()->comment('id поста которому принадлежит комментарий'),
            'text' => $this->text()->comment('Текст комментария'),
        ]);

        $this->createIndex(
            'idx-comments-user_id',
            'comments',
            'user_id'
        );

        $this->addForeignKey(
            'fk-comments-user_id',
            'comments',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-comments-post_id',
            'comments',
            'post_id'
        );

        $this->addForeignKey(
            'fk-comments-post_id',
            'comments',
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-comments-user_id',
            'comments'
        );

        $this->dropIndex(
            'idx-comments-user_id',
            'comments'
        );
        $this->dropForeignKey(
            'fk-comments-post_id',
            'comments'
        );

        $this->dropIndex(
            'idx-comments-post_id',
            'comments'
        );

        $this->dropTable('comments');

        echo "m191130_163726_comments reverted.\n";
    }
}
