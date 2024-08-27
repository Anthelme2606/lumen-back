<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Representants\RepresentantService;

class RepresentantController extends Controller
{
    protected $representantService;

    public function __construct(RepresentantService $representantService)
    {
        $this->representantService = $representantService;
    }

    public function index()
    {
        $representants = $this->representantService->getAllRepresentants();
        return response()->json($representants);
    }

    public function store(Request $request)
    {
        $representant = $this->representantService->createRepresentant($request->all());
        return response()->json($representant, 201);
    }

    public function show($id)
    {
        $representant = $this->representantService->getRepresentantById($id);
        if (!$representant) {
            return response()->json(['message' => 'Representant not found'], 404);
        }
        return response()->json($representant);
    }

    public function update(Request $request, $id)
    {
        $representant = $this->representantService->updateRepresentant($id, $request->all());
        if (!$representant) {
            return response()->json(['message' => 'Representant not found'], 404);
        }
        return response()->json($representant);
    }

    public function destroy($id)
    {
        $deleted = $this->representantService->deleteRepresentant($id);
        if (!$deleted) {
            return response()->json(['message' => 'Representant not found'], 404);
        }
        return response()->json(['message' => 'Representant deleted successfully']);
    }
}
