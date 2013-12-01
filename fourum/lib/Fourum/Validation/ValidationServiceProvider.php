<?php

namespace Fourum\Validation;

use Fourum\Validation\ValidatorRegistry;
use Fourum\Validation\Validators\ContentValidator;
use Fourum\Validation\Validators\PostValidator;
use Fourum\Validation\Validators\TitleValidator;
use Fourum\Validation\Validators\ThreadValidator;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Fourum\Validation\ValidatorRegistry', function() {
            $postRegistry = new ValidatorRegistry();
            $postRegistry->add(new ContentValidator());

            $threadRegistry = new ValidatorRegistry();
            $threadRegistry->add(new TitleValidator());

            $registry = new ValidatorRegistry();
            $registry->add(new PostValidator($postRegistry));
            $registry->add(new ThreadValidator($threadRegistry));

            return $registry;
        });
    }
}
