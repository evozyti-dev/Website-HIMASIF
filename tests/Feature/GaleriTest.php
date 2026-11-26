<?php

namespace Tests\Feature;

use Tests\TestCase;

class GaleriTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_galeri_page_renders_with_expected_content(): void
    {
        $this->get(route('pages.galeri'))
            ->assertOk()
            ->assertSee('Galeri HIMASIF')
            ->assertSee('Dokumentasi Kegiatan');
    }
}
