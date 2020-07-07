<?php

use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Reply;

class RepliesTableSeeder extends Seeder
{
    public function run()
    {
        // 用户id数组
        $user_ids = User::all()->pluck('id')->toArray();

        // 帖子id数组
        $topic_ids = Topic::all()->pluck('id')->toArray();

        //获取faker实例
        $faker = app(Faker\Generator::class);

        $replies = factory(Reply::class)->times(1000)->make()->each(
            function ($reply, $index) use ($user_ids, $topic_ids, $faker) {
                $reply->user_id  = $faker->randomElement($user_ids);
                $reply->topic_id = $faker->randomElement($topic_ids);
            }
        );

        Reply::insert($replies->toArray());
    }

}

