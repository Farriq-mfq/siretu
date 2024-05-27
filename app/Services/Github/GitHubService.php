<?php
namespace App\Services\Github;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class GitHubService
{
    protected $client;
    protected $token;

    public function __construct()
    {
        $this->client = new Client();
        $this->token = env('GITHUB_TOKEN');
    }

    public function getLatestReleaseTag()
    {

        if (!Cache::has('APP_VERSION')) {
            $url = "https://api.github.com/repos/Farriq-mfq/siretu/tags";
            $response = $this->client->request('GET', $url, [
                'headers' => [
                    'Authorization' => "Bearer {$this->token}",
                    'Accept' => 'application/vnd.github.v3+json',
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            if ($data) {
                $version = $data[0]['name'] ?? null;
                Cache::put('APP_VERSION', $version);
                return $version;
            } else {
                return null;
            }
        } else {
            return Cache::get('APP_VERSION');
        }
    }
}
