<?php

namespace Tests\Unit;

use Tests\TestCase;

class MahasiswaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetMahasiswa()
    {
        $response = $this->get('/home');
        $response->assertStatus(200);
    }

    public function testCreateMahasiswa()
    {
      // code...
      $input = [
            'Name' => 'test',
            'Faculty' => 'sv',
            'NIM' => 12345,
            'Gender' => 'Female'
        ];

        $this->json('POST', '/create', $input)->assertStatus(200);
    }
}
