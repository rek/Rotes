<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            new FOS\UserBundle\FOSUserBundle(),
            new Craue\FormFlowBundle\CraueFormFlowBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),

            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Knp\Bundle\MarkdownBundle\KnpMarkdownBundle(),
            new Braincrafted\Bundle\BootstrapBundle\BraincraftedBootstrapBundle(),

            // keep our bundles last so they override
            new REK\DocwizBundle\REKDocwizBundle(),
            new REK\RotesBundle\REKRotesBundle(),
            new REK\UserBundle\REKUserBundle(),

            // new Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
            // new Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle(),
            // new Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle(),
            // new Symfony\Cmf\Bundle\ContentBundle\CmfContentBundle(),
            // new Symfony\Cmf\Bundle\BlockBundle\CmfBlockBundle(),
            // Dependencies of the CmfBlockBundle
            // new Sonata\BlockBundle\SonataBlockBundle(),

        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
        }

        if (in_array($this->getEnvironment(), array('test'))) {
            // for loading data fixtures, html5 validation etc.
            $bundles[] = new Liip\FunctionalTestBundle\LiipFunctionalTestBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
