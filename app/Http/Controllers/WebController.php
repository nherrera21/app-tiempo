<?php

namespace App\Http\Controllers;

use App\Weather;
use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Carbon\Carbon;

class WebController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function getWeather(Request $request)
    {
        try {


            $zipcode = $request->zipcode;
            $client = new Client();
            $url = "https://maps.googleapis.com/maps/api/geocode/json?key=" . env("GOOGLE_GEO_API_KEY") . "&language=es-co&region=ES&components=postal_code:" . $zipcode;
            $response = $client->request('GET', $url);

            $responseBody = json_decode($response->getBody());
            //dd($url);
            if (!$responseBody->results) {
                return redirect('/')->with('error', 'Codigo Postal Incorrecto');
            }

            $isSpain = false;
            $obj = null;
            foreach ($responseBody->results as $data) {
                if (Str::endsWith($data->formatted_address, ' Spain') || Str::endsWith($data->formatted_address, ' España')) {
                    $obj = $data;
                    $isSpain = true;
                }
            }

            if (!$isSpain) {
                return redirect('/')->with('error', 'Codigo Postal No España');
            }

            $lat = $obj->geometry->location->lat;
            $lon = $obj->geometry->location->lng;

            $url = "https://api.openweathermap.org/data/2.5/forecast?lat=" . $lat . "&lon=" . $lon . "&exclude=hourly,minutely,alerts&lang=es&units=metric&appid=" . env('OPEN_WEATHER_API_KEY');
            $response = $client->request('GET', $url);
            $responseBody = json_decode($response->getBody());

            if (!$responseBody->list) {
                return redirect('/')->with('error', 'No hay informacón');
            }

            $days = 0;
            $date = Carbon::now()->toDateString();
            $nextDays = [];
            $city = strtoupper($obj->address_components[1]->long_name);
            $temp = round($responseBody->list[0]->main->temp);
            $max = round($responseBody->list[0]->main->temp_max);
            $min = round($responseBody->list[0]->main->temp_min);
            $humidity = $responseBody->list[0]->main->humidity;

            foreach ($responseBody->list as $data) {
                $dateData = date("Y-m-d", $data->dt);
                if ($date != $dateData) {
                    $nextDays[$days] = (object) array(
                        'date' => date("d-m-Y", $data->dt),
                        'temperature' => round($data->main->temp),
                        'humidity' => $data->main->humidity
                    );
                    $date = $dateData;
                    $days++;
                }
                if ($days == 5) {
                    break;
                }
            }

            $weather = Weather::where('city', $city)->first();
            if (!$weather) {
                $weather = new Weather();
            }
            $weather->city = $city;
            $weather->latitude = $lat;
            $weather->longitude = $lon;
            $weather->temperature = $temp;
            $weather->temperature_max = $max;
            $weather->temperature_min = $min;
            $weather->humidity = $humidity;
            $weather->date = Carbon::now();
            $weather->save();

            $database = Weather::orderBy('temperature', 'ASC')->take(5)->get();
            $top = [];
            $index = 0;
            foreach ($database as $data) {
                $top[$index] = (object) array(
                    'city' => $data->city,
                    'date' => Carbon::parse($data->date)->format('d-m-Y'),
                    'temperature' => round($data->temperature),
                    'humidity' => $data->humidity
                );
                $index++;
            }

            $result = (object) array(
                'zipcode' => $zipcode,
                'city' => $city,
                'country' => "ESPAÑA",
                'temperature' => $temp,
                'max' => $max,
                'min' => $min,
                'humidity' => $humidity,
                'nextDays' => $nextDays,
                'top' => $top,
            );

            return view("index", ["result" => $result]);
        } catch (Exception $err) {
            return redirect('/')->with('error', $err);
        }
    }
}
