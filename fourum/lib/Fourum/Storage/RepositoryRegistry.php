<?php

namespace Fourum\Storage;

class RepositoryRegistry
{
    protected $repositories;

    public function __construct(array $repositories = array())
    {
        $this->repositories = $repositories;
    }

    public function add(RepositoryInterface $repository)
    {
        $this->repositories[$repository->getName()] = $repository;
    }

    public function get($name)
    {
        return $this->repositories[$name];
    }
}
