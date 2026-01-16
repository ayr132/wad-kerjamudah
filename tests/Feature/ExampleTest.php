<?php

it('redirects to dashboard when unauthenticated', function () {
    $response = $this->get('/');

    $response->assertRedirect('/dashboard');
});
