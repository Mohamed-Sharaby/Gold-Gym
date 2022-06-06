<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OffersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Offers');
    }


    public function index(OffersDataTable $dataTable)
    {
        return $dataTable->render('dashboard.offers.index');

    }


    public function create()
    {
        $services = Service::whereIsOffer(0)->active()->pluck('ar_name', 'id');
        return view('dashboard.offers.create', compact('services'));
    }


    public function store(OfferRequest $request)
    {
        $validator = $request->validated();
        $services = Service::whereIn('id', $validator['services'])->get();

        $validator['price'] = 0;
        $validator['ar_description'] = '';
        $validator['en_description'] = '';
        $validator['ar_terms'] = '';
        $validator['en_terms'] = '';
        $validator['is_offer'] = 1;

        DB::beginTransaction();

        foreach ($services as $service) {
            $validator['price'] += $service->price;
            $validator['ar_description'] .= $service->ar_description . '</br>';
            $validator['en_description'] .= $service->en_description . '</br>';
            $validator['ar_terms'] .= $service->ar_terms . '</br>';
            $validator['en_terms'] .= $service->en_terms . '</br>';
        }
        $service = Service::create($validator);
        $service->offerServices()->attach($services->pluck('id'));

        DB::commit();
        return redirect(route('admin.offers.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit($id)
    {
        $offer = Service::findOrFail($id);
        $services = Service::whereIsOffer(0)->pluck('ar_name', 'id');
        return view('dashboard.offers.edit', compact('offer', 'services'));
    }


    public function update(OfferRequest $request, $id)
    {
        $offer = Service::findOrFail($id);
        $validator = $request->validated();

        $services = Service::whereIn('id', $validator['services'])->get();
        DB::beginTransaction();
        $validator['price'] = 0;
        $validator['ar_description'] = '';
        $validator['en_description'] = '';
        $validator['ar_terms'] = '';
        $validator['en_terms'] = '';
        $validator['is_offer'] = 1;
        foreach ($services as $service) {
            $validator['price'] += $service->price;
            $validator['ar_description'] .= $service->ar_description . '</br> ';
            $validator['en_description'] .= $service->en_description . '</br> ';
            $validator['ar_terms'] .= $service->ar_terms . '</br> ';
            $validator['en_terms'] .= $service->en_terms . '</br> ';
        }
        $offer->update($validator);
        $offer->offerServices()->sync($services->pluck('id'));
        DB::commit();
        return redirect(route('admin.offers.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return 'Done';
    }
}
