<?php

namespace App\Http\Controllers;

use App\Models\Integration;
use App\Models\WhatsappInstance;
use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'platform' => 'required',
            ]);
    
            $integration = Integration::create([
                'name' => $validatedData['name'],
                'platform' => $validatedData['platform'],
                'instances' => implode(',', $request->input('instances', [])), // Store selected instance IDs as comma-separated values
                'ignore_duplicates' => $request->has('ignore_duplicates') ? 1 : 0, // Check if ignore_duplicates checkbox is checked
            ]);
    
            return redirect(route('Integracao'))->with('status', 'Integração foi adicionada com sucesso!');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect(route('Integracao'))->with('status', $e->getMessage());
        }
    }

    public function editIntegration($id)
    {
        $integration = Integration::findOrFail($id);
        $instances = WhatsappInstance::where('status', '1')->get();

        $data = [
            'integration' => $integration,
            'instances' => $instances
        ];

        return view('EditIntegration', $data);
    }
    
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'platform' => 'required',
            ]);
            
            $integration = Integration::find($id);

            if (!$integration) {
                return redirect()->route('Integracao')->with('status', 'Integração não encontrada.');
            }

            $integration->update([
                'name' => $validatedData['name'],
                'platform' => $validatedData['platform'],
                'instances' => implode(',', $request->input('instances', [])), 
                'ignore_duplicates' => $request->has('ignore_duplicates') ? 1 : 0, 
            ]);
    
            return redirect()->route('Integracao')->with('status', 'Integração foi atualizada com sucesso!');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->route('Integracao')->with('status', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $integration = Integration::find($id);
            
            if (!$integration) {
                return redirect()->route('Integracao')->with('status', 'Integração não encontrada.');
            }

            $integration->delete();

            return redirect()->route('Integracao')->with('status', 'Integração foi excluída com sucesso!');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->route('Integracao')->with('status', $e->getMessage());
        }
    }
    
}
