<?php

class PostTableSeeder extends Seeder
{
	public function run()
	{
		$post = new Post();
		$post->title = 'First Post';
		$post->body = 'What I saw today';
		$post->user_id = User::first()->id;
		$post->save();

		$post1 = new Post();
		$post1->title = 'Second Post';
		$post1->body = 'What I read today';
		$post1->user_id = User::first()->id;
		$post1->save();
	}
}