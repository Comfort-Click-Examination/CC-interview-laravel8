<?php

namespace App\Modules;

use Illuminate\Support\Benchmark;

abstract class Test
{
    public $description;

    public function handle()
    {
        $this->observe(fn () => $this->run());
    }

    public function observe(callable $callBack)
    {
        try {
            $output = $callBack();
            dump("Output : $output");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    abstract public function run();
}
