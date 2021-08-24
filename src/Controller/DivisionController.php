<?php

declare(strict_types=1);

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Application\Service\DivisionService;
use App\Application\DTO\Division;
use App\Domain\Division\Precision;

class DivisionController extends AbstractController
{
    /**
     * @Route("/api/division/{divisible}/{divisor}", methods={"GET"}, name="api_division")
     */
    public function divide(Request $request, DivisionService $divisionService): JsonResponse
    {
        $fromRequest = new Division();
        $fromRequest->divisible = $request->get('divisible');
        $fromRequest->divisor = $request->get('divisor');

        // We could add here some request validation to not pass invalid data to the domain,
        // but for simplicity here we allow for validating data by the domain itself.
        try {
            $divisionResult = $divisionService->performDivision($fromRequest);
        } catch(Exception $exception) {
            return new JsonResponse(
                [
                    'error' => $exception->getMessage(),
                    'result' => false,
                ],
                Response::HTTP_OK
            );
        }

        return new JsonResponse(
            [
                'error' => "",
                'result' => $divisionResult->value(),
            ],
            Response::HTTP_OK
        );
    }
}
