<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2015 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Cmf\Component\Testing\HttpKernel\TestKernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends TestKernel
{
    public function configure()
    {
        $this->requireBundleSets(array(
            'default',
            'phpcr_odm',
            'sonata_admin_phpcr',
        ));

        $this->addBundles(array(
            new \Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle(),
            new \Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle(),
            new \Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
        ));

        if (class_exists('Symfony\Cmf\Bundle\ResourceRestBundle\CmfResourceRestBundle')) {
            $this->addBundles(array(
                new \Symfony\Cmf\Bundle\ResourceBundle\CmfResourceBundle(),
                new \Symfony\Cmf\Bundle\ResourceRestBundle\CmfResourceRestBundle(),
            ));
        }
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config.php');
        $loader->load(__DIR__.'/config/test-services.xml');
    }
}
