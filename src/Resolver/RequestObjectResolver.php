<?php

declare(strict_types=1);

namespace Temirkhan\DataObjectBundle\Resolver;

use Temirkhan\DataObjectBundle\Exception\ObjectInitError;
use Temirkhan\DataObjectBundle\ObjectFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class RequestObjectResolver implements ArgumentValueResolverInterface
{
    /**
     * @var ObjectFactoryInterface
     */
    private $objectFactory;

    public function __construct(ObjectFactoryInterface $objectFactory)
    {
        $this->objectFactory = $objectFactory;
    }

    public function supports(Request $request, ArgumentMetadata $argument)
    {
        if ($this->objectFactory->supportsDataObjectClass($argument->getType())) {
            return true;
        }

        return false;
    }

    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        if (!$this->supports($request, $argument)) {
            yield null;
        }

        $requestBody = $request->getContent();
        $requestData = json_decode($requestBody, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $requestData = $request->request->all();
        }

        try {
            yield $this->objectFactory->createDataObject($requestData, $argument->getType());
        } catch (ObjectInitError $e) {
            throw new BadRequestHttpException("Invalid request is passed");
        }
    }
}
