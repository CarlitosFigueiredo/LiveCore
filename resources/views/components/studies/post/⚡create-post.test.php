<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('studies.post.create-post')
        ->assertStatus(200);
});
