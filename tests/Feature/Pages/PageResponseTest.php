<?php

use App\Models\Course;
use App\Models\User;
use App\Models\Video;
use function Pest\Laravel\get;

it('gives back a successful response for home page', function () {

    //Act & Assert
    get(route('pages.home'))
        ->assertOk();

});

it('give back successful response for course details page', function (){

    //Arrange
    $course = Course::factory()->released()->create();

    //Act
    get(route('pages.course-details', $course))
        ->assertOk();
});

it('give back successful response for dashboard page', function (){

    //Arrange
    $user = User::factory()->create();

    //Act & Assert
    loginAsUser();

    get(route('pages.dashboard'))
        ->assertOk();
});

it('does not find JerStream registration page', function () {
    //Act & Assert
    get('register')->assertNotFound();
});

it('includes logout', function () {
    //Act & Assert
    loginAsUser();
    get(route('pages.dashboard'))
        ->assertOk()
        ->assertSeeText('Log Out')
        ->assertSee(route('logout'));
});

it('gives successful response for videos page', function () {
    //Arrange
    $course = Course::factory()
        ->has(Video::factory())
        ->create();
    //Act & Assert
    loginAsUser();
    get(route('page.course-videos', $course))
        ->assertOk();

});