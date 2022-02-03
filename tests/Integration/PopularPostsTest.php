<?php
namespace Candles\Tests\Integration;

class PopularPostsTest extends TestCase {

    public function testFactoryWorks(){
        $post_id = self::factory()->post->create();

		$this->assertInstanceOf( \WP_Post::class, get_post( $post_id ));
    }

    public function testMostCommented(){

        //Create many posts
        self::factory()->post->create_many(3);

        //Create popular post
        $post_id = self::factory()->post->create();
        //create A comments on it.
        self::factory()->comment->create([
            'comment_post_ID' => $post_id,
        ]);
        //Create many more posts
        self::factory()->post->create_many(3);
        $query = new \WP_Query([
            'orderby' => 'comment_count',
        ]);
        $this->assertSame(
            $post_id, $query->posts[0]->ID
        );
    }
}
