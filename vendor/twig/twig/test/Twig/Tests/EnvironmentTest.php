<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Twig_Tests_EnvironmentTest extends PHPUnit_Framework_TestCase
{
    public function testAutoescapeOption()
    {
        $loader = new Twig_Loader_Array(array(
            'html' => '{{ foo }} {{ foo }}',
            'js' => '{{ bar }} {{ bar }}',
        ));

        $twig = new Twig_Environment($loader, array(
            'debug' => true,
            'cache' => false,
            'autoescape' => array($this, 'escapingStrategyCallback'),
        ));

        $this->assertEquals('foo&lt;br/ &gt; foo&lt;br/ &gt;', $twig->render('html', array('foo' => 'foo<br/ >')));
        $this->assertEquals('foo\x3Cbr\x2F\x20\x3E foo\x3Cbr\x2F\x20\x3E', $twig->render('js', array('bar' => 'foo<br/ >')));
    }

    public function escapingStrategyCallback($name)
    {
        return $name;
    }

    public function testGlobals()
    {
        $loader = $this->getMockBuilder('Twig_LoaderInterface')->getMock();
        $loader->expects($this->any())->method('getSourceContext')->will($this->returnValue(new Twig_Source('', '')));

        // globals can be added after calling getGlobals
        $twig = new Twig_Environment($loader);
        $twig->addGlobal('foo', 'foo');
        $twig->getGlobals();
        $twig->addGlobal('foo', 'bar');
        $globals = $twig->getGlobals();
        $this->assertEquals('bar', $globals['foo']);

        // globals can be modified after a template has been loaded
        $twig = new Twig_Environment($loader);
        $twig->addGlobal('foo', 'foo');
        $twig->getGlobals();
        $twig->loadTemplate('index');
        $twig->addGlobal('foo', 'bar');
        $globals = $twig->getGlobals();
        $this->assertEquals('bar', $globals['foo']);

        // globals can be modified after extensions init
        $twig = new Twig_Environment($loader);
        $twig->addGlobal('foo', 'foo');
        $twig->getGlobals();
        $twig->getFunctions();
        $twig->addGlobal('foo', 'bar');
        $globals = $twig->getGlobals();
        $this->assertEquals('bar', $globals['foo']);

        // globals can be modified after extensions and a template has been loaded
        $arrayLoader = new Twig_Loader_Array(array('index' => '{{foo}}'));
        $twig = new Twig_Environment($arrayLoader);
        $twig->addGlobal('foo', 'foo');
        $twig->getGlobals();
        $twig->getFunctions();
        $twig->loadTemplate('index');
        $twig->addGlobal('foo', 'bar');
        $globals = $twig->getGlobals();
        $this->assertEquals('bar', $globals['foo']);

        $twig = new Twig_Environment($arrayLoader);
        $twig->getGlobals();
        $twig->addGlobal('foo', 'bar');
        $template = $twig->loadTemplate('index');
        $this->assertEquals('bar', $template->render(array()));

        // globals cannot be added after a template has been loaded
        $twig = new Twig_Environment($loader);
        $twig->addGlobal('foo', 'foo');
        $twig->getGlobals();
        $twig->loadTemplate('index');
        try {
            $twig->addGlobal('bar', 'bar');
            $this->fail();
        } catch (LogicException $e) {
            $this->assertArrayNotHasKey('bar', $twig->getGlobals());
        }

        // globals cannot be added after extensions init
        $twig = new Twig_Environment($loader);
        $twig->addGlobal('foo', 'foo');
        $twig->getGlobals();
        $twig->getFunctions();
        try {
            $twig->addGlobal('bar', 'bar');
            $this->fail();
        } catch (LogicException $e) {
            $this->assertArrayNotHasKey('bar', $twig->getGlobals());
        }

        // globals cannot be added after extensions and a template has been loaded
        $twig = new Twig_Environment($loader);
        $twig->addGlobal('foo', 'foo');
        $twig->getGlobals();
        $twig->getFunctions();
        $twig->loadTemplate('index');
        try {
            $twig->addGlobal('bar', 'bar');
            $this->fail();
        } catch (LogicException $e) {
            $this->assertArrayNotHasKey('bar', $twig->getGlobals());
        }

        // test adding globals after a template has been loaded without call to getGlobals
        $twig = new Twig_Environment($loader);
        $twig->loadTemplate('index');
        try {
            $twig->addGlobal('bar', 'bar');
            $this->fail();
        } catch (LogicException $e) {
            $this->assertArrayNotHasKey('bar', $twig->getGlobals());
        }
    }

    public function testExtensionsAreNotInitializedWhenRenderingACompiledTemplate()
    {
        $cache = new Twig_Cache_Filesystem($dir = sys_get_temp_dir().'/twig');
        $options = array('cache' => $cache, 'auto_reload' => false, 'debug' => false);

        // force compilation
        $twig = new Twig_Environment($loader = new Twig_Loader_Array(array('index' => '{{ foo }}')), $options);

        $key = $cache->generateKey('index', $twig->getTemplateClass('index'));
        $cache->write($key, $twig->compileSource(new Twig_Source('{{ foo }}', 'index')));

        // check that extensions won't be initialized when rendering a template that is already in the cache
        $twig = $this
            ->getMockBuilder('Twig_Environment')
            ->setConstructorArgs(array($loader, $options))
            ->setMethods(array('initExtensions'))
            ->getMock()
        ;

        $twig->expects($this->never())->method('initExtensions');

        // render template
        $output = $twig->render('index', array('foo' => 'bar'));
        $this->assertEquals('bar', $output);

        Twig_Tests_FilesystemHelper::removeDir($dir);
    }

    public function testAutoReloadCacheMiss()
    {
        $templateName = __FUNCTION__;
        $templateContent = __FUNCTION__;

        $cache = $this->getMockBuilder('Twig_CacheInterface')->getMock();
        $loader = $this->getMockLoader($templateName, $templateContent);
        $twig = new Twig_Environment($loader, array('cache' => $cache, 'auto_reload' => true, 'debug' => false));

        // Cache miss: getTimestamp returns 0 and as a result the load() is
        // skipped.
        $cache->expects($this->once())
            ->method('generateKey')
            ->will($this->returnValue('key'));
        $cache->expects($this->once())
            ->method('getTimestamp')
            ->will($this->returnValue(0));
        $loader->expects($this->never())
            ->method('isFresh');
        $cache->expects($this->once())
            ->method('write');
        $cache->expects($this->once())
            ->method('load');

        $twig->loadTemplate($templateName);
    }

    public function testAutoReloadCacheHit()
    {
        $templateName = __FUNCTION__;
        $templateContent = __FUNCTION__;

        $cache = $this->getMockBuilder('Twig_CacheInterface')->getMock();
        $loader = $this->getMockLoader($templateName, $templateContent);
        $twig = new Twig_Environment($loader, array('cache' => $cache, 'auto_reload' => true, 'debug' => false));

        $now = time();

        // Cache hit: getTimestamp returns something > extension timestamps and
        // the loader returns true for isFresh().
        $cache->expects($this->once())
            ->method('generateKey')
            ->will($this->returnValue('key'));
        $cache->expects($this->once())
            ->method('getTimestamp')
            ->will($this->returnValue($now));
        $loader->expects($this->once())
            ->method('isFresh')
            ->will($this->returnValue(true));
        $cache->expects($this->atLeastOnce())
            ->method('load');

        $twig->loadTemplate($templateName);
    }

    public function testAutoReloadOutdatedCacheHit()
    {
        $templateName = __FUNCTION__;
        $templateContent = __FUNCTION__;

        $cache = $this->getMockBuilder('Twig_CacheInterface')->getMock();
        $loader = $this->getMockLoader($templateName, $templateContent);
        $twig = new Twig_Environment($loader, array('cache' => $cache, 'auto_reload' => true, 'debug' => false));

        $now = time();

        $cache->expects($this->once())
            ->method('generateKey')
            ->will($this->returnValue('key'));
        $cache->expects($this->once())
            ->method('getTimestamp')
            ->will($this->returnValue($now));
        $loader->expects($this->once())
            ->method('isFresh')
            ->will($this->returnValue(false));
        $cache->expects($this->once())
            ->method('write');
        $cache->expects($this->once())
            ->method('load');

        $twig->loadTemplate($templateName);
    }

    public function testHasGetExtensionByClassName()
    {
        $twig = new Twig_Environment($this->getMockBuilder('Twig_LoaderInterface')->getMock());
        $twig->addExtension($ext = new Twig_Tests_EnvironmentTest_Extension());
        $this->assertTrue($twig->hasExtension('Twig_Tests_EnvironmentTest_Extension'));
        $this->assertTrue($twig->hasExtension('\Twig_Tests_EnvironmentTest_Extension'));

        $this->assertSame($ext, $twig->getExtension('Twig_Tests_EnvironmentTest_Extension'));
        $this->assertSame($ext, $twig->getExtension('\Twig_Tests_EnvironmentTest_Extension'));
    }

    public function testAddExtension()
    {
        $twig = new Twig_Environment($this->getMockBuilder('Twig_LoaderInterface')->getMock());
        $twig->addExtension(new Twig_Tests_EnvironmentTest_Extension());

        $this->assertArrayHasKey('test', $twig->getTags());
        $this->assertArrayHasKey('foo_filter', $twig->getFilters());
        $this->assertArrayHasKey('foo_function', $twig->getFunctions());
        $this->assertArrayHasKey('foo_test', $twig->getTests());
        $this->assertArrayHasKey('foo_unary', $twig->getUnaryOperators());
        $this->assertArrayHasKey('foo_binary', $twig->getBinaryOperators());
        $this->assertArrayHasKey('foo_global', $twig->getGlobals());
        $visitors = $twig->getNodeVisitors();
        $found = false;
        foreach ($visitors as $visitor) {
            if ($visitor instanceof Twig_Tests_EnvironmentTest_NodeVisitor) {
                $found = true;
            }
        }
        $this->assertTrue($found);
    }

    public function testAddMockExtension()
    {
        $extension = $this->getMockBuilder('Twig_ExtensionInterface')->getMock();

        $loader = new Twig_Loader_Array(array('page' => 'hey'));

        $twig = new Twig_Environment($loader);
        $twig->addExtension($extension);

        $this->assertInstanceOf('Twig_ExtensionInterface', $twig->getExtension(get_class($extension)));
        $this->assertTrue($twig->isTemplateFresh('page', time()));
    }

    public function testInitRuntimeWithAnExtensionUsingInitRuntimeNoDeprecation()
    {
        $loader = $this->getMockBuilder('Twig_LoaderInterface')->getMock();
        $twig = new Twig_Environment($loader);
        $loader->expects($this->once())->method('getSourceContext')->will($this->returnValue(new Twig_Source('', '')));
        $twig->addExtension(new Twig_Tests_EnvironmentTest_ExtensionWithoutDeprecationInitRuntime());

        $twig->loadTemplate('');
    }

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage Unable to register extension "Twig_Tests_EnvironmentTest_Extension" as it is already registered.
     */
    public function testOverrideExtension()
    {
        $twig = new Twig_Environment($this->getMockBuilder('Twig_LoaderInterface')->getMock());

        $twig->addExtension(new Twig_Tests_EnvironmentTest_Extension());
        $twig->addExtension(new Twig_Tests_EnvironmentTest_Extension());
    }

    public function testAddRuntimeLoader()
    {
        $runtimeLoader = $this->getMockBuilder('Twig_RuntimeLoaderInterface')->getMock();
        $runtimeLoader->expects($this->any())->method('load')->will($this->returnValue(new Twig_Tests_EnvironmentTest_Runtime()));

        $loader = new Twig_Loader_Array(array(
            'func_array' => '{{ from_runtime_array("foo") }}',
            'func_array_default' => '{{ from_runtime_array() }}',
            'func_array_named_args' => '{{ from_runtime_array(name="foo") }}',
            'func_string' => '{{ from_runtime_string("foo") }}',
            'func_string_default' => '{{ from_runtime_string() }}',
            'func_string_named_args' => '{{ from_runtime_string(name="foo") }}',
        ));

        $twig = new Twig_Environment($loader);
        $twig->addExtension(new Twig_Tests_EnvironmentTest_ExtensionWithoutRuntime());
        $twig->addRuntimeLoader($runtimeLoader);

        $this->assertEquals('foo', $twig->render('func_array'));
        $this->assertEquals('bar', $twig->render('func_array_default'));
        $this->assertEquals('foo', $twig->render('func_array_named_args'));
        $this->assertEquals('foo', $twig->render('func_string'));
        $this->assertEquals('bar', $twig->render('func_string_default'));
        $this->assertEquals('foo', $twig->render('func_string_named_args'));
    }

    protected function getMockLoader($templateName, $templateContent)
    {
        $loader = $this->getMockBuilder('Twig_LoaderInterface')->getMock();
        $loader->expects($this->any())
          ->method('getSourceContext')
          ->with($templateName)
          ->will($this->returnValue(new Twig_Source($templateContent, $templateName)));
        $loader->expects($this->any())
          ->method('getCacheKey')
          ->with($templateName)
          ->will($this->returnValue($templateName));

        return $loader;
    }
}

class Twig_Tests_EnvironmentTest_Extension_WithGlobals extends Twig_Extension
{
    public function getGlobals()
    {
        return array(
            'foo_global' => 'foo_global',
        );
    }
}

class Twig_Tests_EnvironmentTest_Extension extends Twig_Extension implements Twig_Extension_GlobalsInterface
{
    public function getTokenParsers()
    {
        return array(
            new Twig_Tests_EnvironmentTest_TokenParser(),
        );
    }

    public function getNodeVisitors()
    {
        return array(
            new Twig_Tests_EnvironmentTest_NodeVisitor(),
        );
    }

    public function getFilters()
    {
        return array(
            new Twig_Filter('foo_filter'),
        );
    }

    public function getTests()
    {
        return array(
            new Twig_Test('foo_test'),
        );
    }

    public function getFunctions()
    {
        return array(
            new Twig_Function('foo_function'),
        );
    }

    public function getOperators()
    {
        return array(
            array('foo_unary' => array()),
            array('foo_binary' => array()),
        );
    }

    public function getGlobals()
    {
        return array(
            'foo_global' => 'foo_global',
        );
    }
}

class Twig_Tests_EnvironmentTest_TokenParser extends Twig_TokenParser
{
    public function parse(Twig_Token $token)
    {
    }

    public function getTag()
    {
        return 'test';
    }
}

class Twig_Tests_EnvironmentTest_NodeVisitor implements Twig_NodeVisitorInterface
{
    public function enterNode(Twig_Node $node, Twig_Environment $env)
    {
        return $node;
    }

    public function leaveNode(Twig_Node $node, Twig_Environment $env)
    {
        return $node;
    }

    public function getPriority()
    {
        return 0;
    }
}

class Twig_Tests_EnvironmentTest_ExtensionWithDeprecationInitRuntime extends Twig_Extension
{
    public function initRuntime(Twig_Environment $env)
    {
    }
}

class Twig_Tests_EnvironmentTest_ExtensionWithoutDeprecationInitRuntime extends Twig_Extension implements Twig_Extension_InitRuntimeInterface
{
    public function initRuntime(Twig_Environment $env)
    {
    }
}

class Twig_Tests_EnvironmentTest_ExtensionWithoutRuntime extends Twig_Extension
{
    public function getFunctions()
    {
        return array(
            new Twig_Function('from_runtime_array', array('Twig_Tests_EnvironmentTest_Runtime', 'fromRuntime')),
            new Twig_Function('from_runtime_string', 'Twig_Tests_EnvironmentTest_Runtime::fromRuntime'),
        );
    }

    public function getName()
    {
        return 'from_runtime';
    }
}

class Twig_Tests_EnvironmentTest_Runtime
{
    public function fromRuntime($name = 'bar')
    {
        return $name;
    }
}
