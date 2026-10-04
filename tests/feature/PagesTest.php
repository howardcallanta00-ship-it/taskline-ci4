<?php

use App\Database\Seeds\TasklineSeeder;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
final class PagesTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $namespace = 'App';
    protected $refresh = true;
    protected $seed = TasklineSeeder::class;

    public function testWelcomePageShowsOnlyTodaysTasks(): void
    {
        $result = $this->get('/');

        $result->assertStatus(200);
        $result->assertSee('Plan the top priorities for today');
        $result->assertSee('Finish the dashboard wireframes');
        $result->assertDontSee('Review customer feedback');
        $result->assertDontSee("Review yesterday's project notes");
    }

    public function testTaskListShowsTasksFromEveryDate(): void
    {
        $result = $this->get('/tasks');

        $result->assertStatus(200);
        $result->assertSee("Review yesterday's project notes");
        $result->assertSee('Plan the top priorities for today');
        $result->assertSee('Review customer feedback');
    }

    public function testProfileShowsTheDemoUser(): void
    {
        $result = $this->get('/profile');

        $result->assertStatus(200);
        $result->assertSee('Alex Morgan');
        $result->assertSee('alex.morgan@example.com');
    }

    public function testAboutIdentifiesTheFrameworkAndDeveloper(): void
    {
        $result = $this->get('/about');

        $result->assertStatus(200);
        $result->assertSee('CodeIgniter 4');
        $result->assertSee('OpenAI Codex');
    }
}
