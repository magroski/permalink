<?php

declare(strict_types=1);

namespace Permalink\Tests;

use Permalink\Permalink;
use PHPUnit\Framework\TestCase;

class PermalinkTest extends TestCase
{
    public function testPermalinkCreation() : void
    {
        $text = 'batata frita';
        $this->assertEquals('batata-frita', Permalink::create($text));

        $text = 'pótãtô #$@!';
        $this->assertEquals('potato', Permalink::create($text));

        $text = 'dar';
        $this->assertEquals('vaidarcerto', Permalink::create($text, 'vai', 'certo'));

        $text = 'th(s )s sp@arta';
        $this->assertEquals('ths-s-sparta', Permalink::create($text));
    }
}
