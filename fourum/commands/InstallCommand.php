<?php namespace Fourum\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Schema;

/**
 * Install Command
 *
 * Command for running install tasks.
 */
class InstallCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Install Fourum';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$this->info('Installing...');

		$this->setupDatabase();

		$this->info('');
		$this->info('Done!');
	}

	/**
	 * Setup database tables
	 *
	 * @return void
	 */
	private function setupDatabase()
	{
		$this->info('Dropping existing tables...');

		$this->dropExistingTables();

		$this->info('Loading table schemas...');

		$closures = $this->loadTableClosures();

		$this->info('Creating tables...');

		foreach ($closures as $table => $closure) {
			Schema::create($table, $closure);
		}

		$this->info('Tables created.');
	}

	/**
	 * Load closures for creating tables.
	 *
	 * @return array
	 */
	private function loadTableClosures()
	{
		return array(
			'users' => function($table) {
				$table->engine = "InnoDb";

				$table->increments('id')->unsigned();
				$table->string('email')->unique();
				$table->string('password', 60);
				$table->string('username', 16)->unique();
				$table->date('birthdate')->nullable()->default(NULL);
				$table->timestamps();
				$table->softDeletes();
			},
			'groups' => function($table) {
				$table->engine = "InnoDb";

				$table->increments('id')->unsigned();
				$table->string('name');
				$table->timestamps();
				$table->softDeletes();
			},
			'user_groups' => function($table) {
				$table->engine = "InnoDb";

				$table->increments('id')->unsigned();
				$table->integer('user_id')->unsigned()->index();
				$table->integer('group_id')->unsigned()->index();
				$table->timestamps();
				$table->softDeletes();
			},
			'forums' => function($table) {
				$table->engine = "InnoDb";

				$table->increments('id')->unsigned();
				$table->string('title');
				$table->integer('type')->unsigned();
				$table->timestamps();
				$table->softDeletes();
			},
			'forum_type' => function($table) {
				$table->engine = "InnoDb";

				$table->increments('id')->unsigned();
				$table->string('name');
				$table->timestamps();
				$table->softDeletes();
			},
			'tree' => function($table) {
				$table->engine = "InnoDb";

				$table->increments('id');
				$table->integer('parent_id')->nullable();
				$table->integer('left')->nullable();
				$table->integer('right')->nullable();
				$table->integer('depth')->nullable();
				$table->integer('forum_id')->unsigned();

				// Add needed columns here (f.ex: name, slug, path, etc.)
				// $table->string('name', 255);

				$table->timestamps();

				// Default indexes
				// Add indexes on parent_id, left, right columns by default. Of course,
				// the correct ones will depend on the application and use case.
				$table->index('parent_id');
				$table->index('left');
				$table->index('right');
			},
			'threads' => function($table) {
				$table->engine = "InnoDb";

				$table->increments('id')->unsigned();
				$table->string('title');
				$table->integer('user_id')->unsigned()->index();
				$table->integer('forum_id')->unsigned()->index();
				$table->integer('views')->unsigned();
				$table->timestamps();
				$table->softDeletes();
			},
			'posts' => function($table) {
				$table->engine = "InnoDb";

				$table->increments('id')->unsigned();
				$table->integer('user_id')->unsigned()->index();
				$table->integer('thread_id')->unsigned()->index();
				$table->text('content');
				$table->timestamps();
				$table->softDeletes();
			},
			'messages' => function($table) {
				$table->engine = "InnoDb";

				$table->increments('id')->unsigned();
				$table->integer('from_user_id')->unsigned()->index();
				$table->integer('user_id')->unsigned()->index();
				$table->string('subject');
				$table->text('content');
				$table->tinyInteger('read');
				$table->timestamps();
				$table->softDeletes();
			}
		);
	}

	/**
	 * Drops existing tables from the schema.
	 *
	 * @return void
	 */
	private function dropExistingTables()
	{
		$tableNames = array_keys($this->loadTableClosures());

		foreach ($tableNames as $table) {
			Schema::dropIfExists($table);
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			// array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			// array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
