<?php

namespace Tests\Feature;

use Tests\TestCase;

class KontakTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_kontak_page_renders_with_expected_content(): void
    {
        $this->get(route('pages.kontak'))
            ->assertOk()
            ->assertSee('Mari Terhubung dengan')
            ->assertSee('Kirim Pesan');
    }
}
