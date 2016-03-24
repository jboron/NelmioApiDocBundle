<?php

/*
 * This file is part of the NelmioApiDocBundle.
 *
 * (c) Nelmio <hello@nelm.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nelmio\ApiDocBundle\Extractor\Handler;

use JMS\SecurityExtraBundle\Annotation\PreAuthorize;
use NApi\LogBundle\Services\HistoryObject;
use Nelmio\ApiDocBundle\Extractor\HandlerInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Routing\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;

class LogHandler implements HandlerInterface
{
    public function handle(ApiDoc $annotation, array $annotations, Route $route, \ReflectionMethod $method)
    {
        $configurations = array();
        foreach ($annotations as $configuration) {
            if ($configuration instanceof HistoryObject) {
                $annotation->setLog(true);
            }
        }
        return false;
    }
}
