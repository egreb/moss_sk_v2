<?php

use App\Services\Slug;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    private $slug_generator;

    public function __construct()
    {
        $this->slug_generator = new Slug();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slug_generator = new Slug();
        DB::table('posts')->insert([
            'title' => 'Min første post',
            'ingress' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dis parturient montes nascetur ridiculus mus. Cras fermentum odio eu feugiat. Orci dapibus ultrices in iaculis. Arcu felis bibendum ut tristique et egestas quis. Adipiscing diam donec adipiscing tristique. Id diam vel quam elementum pulvinar etiam. Diam sollicitudin tempor id eu nisl nunc mi ipsum faucibus. Lectus sit amet est placerat in. Accumsan tortor posuere ac ut consequat semper viverra. Ornare massa eget egestas purus viverra accumsan in. Mi sit amet mauris commodo quis imperdiet massa tincidunt. Tristique et egestas quis ipsum suspendisse. Donec ultrices tincidunt arcu non sodales neque sodales ut. Gravida neque convallis a cras semper auctor neque vitae. Purus faucibus ornare suspendisse sed nisi lacus sed viverra tellus. Fermentum odio eu feugiat pretium nibh.
                          Urna neque viverra justo nec ultrices dui sapien eget. Et pharetra pharetra massa massa ultricies. Ac turpis egestas maecenas pharetra convallis posuere. Faucibus vitae aliquet nec ullamcorper sit amet risus. Amet porttitor eget dolor morbi non arcu. Amet nisl suscipit adipiscing bibendum est ultricies integer quis. Adipiscing elit pellentesque habitant morbi. Fringilla phasellus faucibus scelerisque eleifend donec. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Tempor commodo ullamcorper a lacus vestibulum sed. Sodales ut etiam sit amet nisl purus. Sagittis orci a scelerisque purus semper eget duis at tellus. Diam ut venenatis tellus in metus vulputate eu scelerisque. Suspendisse ultrices gravida dictum fusce ut placerat. Et magnis dis parturient montes.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'slug' => $slug_generator->createSlug('Min første post'),
            'draft' => false
        ]);
        DB::table('posts')->insert([
            'title' => 'Min andre post',
            'ingress' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dis parturient montes nascetur ridiculus mus. Cras fermentum odio eu feugiat. Orci dapibus ultrices in iaculis. Arcu felis bibendum ut tristique et egestas quis. Adipiscing diam donec adipiscing tristique. Id diam vel quam elementum pulvinar etiam. Diam sollicitudin tempor id eu nisl nunc mi ipsum faucibus. Lectus sit amet est placerat in. Accumsan tortor posuere ac ut consequat semper viverra. Ornare massa eget egestas purus viverra accumsan in. Mi sit amet mauris commodo quis imperdiet massa tincidunt. Tristique et egestas quis ipsum suspendisse. Donec ultrices tincidunt arcu non sodales neque sodales ut. Gravida neque convallis a cras semper auctor neque vitae. Purus faucibus ornare suspendisse sed nisi lacus sed viverra tellus. Fermentum odio eu feugiat pretium nibh.
                          Urna neque viverra justo nec ultrices dui sapien eget. Et pharetra pharetra massa massa ultricies. Ac turpis egestas maecenas pharetra convallis posuere. Faucibus vitae aliquet nec ullamcorper sit amet risus. Amet porttitor eget dolor morbi non arcu. Amet nisl suscipit adipiscing bibendum est ultricies integer quis. Adipiscing elit pellentesque habitant morbi. Fringilla phasellus faucibus scelerisque eleifend donec. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Tempor commodo ullamcorper a lacus vestibulum sed. Sodales ut etiam sit amet nisl purus. Sagittis orci a scelerisque purus semper eget duis at tellus. Diam ut venenatis tellus in metus vulputate eu scelerisque. Suspendisse ultrices gravida dictum fusce ut placerat. Et magnis dis parturient montes.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'slug' => $slug_generator->createSlug('Min andre post'),
            'draft' => false
        ]);

        $users = App\User::findMany([1, 2]);

        App\Post::all()->each(function ($post) use ($users) {
            $post->authors()->attach(
                $users->pluck('id')->toArray()
            );
        });
    }
}
