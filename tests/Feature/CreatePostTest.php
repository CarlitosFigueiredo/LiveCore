<?php

use Livewire\Livewire;

test('creates a post successfully', function () {

    Livewire::test('studies.posts.create-post')
        ->set('title', 'My First Post')
        ->set('content', 'This is the content of my first post.')
        ->call('save')
        ->assertRedirect('/posts');


    expect(session('success'))
        ->toBe('Post created successfully!');
});
