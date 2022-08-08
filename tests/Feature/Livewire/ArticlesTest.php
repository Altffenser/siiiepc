<?php

namespace Tests\Feature\Livewire;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function articles_component_reders_properly()
    {
        $this->get('/')->assertSeeLivewire('articles');
    }
}
