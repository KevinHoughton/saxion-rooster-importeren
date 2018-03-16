<?php

namespace App\Http\Services;

use App\Rooster;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class IcalService
{
    public static function getIcalFromRooster(Rooster $rooster)
    {
        $client = new Client();

        if ($rooster->type == Rooster::GROUP) {
            $ical = $client->get('http://roosters.saxion.nl/ical/group/' . $rooster->name . '.ics');
            $rooster->ical = $ical->getBody()->getContents();
        } elseif($rooster->type == Rooster::TEACHER) {
            $ical = $client->get('http://roosters.saxion.nl/ical/teacher/' . $rooster->name . '.ics');
            $rooster->ical = $ical->getBody()->getContents();
        }

        $rooster->save();
        // http://roosters.saxion.nl/ical/group/EEL1A.ics
        // http://roosters.saxion.nl/ical/teacher/HBO12.ics
    }
}
