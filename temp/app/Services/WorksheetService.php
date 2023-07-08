<?php

namespace App\Services;

use App\Models\Worksheet;
use Storage;

class WorksheetService
{
    public function index()
    {
        $worksheets = Worksheet::all();

        return $worksheets;
    }

    public function store($request)
    {
        $worksheet = Worksheet::create($request->only(['title', 'class', 'subject', 'price', 'sale_price']));

        // WORKSHEET FILE
        if(!empty($request->file('worksheet_file')))
        {
            $file_name = date('YmdHis') . "_" . mt_rand(1, 999999) . "." . $request->file('worksheet_file')->getClientOriginalExtension();

            $file_path = $request->file('worksheet_file')->storeAs('public/worksheets', $file_name);

            $worksheet->file_path = $file_path;

            $worksheet->file_name = $file_name;

            $worksheet->save();
        }
    }

    public function find($worksheet_id)
    {
        return Worksheet::findOrFail($worksheet_id);
    }

    public function update($request, $worksheet_id)
    {
        $worksheet = Worksheet::findOrFail($worksheet_id);

        $worksheet->update($request->only(['title', 'class', 'subject', 'price', 'sale_price']));

        // WORKSHEET FILE
        if(!empty($request->file('worksheet_file')))
        {
            $file_name = date('YmdHis') . "_" . mt_rand(1, 999999) . "." . $request->file('worksheet_file')->getClientOriginalExtension();

            $file_path = $request->file('worksheet_file')->storeAs('public/worksheets', $file_name);

            $old_file_path = $worksheet->file_path;

            $worksheet->file_path = $file_path;

            $worksheet->file_name = $file_name;

            $worksheet->save();

            Storage::delete($old_file_path);
        }
    }

    public function changeStatus($worksheet_id)
    {
        $worksheet = Worksheet::findOrFail($worksheet_id);

        $worksheet->status = $worksheet->status == "active" ? "inactive" : "active";

        $worksheet->save();
    }


}