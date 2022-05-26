<?php

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('assert true is true', function() {
    $this->assertTrue(true);
    expect(true)->toBeTrue();
});
