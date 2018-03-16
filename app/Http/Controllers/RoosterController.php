<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRoosterRequest;
use App\Http\Services\IcalService;
use App\Rooster;
use http\Env\Url;
use Illuminate\Support\Facades\Input;

class RoosterController extends Controller
{
    public function addRooster(AddRoosterRequest $request)
    {
        $rooster_type = Input::get('search_type');
        $code = Input::get('code');

        $rooster = Rooster::where(['name' => $code, 'type' => $rooster_type])->first();

        // rooster bestaat
        if ($rooster) {
            IcalService::getIcalFromRooster($rooster);

            $url = $this->generateUrl($rooster);

            return redirect()->back()->with('url');
        } else {
            $rooster = new Rooster();
            $rooster->type = $rooster_type;
            $rooster->name = $code;
            $rooster->ical = '';

            $rooster->save();
            IcalService::getIcalFromRooster($rooster);
        }

        // return $ical;
    }

    public function generateUrl(Rooster $rooster)
    {
        $segment = '';

        if ($rooster->type == Rooster::GROUP) {
            $segment = Rooster::GROUP;
        } elseif ($rooster->type == Rooster::TEACHER) {
            $segment = Rooster::TEACHER;
        }

        return url($segment.'/'.$rooster->name);
    }
}
