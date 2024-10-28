<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Lead, LeadContact, LeadBusinessInteligence};
use Yajra\DataTables\DataTables;

class LeadController extends Controller
{
    public function create(){
        return view('admin.leads.create');
    }

    public function index($type = '', $type_id = '')
    {
        // Define the template variable
        $template = 'actionsTemplate';

        if (request()->ajax()) {
            $query = Lead::query();

            // Eager load relationships
            $query->with(['lead_contacts', 'lead_businessinteligence']);

            // Select relevant fields from the leads table, including business_name
            $query->select([
                'leads.id',
                'leads.business_name', // Ensure business_name is selected
            ]);

            // Apply filters based on type
            if (!empty($type)) {
                switch ($type) {
                    case 'contact_type':
                        $query->whereHas('lead_contacts', function ($q) use ($type_id) {
                            $q->where('id', $type_id);
                        });
                        break;

                    case 'business_intelligence':
                        $query->whereHas('lead_businessinteligence', function ($q) use ($type_id) {
                            $q->where('id', $type_id);
                        });
                        break;
                }
            }

            $table = Datatables::of($query);

            // Set row attributes for selection
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);

            // Add additional columns for mass deletion and actions
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            // Define actions based on your template
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'lead_';
                $routeKey = 'admin.leads';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });

            // Add a column for displaying contacts
            $table->editColumn('contacts', function ($row) {
                return $row->lead_contacts->pluck('phone')->implode(', ');
            });

            // Add a column for displaying business intelligence titles
            $table->editColumn('title', function ($row) {
                return $row->lead_businessinteligence->map(function ($intel) {
                    return $intel->title; // Return title; adjust as needed
                })->implode(', ');
            });

            // Add a column for displaying quantities
            $table->editColumn('quantity', function ($row) {
                return $row->lead_businessinteligence->map(function ($intel) {
                    return $intel->quantity; // Return quantity; adjust as needed
                })->implode(', ');
            });

            // Add a column for business name display
            $table->editColumn('business_name', function ($row) {
                return $row->business_name; // Display the business name
            });

            // Handle other columns as needed
            $table->rawColumns(['actions', 'massDelete', 'business_name']);

            return $table->make(true);
        }

        return view('admin.leads.index', compact('type', 'type_id'));
    }



    public function save(Request $request)
    {

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'title' => 'required|array', // Validate as an array
            'title.*' => 'required|string|max:255', // Validate each title
            'quantity' => 'required|array', // Validate as an array
            'quantity.*' => 'required|integer|min:1', // Validate each quantity
        ]);

        // Create a new Lead
        $lead = Lead::create(['business_name' => $request->name]);

        // Create a new Lead Contact associated with the Lead
        $lead_contact = LeadContact::create([
            'lead_id' => $lead->id,
            'phone' => $request->phone,
        ]);

        // Iterate over the titles and quantities to create multiple LeadBusinessInteligence records
        foreach ($request->title as $index => $title) {
            LeadBusinessInteligence::create([
                'lead_id' => $lead->id,
                'title' => $title,
                'quantity' => $request->quantity[$index], // Access the corresponding quantity
            ]);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Lead saved successfully!');
    }

    public function show($id)
    {
        $lead = Lead::findOrFail($id);
        $lead_contacts = LeadContact::where('lead_id', $lead->id);
        $lead_business_intelignce = LeadBusinessInteligence::where('lead_id', $lead->id);

        return view('admin.leadsd.show', compact('lead', 'lead_contacts', 'lead_business_intelignce'));
    }

    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        $lead_contacts = LeadContact::where('lead_id', $lead->id);
        $lead_business_intelignce = LeadBusinessInteligence::where('lead_id', $lead->id);

        return view('admin.leadsd.edit', compact('lead', 'lead_contacts', 'lead_business_intelignce'));
    }

    public function destroy(Request $request, $id)
    {
       
        Lead::findOrFail($id)->delete();
       
       
           return back();
    }

}
