<?php

use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

uses(RefreshDatabase::class);

test('creates a post successfully - browser events', function () {

    $user = User::factory()->create();

    actingAs($user);

    $title = fake()->sentence();
    $content = fake()->paragraph();

    assertDatabaseMissing(Post::class, [
        'title' => $title,
        'content' => $content,
    ]);

    Livewire::visit('studies.posts.create-post')
        ->type('[wire\\:model="title"]', $title)
        ->type('[wire\\:model="content"]', $content)
        ->press('Save')
        ->assertPathIs('/posts');

    assertDatabaseHas(Post::class, [
        'title' => $title,
        'content' => $content,
    ]);
});
