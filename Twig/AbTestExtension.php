<?php
namespace Stfalcon\AbTestBundle\Twig;

use Stfalcon\AbTestBundle\Entity\AbTest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class AbTestExtension extends \Twig_Extension implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('init_ab_test', array($this, 'initAbTest'), ['is_safe' => ['html']]),
        );
    }

    /**
     * @return string
     */
    public function initAbTest()
    {
        /** @var Request $request */
        $request = $this->get('request');
        $currentUrl = $this->get('router')->generate($request->attributes->get('_route'), $request->attributes->get('_route_params'));

        /** @var AbTest $abTest */
        $abTest = $this->get('doctrine')->getRepository('StfalconAbTestBundle:AbTest')->findOneBy([
            'pageUrl' => $currentUrl,
            'enable' => true
        ]);

        if (!is_null($abTest)) {
            return $this->renderTemplate(['code' => $abTest->getCode()]);
        }

        return '';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'stfalcon_ab_test_extension';
    }

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param array $tmplParams
     *
     * @return string
     */
    private function renderTemplate(array $tmplParams = [])
    {
        return $this->get('twig')->render('StfalconAbTestBundle:Twig:_ab_test.html.twig', $tmplParams);
    }

    /**
     * @param $serviceId
     *
     * @return object
     */
    private function get($serviceId)
    {
        return $this->container->get($serviceId);
    }
}
