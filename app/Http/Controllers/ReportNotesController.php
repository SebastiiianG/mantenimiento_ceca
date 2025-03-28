<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ReportNotesController extends Controller
{
    private $filePath = 'report_notes.json';

    // Mostrar vista de edición de notas
    public function edit()
    {
        // Verificar si el archivo existe, si no, crear uno vacío
        if (!Storage::disk('local')->exists($this->filePath)) {
            Storage::disk('local')->put($this->filePath, json_encode(['notes' => '']));
        }

        // Obtener contenido del archivo JSON
        $notesData = Storage::disk('local')->get($this->filePath);
        $notes = json_decode($notesData, true) ?? ['notes' => ''];

        return inertia('ReportNotes/Edit', ['notes' => $notes['notes']]);
    }

    // Guardar notas en el JSON
    public function update(Request $request)
    {
        // Validar los datos que vienen del formulario
        $request->validate([
            'notes' => 'required|string'
        ]);

        // Guardar las notas en el archivo JSON
        Storage::disk('local')->put($this->filePath, json_encode(['notes' => $request->notes]));

        // Redirigir al index de Orders con mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Notas actualizadas correctamente.');
    }
}
