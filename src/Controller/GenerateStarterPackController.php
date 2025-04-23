<?php

namespace App\Controller;

use App\DTO\GenerateStarterPackRequest;
use OpenAI\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

class GenerateStarterPackController extends AbstractController
{
    public function __construct(
        private readonly Client $client
    ) {
    }

    #[Route('/generate-starter-pack', name: 'app_generate_starter_pack')]
    public function __invoke(#[MapRequestPayload] GenerateStarterPackRequest $request): Response
    {
        $response = $this->client->images()->create([
            'model' => 'gpt-image-1',
            'prompt' => $request->getPrompt(),
            'size' => '1024x1024',
        ]);

        return $this->json($response->toArray());
    }
}