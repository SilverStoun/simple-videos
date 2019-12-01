<?php

use yii\db\Migration;

/**
 * Class m191130_163620_posts
 */
class m191130_163620_posts extends Migration
{
    public function up()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->comment('id автора поста'),
            'title' => $this->string()->comment('Заголовок поста'),
            'text' => $this->text()->comment('Текст в посте'),
            'video_url' => $this->string()->comment('url видео вставленного в пост'),
        ]);

        $this->createIndex(
            'idx-posts-user_id',
            'posts',
            'user_id'
        );

        $this->addForeignKey(
            'fk-posts-user_id',
            'posts',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-posts-user_id',
            'posts'
        );

        $this->dropIndex(
            'idx-posts-user_id',
            'posts'
        );

        $this->dropTable('posts');

        echo "m191130_163620_posts reverted.\n";
    }
}
