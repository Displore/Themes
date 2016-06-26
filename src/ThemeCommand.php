<?php

namespace Displore\Themes;

use Illuminate\Console\Command;
use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;

class ThemeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'displore:theme
                            {operation : Create or delete?}
                            {name : The name of the theme.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the boilerplate for a new theme.';

    /**
     * The Config instance.
     * @var \Illuminate\Config\Repository
     */
    protected $config;

    /**
     * The Filesystem instance.
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $filesystem;

    /**
     * Create a new Command instance.
     * @param \Illuminate\Config\Repository     $config
     * @param \Illuminate\Filesystem\Filesystem $filesystem
     */
    public function __construct(Repository $config, Filesystem $filesystem)
    {
        parent::__construct();

        $this->config = $config;
        $this->filesystem = $filesystem;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->argument('operation') == 'create') {
            $this->createTheme($this->argument('name'));
        } elseif ($this->argument('operation') == 'delete') {
            $this->deleteTheme($this->argument('name'));
        } else {
            $this->error('Please specify operation: create or delete?');
            exit();
        }
    }

    /**
     * Create a new theme.
     * 
     * @param  string $theme
     * @return void
     */
    public function createTheme($theme)
    {
        $theme = strtolower($theme);

        $themeLocation = $this->config->get('displore.themes.locations.themes').'/'.$theme;
        $assetsLocation = $this->config->get('displore.themes.locations.assets').'/'.$theme;

        $this->filesystem->makeDirectory($themeLocation, 0755, true);
        $this->filesystem->makeDirectory($assetsLocation, 0755, true);

        $this->info('Succesfully created the theme '.$theme);
        $this->info('The locations are: ');
        $this->info($themeLocation);
        $this->info($assetsLocation);
    }

    /**
     * Delete a theme.
     * 
     * @param  string $theme
     * @return void
     */
    public function deleteTheme($theme)
    {
        $theme = strtolower($theme);

        $themeLocation = $this->config->get('displore.themes.locations.themes').'/'.$theme;
        $assetsLocation = $this->config->get('displore.themes.locations.assets').'/'.$theme;

        if ($this->filesystem->exists($themeLocation)) {
            $this->filesystem->deleteDirectory($themeLocation);
        } else {
            $errors[] = 'The theme location could not be found.';
        }

        if ($this->filesystem->exists($assetsLocation)) {
            $this->filesystem->deleteDirectory($assetsLocation);
        } else {
            $errors[] = 'The assets location could not be found.';
        }

        if (isset($errors)) {
            foreach ($errors as $error) {
                $this->error($error);
                $this->info('The locations are: ');
                $this->info($themeLocation);
                $this->info($assetsLocation);
            }
            exit();
        }
        $this->info('Succesfully deleted the theme '.$theme);
        $this->info('The locations were: ');
        $this->info($themeLocation);
        $this->info($assetsLocation);
    }
}
