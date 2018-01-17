<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bundle\WebProfilerBundle\Tests\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\WebProfilerBundle\Controller\ProfilerController;
use Symfony\Bundle\WebProfilerBundle\Csp\ContentSecurityPolicyHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Symfony\Component\HttpFoundation\Request;

class ProfilerControllerTest extends TestCase
{
    /**
     * @dataProvider getEmptyTokenCases
     */
    public function testEmptyToken($token)
    {
        $urlGenerator = $this->getMockBuilder('Symfony\Component\Routing\Generator\UrlGeneratorInterface')->getMock();
        $twig = $this->getMockBuilder('Twig\Environment')->disableOriginalConstructor()->getMock();
        $profiler = $this
            ->getMockBuilder('Symfony\Component\HttpKernel\Profiler\Profiler')
            ->disableOriginalConstructor()
            ->getMock();

        $controller = new ProfilerController($urlGenerator, $profiler, $twig, array());

        $response = $controller->toolbarAction(Request::create('/_wdt/empty'), $token);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function getEmptyTokenCases()
    {
        return array(
            array(null),
            // "empty" is also a valid empty token case, see https://github.com/symfony/symfony/issues/10806
            array('empty'),
        );
    }

    /**
     * @dataProvider getOpenFileCases
     */
    public function testOpeningDisallowedPaths($path, $isAllowed)
    {
        $urlGenerator = $this->getMockBuilder('Symfony\Component\Routing\Generator\UrlGeneratorInterface')->getMock();
        $twig = $this->getMockBuilder('Twig\Environment')->disableOriginalConstructor()->getMock();
        $profiler = $this
            ->getMockBuilder('Symfony\Component\HttpKernel\Profiler\Profiler')
            ->disableOriginalConstructor()
            ->getMock();

        $controller = new ProfilerController($urlGenerator, $profiler, $twig, array(), 'bottom', null, __DIR__.'/../..');

        try {
            $response = $controller->openAction(Request::create('/_wdt/open', Request::METHOD_GET, array('file' => $path)));
            $this->assertEquals(200, $response->getStatusCode());
            $this->assertTrue($isAllowed);
        } catch (NotFoundHttpException $e) {
            $this->assertFalse($isAllowed);
        }
    }

    public function getOpenFileCases()
    {
        return array(
            array('README.md', true),
            array('composer.json', true),
            array('Controller/ProfilerController.php', true),
            array('.gitignore', false),
            array('../TwigBundle/README.md', false),
            array('Controller/../README.md', false),
            array('Controller/./ProfilerController.php', false),
        );
    }

    /**
     * @dataProvider provideCspVariants
     */
    public function testReturns404onTokenNotFound($withCsp)
    {
        $twig = $this->getMockBuilder('Twig\Environment')->disableOriginalConstructor()->getMock();
        $profiler = $this
            ->getMockBuilder('Symfony\Component\HttpKernel\Profiler\Profiler')
            ->disableOriginalConstructor()
            ->getMock();

        $profiler
            ->expects($this->exactly(2))
            ->method('loadProfile')
            ->will($this->returnCallback(function ($token) {
                if ('found' == $token) {
                    return new Profile($token);
                }
            }))
        ;

        $controller = $this->createController($profiler, $twig, $withCsp);

        $response = $controller->toolbarAction(Request::create('/_wdt/found'), 'found');
        $this->assertEquals(200, $response->getStatusCode());

        $response = $controller->toolbarAction(Request::create('/_wdt/notFound'), 'notFound');
        $this->assertEquals(404, $response->getStatusCode());
    }

    /**
     * @dataProvider provideCspVariants
     */
    public function testSearchResult($withCsp)
    {
        $twig = $this->getMockBuilder('Twig\Environment')->disableOriginalConstructor()->getMock();
        $profiler = $this
            ->getMockBuilder('Symfony\Component\HttpKernel\Profiler\Profiler')
            ->disableOriginalConstructor()
            ->getMock();

        $controller = $this->createController($profiler, $twig, $withCsp);

        $tokens = array(
            array(
                'token' => 'token1',
                'ip' => '127.0.0.1',
                'method' => 'GET',
                'url' => 'http://example.com/',
                'time' => 0,
                'parent' => null,
                'status_code' => 200,
            ),
            array(
                'token' => 'token2',
                'ip' => '127.0.0.1',
                'method' => 'GET',
                'url' => 'http://example.com/not_found',
                'time' => 0,
                'parent' => null,
                'status_code' => 404,
            ),
        );
        $profiler
            ->expects($this->once())
            ->method('find')
            ->will($this->returnValue($tokens));

        $request = Request::create('/_profiler/empty/search/results', 'GET', array(
            'limit' => 2,
            'ip' => '127.0.0.1',
            'method' => 'GET',
            'url' => 'http://example.com/',
        ));

        $twig->expects($this->once())
            ->method('render')
            ->with($this->stringEndsWith('results.html.twig'), $this->equalTo(array(
                'token' => 'empty',
                'profile' => null,
                'tokens' => $tokens,
                'ip' => '127.0.0.1',
                'method' => 'GET',
                'status_code' => null,
                'url' => 'http://example.com/',
                'start' => null,
                'end' => null,
                'limit' => 2,
                'panel' => null,
                'request' => $request,
            )));

        $response = $controller->searchResultsAction($request, 'empty');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function provideCspVariants()
    {
        return array(
            array(true),
            array(false),
        );
    }

    private function createController($profiler, $twig, $withCSP)
    {
        $urlGenerator = $this->getMockBuilder('Symfony\Component\Routing\Generator\UrlGeneratorInterface')->getMock();

        if ($withCSP) {
            $nonceGenerator = $this->getMockBuilder('Symfony\Bundle\WebProfilerBundle\Csp\NonceGenerator')->getMock();

            return new ProfilerController($urlGenerator, $profiler, $twig, array(), 'bottom', new ContentSecurityPolicyHandler($nonceGenerator));
        }

        return new ProfilerController($urlGenerator, $profiler, $twig, array());
    }
}
