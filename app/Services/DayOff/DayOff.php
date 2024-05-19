<?php
namespace App\Services\DayOff;

use Carbon\Carbon;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class DayOff
{
    private string $endpoint = 'https://dayoffapi.vercel.app/api';
    private PendingRequest $client;

    public int $year;
    public int $month = 0;
    public function __construct()
    {
        $this->year = (int) Carbon::now()->format('Y');
        $this->client = Http::acceptJson()->baseUrl($this->endpoint);
    }

    public function withYear(int $year)
    {
        $this->year = $year;
        return $this;
    }
    public function withMonth(int $month)
    {
        $this->month = $month;
        return $this;
    }

    public function getDayOff()
    {
        if ($this->month) {
            return $this->parseResponse($this->client->get($this->endpoint . '?month=' . $this->month . '&year=' . $this->year)->body());
        } else {
            return $this->parseResponse($this->client->get($this->endpoint . '?year=' . $this->year)->body());
        }

    }

    protected function parseResponse(string $response)
    {
        $items = \json_decode($response);
        return $items;
    }
}
