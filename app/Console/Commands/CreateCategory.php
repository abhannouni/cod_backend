<?php

namespace App\Console\Commands;

use App\Services\CategoryService;
use Illuminate\Console\Command;

class CreateCategory extends Command
{
    protected $signature = 'category:create {name} {--parent_id=}';
    protected $description = 'Create a new category';
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    public function handle()
    {
        $name = $this->argument('name');
        $parentId = $this->option('parent_id');

        $this->categoryService->createCategory(['name' => $name, 'parent_id' => $parentId]);
        $this->info('Category created successfully');
    }
}
