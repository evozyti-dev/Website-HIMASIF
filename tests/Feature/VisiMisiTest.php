<?php

namespace Tests\Feature;

use Tests\TestCase;

class VisiMisiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_visi_misi_page_renders_with_expected_content(): void
    {
        $this->get(route('pages.visi-misi'))
            ->assertOk()
            ->assertSee('VISI')
            ->assertSeeText('Lima Langkah Membangun Generasi Sistem Informasi');
    }
}