<?php

use floor12\Breadcrumbs\Breadcrumbs;
use PHPUnit\Framework\TestCase;

class BreadcrumbTest extends TestCase
{
    public function testEmpty()
    {
        $breadcrumbs = new Breadcrumbs();
        $this->assertNull($breadcrumbs->getHtml());
    }

    public function testDefaultCss()
    {
        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->addElement('Test element');
        $this->assertStringContainsString('class="f12-breadcrumbs"', $breadcrumbs->getHtml());
    }

    public function testDefaultId()
    {
        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->addElement('Test element');
        $this->assertStringContainsString('id="f12-breadcrumbs"', $breadcrumbs->getHtml());
    }

    public function testCustomCss()
    {
        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->addElement('Test element');
        $breadcrumbs->setCssClass('test');
        $this->assertStringContainsString('class="test"', $breadcrumbs->getHtml());
    }

    public function testCustomId()
    {
        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->addElement('Test element');
        $breadcrumbs->setMainId('test');
        $this->assertStringContainsString('id="test"', $breadcrumbs->getHtml());
    }

    public function testSuccess()
    {
        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->addElement('First element 1', '/first');
        $breadcrumbs->addElement('Second element 2', '/first/second');
        $breadcrumbs->addElement('Current');
        $expectedResult = file_get_contents(__DIR__ . '/_result.html');
        $expectedResult = preg_replace("/\r|\n|  /", "", $expectedResult);
        $this->assertEquals($expectedResult, $breadcrumbs->getHtml());
    }

}

