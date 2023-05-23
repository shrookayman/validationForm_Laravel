<?php

namespace Tests\Feature;

use Tests\TestCase;

class FormTest extends TestCase
{

    public function test_form_loading(): void
    {
        $lang = app()->getLocale();
        $route = '/' . $lang;
        $response = $this->get($route);
        $response->assertStatus(200);
    }

}
